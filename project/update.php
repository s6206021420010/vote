<?php
include("conn.php");
$event_name = $_POST["event_name"];
$event_detail = $_POST["event_detail"];
$date_time = $_POST["date_time"];
$status_event = $_POST["status_event"];

$sql = "UPDATE event SET event_name={$_POST['event_name']} WHERE event_id= {$_POST['event_id']}";

if (mysqli_query($conn, $sql)) {
  header("location: list.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
