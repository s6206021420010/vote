<?php
  include "conn.php";
  $list = $_POST["list"];
  $id = $_POST["id"];
  $number = $_POST["number"];
  $user_id = $_POST["user_id"];
  $event_id = $_POST["id"];
  $filePath = "images/".basename($_FILES["fileToUpload"]["name"]);
  $imageName = $_FILES["fileToUpload"]["name"];

  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$filePath)){
    // echo "eiei";
  }
  else {
    // echo "haha";
  }

  echo $sql = "INSERT INTO `applicant`(`applicant_id`, `applicant_name`, `applicant_number`,`applicant_image`, `event_id`)
   VALUES ('','$list','$number','$imageName','$id')";


  
if ($conn->query($sql) === TRUE) {
  header("location: list.php?event_id=$event_id&&user_id=$user_id");
  }
 else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}




 ?>
