<?php

if(isset($_POST['usernameTxt']) && isset($_POST['passwordTxt'])){
    $username = $_POST['usernameTxt'];
    $password = $_POST['passwordTxt'];

    if(!empty($username) && !empty($password)){
        checkUser($username, $password);
    }
}

function checkUser($userTemp, $passTemp){

    $userTempLowercase = strtolower($userTemp);

    $query = "SELECT `ID`, `Username`, `Password`, `Salt` FROM `Users` WHERE `Username` ='$userTempLowercase'";
    $query_run = mysql_query($query);
    if(mysql_num_rows($query_run) == 1)
    {
        $query_row= mysql_fetch_assoc($query_run);
        $passDB = $query_row['Password'];
        $saltDB =  $query_row['Salt'];

        checkPass($passTemp, $passDB, $saltDB, $query_run);

    }else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect username/password combination.")';
        echo '</script>';
    }
}

function checkPass($passTemp, $passDB, $saltDB, $query_run){
    $passHash = hasher($passTemp, $saltDB);

    if ($passHash == $passDB){
        $user_ID = mysql_result($query_run, 0, 'ID');
        $_SESSION['user_ID'] = $user_ID;
        header('Location: index.php');
    }else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect username/password combination.")';
        echo '</script>';
    }

}

function hasher($hashTemp, $saltTemp, $rounds = 9){
    return crypt($hashTemp, sprintf('$2y$%02d$', $rounds) . $saltTemp . $saltTemp);

}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Home Automation</title>

    <!-- the three things that jQuery Mobile needs to work -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
    <link href='LogIn/LogInCSS.css' rel='stylesheet' >
    <meta name="viewport" content="width=device-width"/>
    <meta name="author" content="Rishi Thakkar"/>
</head>
<body>
    <section id="LogInPage">

              <form id ="LogIn" action = "<?php echo $current_file; ?>" method="post">
                    <h1>Home Automation</h1>
                    <input placeholder="Username" type="text" name="usernameTxt" required="">
                    <input placeholder="Password" type="password" name="passwordTxt" required="">
                    <button>Log In</button>

            </form>
            <form id="CreateNewAccount" action = "CreateAccount/CreateNewAccount.php">
                    <button id="CreateNewAccountButton" type = "submit">Create New Account</button>
            </form>

    </section>
</body>
</html>
