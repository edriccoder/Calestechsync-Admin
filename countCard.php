<?php
require 'conn.php';
session_start();


$sql = $conn->query("SELECT * FROM exercise_records");
$rowCount = mysqli_num_rows($sql);

$_SESSION['exercise'] = $rowCount;
echo $_SESSION['exercise']; 

$sql2 = $conn->query("SELECT * FROM user");
$rowCount2 = mysqli_num_rows($sql2);

$_SESSION['users'] = $rowCount2;
echo $_SESSION['users']; 

$sql3 = $conn->query("SELECT * FROM feedback");
$rowCount3 = mysqli_num_rows($sql3);

$_SESSION['feedback'] = $rowCount3;
echo $_SESSION['feedback']; 
?>
