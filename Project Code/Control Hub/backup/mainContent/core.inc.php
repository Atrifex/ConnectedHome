<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
$http_referer = $_SERVER['HTTP_REFERER'];



function loggedIn(){
    if(isset($_SESSION['user_ID']) && !empty($_SESSION['user_ID'])){
        return true;
    }else
    {
        return false;
    }
}
?>