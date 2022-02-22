<?php
include "conn.php";
session_start();
echo $user_id = $_SESSION["user_id"];
echo $name = $_POST["name"];
echo $id_card = $_POST["id_card"];
echo $number = $_POST["number"];
echo $user_name = $_POST["user_name"];
echo $user_pass = $_POST["user_pass"];
echo $image = $_FILES["image"]["name"];
echo $email = $_POST["email"];
$stat = $_POST["stat"];
if($image == NULL){
echo $sql = "UPDATE `user` SET `user_id`='$user_id',`name`='$name',`id_card`='$id_card',`number`='$number',`email`='$email',`user_name`='$user_name' WHERE user_id = '$user_id'";
}
else{
echo $sql = "UPDATE `user` SET `user_id`='$user_id',`name`='$name',`id_card`='$id_card',`number`='$number',`email`='$email',`image`='$image',`user_name`='$user_name' WHERE user_id = '$user_id'";
}
 mysqli_query($conn,$sql);
 if($stat == 1){
  header("location:personal0.php?user_id=$user_id&alert=1");
 }
 if($stat == 0){
  header("location:personal.php?user_id=$user_id&alert=1");
 }


 ?>
