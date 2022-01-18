<?php
include "header.php";
include "conn.php";
$user_id = $_POST['user_id'];
$event_id = $_POST['event_id'];
$applicant_id = $_POST['applicant_id'];
$number = $_POST['number'];
$sql ="SELECT * FROM `user` WHERE user_id='$user_id' AND user.number='$number'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows>0) {
  header("location:sms.php?number=$number");
  ?>
  <?php
}
else {
  ?>
  <input type="text" name="" value="Error">
  <?php
  header("location:form_otp.php?event_id=$event_id&applicant_id=$applicant_id&user_id=$user_id");
}
 ?>
