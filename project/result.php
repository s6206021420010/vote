<?php
include "header.php";
include "function.php";
$event_id = $_GET['event_id'];
$user_id = $_GET['user_id'];
$date = $_GET['date'];
$applicant_id = $_GET['applicant_id'];
$sql = "INSERT INTO `vote`(`vote_id`, `user_id`, `event_id`, `vote_date`,`applicant_id`) VALUES ('','$user_id','$event_id','1','$applicant_id')";
$result = mysqli_query($conn,$sql);
if (isset($result)) {
header ("location:datavote.php?event_id=$event_id&user_id=$user_id&date=$date");
}

 ?>
