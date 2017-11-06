<?php
$fence=$_POST['add_fence'];
$location=$_POST['select_area'];
//echo $location.$fence;
include("../connMysql.php");
$sql= "INSERT INTO `main_fence` (`fence_id`, `location`) VALUES ('".$fence."', '".$location."')";
$result = $conn->query($sql);
if (!$result) {
    echo '<script>
    alert("提醒: \r\n 新增失敗!");
    </script>';
    //echo "新增失敗";
}


$conn->close();
header("Location: index.php");
exit;
