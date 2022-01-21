<?php
  include "conn.php";
  $list = $_POST["list"];
  $id = $_POST["id"];
  $number = $_POST["number"];
  $user_id = $_POST["user_id"];
  $applicant_id = $_POST["applicant_id"];
  $event_id = $_POST["id"];
  $filePath = "images/".basename($_FILES["fileToUpload"]["name"]);
  $imageName = $_FILES["fileToUpload"]["name"];

  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$filePath)){
    // echo "eiei";
  }
  else {
    // echo "haha";
  }

  echo $sql = "UPDATE `applicant` SET `applicant_id`='$applicant_id',`applicant_name`='$list',`applicant_number`='$number',`applicant_image`='$imageName',`event_id`='$id' WHERE `applicant_id`='$applicant_id' ";


  
if ($conn->query($sql) === TRUE) {
  header("location: list.php?event_id=$event_id&&user_id=$user_id");
  }
 else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}




 ?>
