<?php
include "conn.php";
$id = $_GET["id"];
$user = $_GET["user"];

$sqls = "SELECT * FROM `event` WHERE event_id = '$id'";
$results = mysqli_query($conn,$sqls);
$row = $results->fetch_assoc();
if (isset($_GET["all"])) {
  $sql = "UPDATE `event` SET `event_type`='2' WHERE event_type = '1'";
  $results = mysqli_query($conn,$sql);
  echo "2";
}
if (isset($_GET["un"])) {
  $sql = "UPDATE `event` SET `event_type`='1' WHERE event_type = '2'";
  $results = mysqli_query($conn,$sql);
  echo "1";
}
if ($row['event_type'] == 1) {
  $sql = "UPDATE `event` SET `event_type`='2' WHERE event_id = '$id'";
  $results = mysqli_query($conn,$sql);
  echo "2";
}
if ($row['event_type'] == 2) {
  $sql = "UPDATE `event` SET `event_type`='1' WHERE event_id = '$id'";
  $results = mysqli_query($conn,$sql);
  echo "1";

}
// ***************************************

 ?>
