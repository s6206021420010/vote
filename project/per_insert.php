<?php
$user_id = $_POST["user_id"];
$name = $_POST["name"];
$id_card = $_POST["id_card"];
$number = $_POST["number"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
include "conn.php";
$sql = "SELECT * FROM `user` ";
$result = mysqli_query($conn,$sql);
while ($row = $result -> fetch_array()) {
  echo $row['2'];
  // $sql = "UPDATE `user` SET `name`='$name',`id_card`='$id_card',`number`='$number',`user_name`='$user_name',`user_pass`='$user_pass' WHERE user_id = '$user_id'";
  // mysqli_query($conn,$sql);
  // header("location:personal.php?user_id=$user_id");

}
for(){

}
 ?>
