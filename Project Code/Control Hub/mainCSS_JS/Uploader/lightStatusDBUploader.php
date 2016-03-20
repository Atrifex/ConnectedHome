<?php
require '../../mainContent/connect.inc.php';

$TVLightLocation = 'TVLight';
$sofaFacingTableLocation = 'sofaFacingTable';
$clockLightLocation = 'clockLight';

$TVLightStatus= $_POST['TVLightStatus'];
$sofaFacingTableStatus= $_POST['sofaFacingTableStatus'];
$clockLightStatus= $_POST['clockLightStatus'];

lightsUpdater($TVLightStatus,$TVLightLocation);
lightsUpdater($sofaFacingTableStatus,$sofaFacingTableLocation);
lightsUpdater($clockLightStatus,$clockLightLocation);


function lightsUpdater($lightStatus, $lightLocation){
    $query = "UPDATE `Lights` SET `Status`='$lightStatus' WHERE `Location`='$lightLocation' ";
    mysql_query($query);
}




?>