<?php
require 'mainContent/connect.inc.php';
require 'mainContent/core.inc.php';

if(loggedIn())
{
    include 'mainContent/HomeAutomation.php';
}else if(!loggedIn()){
    include 'LogIn/LogIn.php';
}
?>