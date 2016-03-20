<?php
require '../mainContent/core.inc.php';

session_destroy();

//unset cookie
setcookie('user_ID', null, time()-3600,'/');

header('Location: ../index.php');
?>