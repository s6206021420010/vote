<?php
session_start();
include("conn.php");
$sql = "SELECT * FROM `user` WHERE 1";

if($_POST){
echo $name = $_POST["name"];
echo $id_card = $_POST["idcard"];
echo $number = $_POST["phone"];
echo $user_name = $_POST["user_name"];
echo $_SESSION["pass"] = $user_pass = $_POST["user_pass"];
echo $email = $_POST["email"];
echo $_SESSION["provinces"] = $provinces = $_POST["provinces"];
echo $amphures = $_POST["amphures"];
echo $districts = $_POST["districts"];
echo $org = $_POST["b1"];
echo $dep = $_POST["b2"];
echo $dep2 = $_POST["b3"];
echo $status = $_POST["status"];
echo $image = $_FILES["image"]['name'];


}

 $temp = explode(".", $_FILES["image"]["name"]);
 $image = round(microtime(true)) . '.' . end($temp);  
 move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

$sql_idcard = "SELECT * FROM `user` WHERE id_card = '$id_card'";
$result6 = mysqli_query($conn,$sql_idcard);
    if ($result6->num_rows > 0) {
      header("location:create.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "1";
    }

    $sql_email = "SELECT * FROM `user` WHERE email = '$email'";
      $result7 = mysqli_query($conn,$sql_email);
      if ($result7->num_rows > 0) {
        header("location:create.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
        $_SESSION["stat"] = "2";
      }

    $sql_number = "SELECT * FROM `user` WHERE number = '$number'";
    $result8 = mysqli_query($conn,$sql_number);
    if ($result8->num_rows > 0) {
      header("location:create.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "3";
  }

     $sql_user = "SELECT * FROM `user` WHERE user_name = '$user_name'";
     $result9 = mysqli_query($conn,$sql_user);
     if ($result9->num_rows > 0) {
      header("location:create.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "4";
}
      $sql_org = "SELECT * FROM `organization` WHERE organization_name = '$org'";
      $result10 = mysqli_query($conn,$sql_org);
      if ($result10->num_rows > 0) {
      header("location:create.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
     $_SESSION["stat"] = "5";

    }
$sql = "INSERT INTO `organization`(`organization_id`, `organization_name`, `department_id`) VALUES ('','$org','')";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM `organization` WHERE organization_name = '$org'";
$result1 = mysqli_query($conn, $sql1);
$row = $result1->fetch_assoc();
$org_n = $row["organization_id"];
$sql2 = "INSERT INTO `department`(`department_id`, `department_name`, `organization_id`) VALUES ('','$dep','$org_n')";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM `department` WHERE department_name = '$dep'";
$result3 = mysqli_query($conn, $sql3);
$row1 = $result3->fetch_assoc();
$dep_n = $row1["department_id"];
$sql4 = "INSERT INTO `department2`(`department2_id`, `department2_name`, `department_id`) VALUES ('','$dep2','$dep_n')";
$result4 = mysqli_query($conn, $sql4);
$sql5 = "SELECT * FROM `department2` WHERE department2_name = '$dep2'";
$result5 = mysqli_query($conn, $sql5);
$row2 = $result5->fetch_assoc();
$dep_m = $row2["department2_id"];

echo $sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status,email,`provinces`, `amphures`, `districts`)
VALUES ('{$name}', '{$id_card}', '{$number}', '$image ', '{$user_name}', '{$user_pass}', '$org_n', '$dep_n', '$dep_m','$status','$email','$provinces','$amphures','$districts')";
if(isset($sql9)){
  $_SESSION["sql"] = $sql9;
  header("location:add_user2.php");
}

    ?>
    <img src="images/<?php echo $image; ?>" alt="">
      
    
