<?php
include "conn.php";
$id = $_GET["id"];
$sql = "SELECT * FROM `user` WHERE user_id = '$id'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();

if ($row['status'] == 4) {
  echo $sql = "UPDATE `user` SET status = '3' WHERE user_id = '$id'";
  mysqli_query($conn,$sql);

}
if ($row['status'] == 3) {
  echo $sql = "UPDATE `user` SET status = '4' WHERE user_id = '$id'";
  mysqli_query($conn,$sql);
  echo "4";
}

// $row = $results->fetch_assoc();
// if (isset($_GET["all"])) {
//   $sql = "UPDATE `event` SET `event_type`='2' WHERE event_type = '1'";
//   $results = mysqli_query($conn,$sql);
//   echo "2";
// }
// if (isset($_GET["un"])) {
//   $sql = "UPDATE `event` SET `event_type`='1' WHERE event_type = '2'";
//   $results = mysqli_query($conn,$sql);
//   echo "1";
// }
// if ($row['event_type'] == 1) {
//   $sql = "UPDATE `event` SET `event_type`='2' WHERE event_id = '$id'";
//   $results = mysqli_query($conn,$sql);
//   echo "2";
// }
// if ($row['event_type'] == 2) {
//   $sql = "UPDATE `event` SET `event_type`='1' WHERE event_id = '$id'";
//   $results = mysqli_query($conn,$sql);
//   echo "1";
//
// }
// ***************************************

 ?>
