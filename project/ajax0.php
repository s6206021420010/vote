<?php
include "conn.php";
$u_id = $_GET["u_id"];
$sqls = "SELECT * FROM `user` WHERE user_id = $u_id";
$results = mysqli_query($conn,$sqls);
$row = $results->fetch_assoc();

$sql = "UPDATE `user` SET `status`='4' WHERE `user_id`='$u_id'";
$results = mysqli_query($conn,$sql);
 ?>
 
