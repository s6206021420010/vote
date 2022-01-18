<?php
include "header.php";
$id = $_GET['applicant_id'];
$sql = "DELETE FROM `applicant` WHERE applicant_id='$id'";
$result = mysqli_query($conn,$sql);
header("location:list.php");
 ?>
