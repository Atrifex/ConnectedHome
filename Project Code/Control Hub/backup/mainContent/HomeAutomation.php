  <?php



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
      <script src="../mainCSS_JS/JS/jquery-1.11.0.js" type="text/javascript"></script>
      <script src="../mainCSS_JS/JS/jquery.mobile-1.4.2.js" type="text/javascript"></script>


    </head>

    <body>
        <section id="homePage" data-role = "page" data-theme="none">
         <div class="ui-content" align="center" data-theme="none">
            <nav class='menu' data-theme="none">
                    <input class='menu-toggler' id='menu-toggler' type='checkbox' data-role = "none" data-theme="none">
                    <label for='menu-toggler' data-theme="none"></label>
                    <ul>
                              <li class='menu-item' data-theme="none">
                                          <a href="#lights" data-theme="none" data-transition="pop" STYLE="text-decoration: none" class='fa fa-lightbulb-o' ></a>
                              </li>
                              <li class='menu-item' data-role="none">
                                          <a href="#blinds" data-theme="none" data-transition="pop" STYLE="text-decoration: none" class='fa fa-sliders' ></a>
                              </li>
                              <li class='menu-item' data-theme="none">
                                          <a STYLE="text-decoration: none" data-theme="none" class='fa fa-sign-out' rel="external" href="../LogIn/logout.php"></a>
                              </li>
                  </ul>
          </nav>
          </div>

        </section>

        <div id="lights" data-role="page" align="center" data-theme="none">

              <p><a class="custom-btn"  href="#homePage"  data-role="button" data-transition="fade">Home Page</a></p>
              <fieldset class="ui-field-contain">
                <label for="ts2">LED Lights</label>
                <input name="ts2" type="checkbox" checked="checked" data-role="flipswitch" />
              </fieldset>

      </div>

      <div id="blinds" data-role="page" align="center" data-theme="none">

              <p><a class="custom-btn" href="#homePage" data-role="button" data-transition="fade">Home Page</a></p>
              <p>More Features coming soon</p>

      </div>
    </body>
  </html>
