<?php
$uuid=$_GET['del_uuid'];
$area=$_GET['select_area'];
include("../connMysql.php");
echo '
<script> 
window.close(); 
</script> ';


//DELETE FROM `ble` WHERE `ble`.`UUID` = '69696969'
$sql= "DELETE FROM `ble` WHERE `UUID` ='".$uuid."' AND `location` = '".$area."'";
//DELETE FROM `ble` WHERE `UUID` = "3345678" AND `location` = "大門口"
 
$result = $conn->query($sql);
$conn->close();
