<?php
require '../mainContent/connect.inc.php';

if(isset($_POST['usernameTxt']) && isset($_POST['passwordTxt']) && isset($_POST['adminKeyTxt'])){
    $username = $_POST['usernameTxt'];
    $password = $_POST['passwordTxt'];
    $adminKey = $_POST['adminKeyTxt'];

    if(!empty($username) && !empty($password) && !empty($adminKey)){
        checkAdminKey($adminKey, $username, $password);
    }
}

//$errorMessage;
function checkAdminKey($adminKeyTemp, $userTemp, $passwordTemp){

    $query = "SELECT `Key`, `Salt` FROM `Key`";

    if($query_run = mysql_query($query))
    {
        $query_row= mysql_fetch_assoc($query_run);
        $key = $query_row['Key'];
        $saltKey =  $query_row['Salt'];

    }else{
        die("Error: Could not load page");
    }

    $adminKeyHashed = hasher($adminKeyTemp, $saltKey);

    $userRepeatCheck = userRepeatChecker($userTemp);

    if ($adminKeyHashed == $key && $userRepeatCheck == 0)
    {
        userPassStorer($userTemp, $passwordTemp);
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Account not created. Key incorrect or username taken.")';
        echo '</script>';
        //$errorMessage = "Account not created. Key incorrect.";
    }
}

function userRepeatChecker($userTemp){
    $query = "SELECT `Username` FROM `Users` WHERE `Username` = '$userTemp'";
    $query_run = mysql_query($query);

    if(mysql_num_rows($query_run) == 1)
    {
        return 1;
    }else{
        return 0;
    }
}

function userPassStorer($userTemp, $passwordTemp){
        //Last night the key seems to have checked out now ou need to generate a new salt and store it in the DB
        //Need to hash the submitted pass using the new salt
        //store the new salt and the new hashed password
        //Store the username

        //Finally log in the user on signup and creat a new session for the user to exist in
        //have a log out button to log back out
    $newSalt = saltGenerator();
    $newPassHash = hasher($passwordTemp, $newSalt);

    $userTempLowercase = strtolower($userTemp);

    $query = "INSERT INTO `Users`(`ID`, `Username`, `Password`, `Salt`) VALUES ('', '".mysql_real_escape_string($userTempLowercase)."', '".mysql_real_escape_string($newPassHash)."','".mysql_real_escape_string($newSalt)."')";
    if($query_run = mysql_query($query))
    {
        echo '<script language="javascript">';
        echo 'alert("Account created!")';
        echo '</script>';

        echo '<script language="javascript">';
        echo ' window.location.assign("../index.php");';
        echo '</script>';

    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Account not created. Key incorrect or username taken.")';
        echo '</script>';
    }





}

function hasher($hashTemp, $saltKeyTemp, $rounds = 9){
    return crypt($hashTemp, sprintf('$2y$%02d$', $rounds) . $saltKeyTemp . $saltKeyTemp);

}

function saltGenerator(){
    $salt="";
    $saltChars = array_merge(range('A','Z'), range('a','z'), range(0,9));// we have 3 arrays, and wer are merging all of those using array merge

    for ($i=0; $i < 22 ; $i++) {
            $salt .= $saltChars[array_rand($saltChars)];
    }
    return $salt;
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Home Automation: Create New Account</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
    <link href='CreateNewAccountCSS.css' rel='stylesheet' >
   <meta name="viewport" content="width=device-width"/>
    <meta name="author" content="Rishi Thakkar"/>
</head>
<body>
    <section id="CreateNewAccountPage" >
             <form action = "CreateNewAccount.php" method="post">
                    <h1>Create New Account</h1>
                    <input placeholder="Username" name="usernameTxt" type="text" required="" >
                    <input placeholder="Password" name="passwordTxt" type="password" required="">
                    <input placeholder="Admin Key" name="adminKeyTxt" type="password" required="">
                    <button type="submit">Sign Up</button>
            </form>
            <div id = "errorMessage">
                <p> <?php //echo $errorMessage;?> </p>

            </div>
    </section>

  </body>
</html>
