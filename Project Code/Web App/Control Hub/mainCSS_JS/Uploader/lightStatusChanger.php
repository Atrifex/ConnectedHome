<?php
$TVLightStatus= $_POST['TVLightStatus'];
$sofaFacingTableStatus= $_POST['sofaFacingTableStatus'];
$clockLightStatus= $_POST['clockLightStatus'];

if($TVLightStatus==1){
    $update = file_get_contents("http://192.168.1.82/?pin=ON");

}else{
    $update = file_get_contents("http://192.168.1.82/?pin=OFF");
}
/*
if($sofaFacingTableStatus==1){
    $update = file_get_contents("http://192.168.1.80/?pin=ON");

}else{
    $update = file_get_contents("http://192.168.1.80/?pin=OFF");
}*/

?>