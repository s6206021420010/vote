<?php
include "header.php";
$id = $_GET['applicant_id'];
$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];
$sql = "DELETE FROM `applicant` WHERE applicant_id='$id'";
echo $_SERVER['REQUEST_URI'];
$result = mysqli_query($conn,$sql);
header("location:list.php?event_id=$event_id&user_id=$user_id");
 ?>
