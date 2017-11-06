<?php
$fence=$_POST['alert_fence'];

//echo $fence;


include("./connMysql.php");
//DELETE FROM `ble` WHERE `ble`.`UUID` = '69696969'

$sql= "INSERT INTO `alert` (`fence_id`, `state`) 
VALUES ('".$fence."', '1')";
$result = $conn->query($sql);
//$conn->close();

//echo $area;

$conn->close();
header("Location: index.php");
exit;
