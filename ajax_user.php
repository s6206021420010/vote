<?php
include "conn.php";
$id = $_GET["id"];
$event_id = $_GET["event_id"];

$sql = "SELECT * FROM `event_user` WHERE event_id = $event_id AND user_id = $id";
$result = mysqli_query($conn,$sql);
if($result->num_rows > 0){
  $sql2 = "DELETE FROM `event_user` WHERE event_id = $event_id AND user_id = $id";
  $result2 = mysqli_query($conn,$sql2);
}
else{
  $sql1 = "INSERT INTO `event_user`( `event_id`, `user_id`) VALUES ('$event_id','$id')";
  $result1 = mysqli_query($conn,$sql1);
}

/*
$sql = "INSERT INTO `event_user`( `event_id`, `user_id`) VALUES ('$event_id','$id')";
$result = mysqli_query($conn,$sql);
echo "$sql";
*/
/*
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
*/
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
