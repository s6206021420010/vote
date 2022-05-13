<?php
include "conn.php";
if (isset($_POST["pass"])) {
  $pass=$_POST["pass"];
   $email = $_POST["email"];
  echo $sql="UPDATE `user` SET `user_pass`='$pass' WHERE `email`='$email'";
  $result = mysqli_query($conn,$sql);
  echo "success";
}else{
 $email = $_POST["email"];
 $sql="SELECT * FROM `user` WHERE `email`= '$email'";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_num_rows($result);
 echo $row ;
}

 ?>
