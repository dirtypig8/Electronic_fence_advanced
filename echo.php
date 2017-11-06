<?php


include("connMysql.php"); 

$sql= "SELECT * FROM `alert` ORDER BY ID DESC LIMIT 1;";
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
// 輸出每行數據 
	while($row = $result->fetch_assoc()) { 
echo $row["alert_"]; 
	} 
}else{ 
echo "0 個結果"; 
} 	
$conn->close();

?>