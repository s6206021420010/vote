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

$temp = explode(".", $_FILES["image"]["name"]);
$image = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);



$sql = "INSERT INTO `organization`(`organization_id`, `organization_name`, `department_id`) VALUES ('','$org','')";
$result = mysqli_query($conn,$sql);
$sql1 = "SELECT * FROM `organization` WHERE organization_name = '$org'";
$result1 = mysqli_query($conn,$sql1);
$row = $result1->fetch_assoc();
$org_n = $row["organization_id"];
$sql2 = "INSERT INTO `department`(`department_id`, `department_name`, `organization_id`) VALUES ('','$dep','$org_n')";
$result2 = mysqli_query($conn,$sql2);
$sql3 = "SELECT * FROM `department` WHERE department_name = '$dep'";
$result3 = mysqli_query($conn,$sql3);
$row1 = $result3->fetch_assoc();
$dep_n = $row1["department_id"];
$sql4 = "INSERT INTO `department2`(`department2_id`, `department2_name`, `department_id`) VALUES ('','$dep2','$dep_n')";
$result4 = mysqli_query($conn,$sql4);
$sql5 = "SELECT * FROM `department2` WHERE department2_name = '$dep2'";
$result5 = mysqli_query($conn,$sql5);
$row2 = $result5->fetch_assoc();
$dep_m = $row2["department2_id"];

$sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status)
VALUES ('{$name}', '{$id_card}', '{$number}', '{$image}', '{$user_name}', '{$user_pass}', '{$org_n}', '{$dep_n}', '{$dep_m}','1')";

if ($conn->query($sql9) == TRUE) {
   header("location: index.php");
}
  else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
