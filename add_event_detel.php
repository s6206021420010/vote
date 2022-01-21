<?php
  include "conn.php";
  $list = $_POST["list"];
  $id = $_POST["id"];
  $number = $_POST["number"];
  $image = $_POST["image"];
  $user_id = $_POST["user_id"];

  echo $sql = "INSERT INTO `applicant`(`applicant_id`, `applicant_name`, `applicant_number`,`applicant_image`, `event_id`) VALUES ('','$list','$number','$image','$id')";
  $result = mysqli_query($conn, $sql);

  // header("location: list.php?event_id=$id&user_id=$user_id");

 ?>
