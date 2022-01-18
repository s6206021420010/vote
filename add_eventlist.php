<?php
include("conn.php");
$event_type = $_POST["event_type"];
$event_name = $_POST["event_name"];
$event_detail = $_POST["event_detail"];
$date_time = $_POST["date_time"];
$sec = $_POST["user_id"];
$status = $_POST["cars"];
$image = $_FILES["file"]['name'];
$org = $_POST["organization_id"];
$dep = $_POST["department_id"];
$dep2 = $_POST["department2_id"];
$time_end = $_POST["time_end"];

$fileame = "images/".basename($image);

if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileame)){
  echo "eiei";
}
else {
  echo "haha";
}

$sql = "INSERT INTO `event`(`event_name`, `event_detail`, `date_time`, `image`, `status_event`, `user_id`, `event_type`, `organization_id`, `department_id`, `department2_id`, `time_end`)
                VALUES ('$event_name',
                  '$event_detail',
                  '$date_time',
                  '$image',
                  '$status',
                  '$sec',
                  '$event_type',
                  '$org',
                  '$dep',
                  '$dep2',
                  '$time_end')";

if ($conn->query($sql) === TRUE) {
   header("location: show.php?user_id=$sec");
   }
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
