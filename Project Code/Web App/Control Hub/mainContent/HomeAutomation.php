<?php

$TVLightChecked = "";
$sofaFacingTableChecked = "";
$clockLightChecked = "";

$query = "SELECT `Status` FROM `Lights` WHERE `Location` ='TVLight'";
$query_run = mysql_query($query);
$query_row= mysql_fetch_assoc($query_run);
$TVLightStatus = $query_row['Status'];

$query = "SELECT `Status` FROM `Lights` WHERE `Location` ='sofaFacingTable'";
$query_run = mysql_query($query);
$query_row= mysql_fetch_assoc($query_run);
$sofaFacingTableStatus = $query_row['Status'];

$query = "SELECT `Status` FROM `Lights` WHERE `Location` ='clockLight'";
$query_run = mysql_query($query);
$query_row= mysql_fetch_assoc($query_run);
$clockLightStatus = $query_row['Status'];


if ($TVLightStatus == 0) {
  $TVLightChecked = "unchecked";
}
elseif ($TVLightStatus ==1) {
  $TVLightChecked = "checked";
}

if ($sofaFacingTableStatus==0) {
  $sofaFacingTableChecked = "unchecked";
}
elseif ($sofaFacingTableStatus == 1) {
  $sofaFacingTableChecked = "checked";
}

if ($clockLightStatus==0) {
  $clockLightChecked = "unchecked";
}
elseif ($clockLightStatus == 1) {
  $clockLightChecked = "checked";
}




?>

  <!DOCTYPE html>
  <html >
    <head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width"/>
      <title>Home Automation</title>
      <link rel="stylesheet" href="../mainCSS_JS/CSS/font-awesome-4.3.0/css/font-awesome.css">
      <link rel="stylesheet" href="../mainCSS_JS/CSS/style.css" media="screen and (min-device-width: 765px)">
      <link rel="stylesheet" href="../mainCSS_JS/CSS/styleMobile.css" media="(min-device-width: 320px) and (max-device-width: 764px)">
      <link rel="stylesheet" href="../mainCSS_JS/CSS/jquery.mobile-1.4.2.css" />
      <link rel="stylesheet" href="../mainCSS_JS/CSS/ jquery.mobile.icons-1.4.2.css" />
      <script src="../mainCSS_JS/JS/jquery-1.11.0.js" type="text/javascript"></script>
      <script src="../mainCSS_JS/JS/jquery.mobile-1.4.2.js" type="text/javascript"></script>
      <script src="../mainCSS_JS/JS/HomeAutomationJS.js" type="text/javascript"></script>


    </head>

    <body>
        <div id="homePage" data-role = "page" data-theme="none">
         <div class="ui-content" data-role ="main" align="center" data-theme="none">
            <nav class='menu' data-theme="none">
                    <input class='menu-toggler' id='menu-toggler' type='checkbox' data-role = "none" data-theme="none">
                    <label for='menu-toggler' data-role ="none" data-theme="none"></label>
                    <ul>
                              <li class='menu-item' data-theme="none">
                                          <a href="#lights" data-theme="none" data-transition="pop" STYLE="text-decoration: none" class='fa fa-lightbulb-o' ></a>
                              </li>
                              <li class='menu-item' data-theme="none">
                                          <a href="#blinds" data-theme="none" data-transition="pop" STYLE="text-decoration: none" class='fa fa-sliders' ></a>
                              </li>
                              <li class='menu-item' data-theme="none">
                                          <a STYLE="text-decoration: none" data-theme="none" class='fa fa-sign-out' rel="external" href="../LogIn/logout.php"></a>
                              </li>
                  </ul>
          </nav>
          </div>

        </div>

        <div id="lights" data-role="page" align="center" data-theme="none">
              <div data-role="main" id="mainDiv" class="ui-content" data-theme="a">
                       <p><a class="custom-btn" data-theme="a"  data-role="button">Lights</a></p>
                      <br>
                      <table id="lightsTable" style="width:100%">
                                  <tr>
                                        <td>
                                                Location
                                        </td>
                                        <td>
                                                Status
                                        </td>
                                        <td>
                                                Timer
                                        </td>
                                  </tr>
                                  <tr>
                                        <td>
                                                TV Case Light:
                                        </td>
                                        <td>
                                                <form>
                                                            <fieldset class="ui-field-contain" data-theme="a" onclick="return lightStatusUpdater()">
                                                            <input id="TVLight" class="lightButtons" data-theme="a" <?php echo $TVLightChecked ?> type="checkbox" data-role="flipswitch"/>
                                                            </fieldset>
                                                </form>
                                        </td>
                                        <td>
                                                More features coming
                                        </td>
                                  </tr>
                                  <tr>
                                        <td>
                                                Sofa Facing Table:
                                        </td>
                                        <td>
                                                <form>
                                                <fieldset class="ui-field-contain" data-theme="a" onclick="return lightStatusUpdater()">
                                                <input id="sofaFacingTable" class="lightButtons" data-theme="a"  <?php echo $sofaFacingTableChecked ?> type="checkbox" data-role="flipswitch" />
                                                </fieldset>
                                                </form>
                                        </td>
                                        <td>
                                                More features coming
                                        </td>
                                  </tr>
                                  <tr>
                                        <td>
                                                Clock Light Pillar:
                                        </td>
                                        <td>
                                                <form>
                                                <fieldset class="ui-field-contain" data-theme="a" onclick="return lightStatusUpdater()">
                                                <input id="clockLight" class="lightButtons" data-theme="a" <?php echo $clockLightChecked ?> type="checkbox" data-role="flipswitch" />
                                                </fieldset>
                                                </form>
                                        </td>
                                        <td>
                                                More features coming
                                        </td>
                                  </tr>
                      </table>
                      <br>
                      <table id="footerTable">
                                  <tr>
                                        <td>
                                                <input type="button" class="buttonsAll" value="Turn On All"  data-inline="true" onclick="return turnOnAll()" data-theme="a"/>
                                        </td>
                                        <td>
                                                <a class="homeButton" href="#homePage" data-role="button" data-theme="a" data-icon="home" data-iconpos="notext"> </a>
                                        </td>
                                        <td>
                                                <input type="button" class="buttonsAll" value="Turn Off All"  data-inline="true" onclick="return turnOffAll()" data-theme="a"/>
                                        </td>
                                  </tr>
                      </table>
            </div>
      </div>

      <div id="blinds" data-role="page" align="center" data-theme="none">
          <div data-role="main" id="mainDiv" class="ui-content" data-theme="a">
                       <p><a class="custom-btn" data-theme="a"  data-role="button">Blinds</a></p>
                       <br>
                       <br>
                       <p>More features coming soon!</p>

                      <a class="homeButton" href="#homePage" data-role="button" data-theme="a" data-icon="home" data-iconpos="notext"> </a>
            </div>
      </div>
    </body>
  </html>
