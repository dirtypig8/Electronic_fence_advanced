<?php
$location=$_POST['select_area'];
$uuid=$_POST['add_UUID'];
$user_name=$_POST['add_user_name'];
$user_ID=$_POST['add_user_ID'];
$Phone=$_POST['add_Phone'];
$Vendor=$_POST['add_Vendor'];

//select_area: $('#select_area').val(),
//add_user_name: $('#add_user_name').val(),
//add_user_ID: $('#add_user_ID').val(),
//add_Phone: $('#add_Phone').val(),
//add_Vendor: $('#add_Vendor').val(),
//add_UUID: $('#add_UUID').val(),





//echo $location.$user_name.$user_ID.$Phone.$Vendor.$uuid;
include("../connMysql.php");
$sql= "INSERT INTO `ble` (`UUID`, `location`,`User_Name`,`User_ID`,`Vendor`,`Phone`) 
VALUES ('".$uuid."', '".$location."', '".$user_name."', '".$user_ID."', '".$Vendor."', '".$Phone."')";
$result = $conn->query($sql);
//$conn->close();

/*
$sql= "SELECT * FROM `ble` WHERE `location` = '".$location."'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 輸出每行數據
    while ($row = $result->fetch_assoc()) {
        //echo '<li class="list-group-item">'.$row["UUID"].'</li> ';
        //echo $row["uuid_id"];
        echo '<tr>';
        echo '<td>'.$row["User_Name"].'</td>';
        echo '<td>'.$row["User_ID"].'</td>';
        echo '<td>'.$row["Phone"].'</td>';
        echo '<td>'.$row["Vendor"].'</td>';
        echo '<td>'.$row["UUID"].'</td>';
        echo '</tr>';
    }
} else {
    echo "0 個結果";
}*/
$conn->close();
