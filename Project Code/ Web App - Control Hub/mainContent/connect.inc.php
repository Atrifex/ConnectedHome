<?php
$conn_error = 'Error: Could not connect';

$mySQLhost = 'localhost';
$mySQLuser = 'root';
$mySQLpass = '9ee0697b2485e168256bc8f082bd30af';
$mySQLDB = 'HomeAutomationDB';

if(!(@mysql_connect($mySQLhost,$mySQLuser,$mySQLpass)) || !(@mysql_select_db($mySQLDB)))
{
    die($conn_error);
}
?>