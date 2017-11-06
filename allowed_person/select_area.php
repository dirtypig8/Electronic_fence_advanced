<?php
    $area=$_POST['select_area'];
    //echo $area;
    include("../connMysql.php");
    $sql= "SELECT * FROM `ble` WHERE `location` = '".$area."'";
    
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
        echo '<td id=del_uuid_bt>
        <button type="button" class="delbtntest btn btn-danger" value='.$row["UUID"].'>移除</button>';
        echo '</tr>';
    }
} else {
    echo "無人員資料";
}
    $conn->close();
