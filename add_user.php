<?php

include("conn.php");

echo $name = $_POST["name"];
echo $id_card = $_POST["idcard"];
echo $number = $_POST["phone"];
echo $user_name = $_POST["user_name"];
echo $user_pass = $_POST["user_pass"];
echo $email = $_POST["email"];
echo $provinces = $_POST["provinces"];
echo $amphures = $_POST["amphures"];
echo $districts = $_POST["districts"];
// echo $images = $_POST["image"];
//
// $temp = explode(".", $_FILES["image"]["name"]);
// $image = round(microtime(true)) . '.' . end($temp);
// move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);



// $sql = "INSERT INTO `organization`(`organization_id`, `organization_name`, `department_id`) VALUES ('','$org','')";
// $result = mysqli_query($conn,$sql);
// $sql1 = "SELECT * FROM `organization` WHERE organization_name = '$org'";
// $result1 = mysqli_query($conn,$sql1);
// $row = $result1->fetch_assoc();
// $org_n = $row["organization_id"];
// $sql2 = "INSERT INTO `department`(`department_id`, `department_name`, `organization_id`) VALUES ('','$dep','$org_n')";
// $result2 = mysqli_query($conn,$sql2);
// $sql3 = "SELECT * FROM `department` WHERE department_name = '$dep'";
// $result3 = mysqli_query($conn,$sql3);
// $row1 = $result3->fetch_assoc();
// $dep_n = $row1["department_id"];
// $sql4 = "INSERT INTO `department2`(`department2_id`, `department2_name`, `department_id`) VALUES ('','$dep2','$dep_n')";
// $result4 = mysqli_query($conn,$sql4);
// $sql5 = "SELECT * FROM `department2` WHERE department2_name = '$dep2'";
// $result5 = mysqli_query($conn,$sql5);
// $row2 = $result5->fetch_assoc();
// $dep_m = $row2["department2_id"];

 echo $sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status,email,`provinces`, `amphures`, `districts`)
VALUES ('{$name}', '{$id_card}', '{$number}', '', '{$user_name}', '{$user_pass}', '', '', '','1','$email','$provinces','$amphures','$districts')";

// if ($conn->query($sql9) == TRUE) {
//    header("location: index.php");
// }
//   else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $conn->close();
?>
