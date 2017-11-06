<?php
$fence=$_POST['del_fence_list'];
$area=$_POST['select_area'];
//echo $fence.$area;
include("../connMysql.php");
//DELETE FROM `ble` WHERE `ble`.`UUID` = '69696969'
$sql= "DELETE FROM `main_fence` WHERE `main_fence`.`fence_id` = '".$fence."'";
$result = $conn->query($sql);
//$conn->close();

//echo $area;

$conn->close();
header("Location: index.php");
exit;
