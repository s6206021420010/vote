<?php

include("conn.php");
session_start();
$_SESSION["regis"] = "1";
echo $name = $_SESSION["name"];
echo $id_card = $_SESSION["idcard"];
echo $number = $_SESSION["phone"];
echo $user_name = $_SESSION["user_name"];
echo $user_pass = $_SESSION["user_pass"];
echo $org = $_SESSION["school"];
echo $dep = $_SESSION["list"];
echo $dep2 = $_SESSION["room"];
$image1 = $_POST["image"];
$temp = explode(".", $_FILES["image"]["name"]);
$image = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);




$sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status)
VALUES ('{$name}', '{$id_card}', '{$number}', '{$image1}', '{$user_name}', '{$user_pass}', '{$org}', '{$dep}', '{$dep2}','3')";

if ($conn->query($sql9) == TRUE) {
   header("location: index.php");
}
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
