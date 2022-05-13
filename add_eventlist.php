<?php
include("conn.php");
if($_POST){
  $event_type = $_POST["event_type"];
  $event_name = $_POST["event_name"];
  $event_detail = $_POST["event_detail"];
  $date_start = $_POST["date_start"];
  $sec = $_POST["user_id"];
  $status = $_POST["cars"];
  $image = $_FILES["file"]['name'];
  $org = $_POST["organization_id"];
  $dep = $_POST["department_id"];
  $dep2 = $_POST["department2_id"];
  $date_end = $_POST["date_end"];
  $time_start = $_POST["time_start"];
  $time_end = $_POST["time_end"];
  $fileame = "images/".basename($image);
}

if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileame)){
  // echo "eiei";
}
else {
  // echo "haha";
}
if($image == NULL){
  $image = "79.png";
}
echo $sql = "INSERT INTO `event`(`event_name`, `event_detail`, `date_start`, `image`, `status_event`, `user_id`, `event_type`, `organization_id`, `department_id`, `department2_id`, `date_end`, `time_start`, `time_end`) VALUES ('$event_name','$event_detail','$date_start','$image','$status','$sec','$event_type','$org','$dep','$dep2','$date_end','$time_start','$time_end')";
 
if($result = $conn->query($sql)){
  header("location:show.php");
}
