<?php
session_start();
include("conn.php");
if($_POST){
$name = $_POST["name"];
$id_card = $_POST["idcard"];
$number = $_POST["phone"];
$user_name = $_POST["user_name"];
$_SESSION["pass"] = $user_pass = $_POST["user_pass"];
$email = $_POST["email"];
$_SESSION["provinces"] = $provinces = $_POST["provinces"];
$amphures = $_POST["amphures"];
$districts = $_POST["districts"];
$org = $_POST["b1"];
$dep = $_POST["b2"];
$dep2 = $_POST["b3"];
$status = "1";
$result = [];
}

$err = [];
$sql_idcard = "SELECT * FROM `user` WHERE id_card = '$id_card'";
$result6 = mysqli_query($conn,$sql_idcard);
    if ($result6->num_rows > 0) {
      $_SESSION["stat"] = "1";
    $err[] = "idc";
    }
    $sql_email = "SELECT * FROM `user` WHERE email = '$email'";
      $result7 = mysqli_query($conn,$sql_email);
      if ($result7->num_rows > 0) {
        $err[] = "em";
      }
    $sql_number = "SELECT * FROM `user` WHERE number = '$number'";
    $result8 = mysqli_query($conn,$sql_number);
    if ($result8->num_rows > 0) {
      $_SESSION["stat"] = "3";
      $err[] = "num";
  }
     $sql_user = "SELECT * FROM `user` WHERE user_name = '$user_name'";
     $result9 = mysqli_query($conn,$sql_user);
     if ($result9->num_rows > 0) {
      $err[] = "use";
}
      $sql_org = "SELECT * FROM `organization` WHERE organization_name = '$org'";
      $result10 = mysqli_query($conn,$sql_org);
      if ($result10->num_rows > 0) {
         $err[] = "org";
    }
    if (!empty($err[0])) {
    echo json_encode($err);
    }
    else {
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
          
          $sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status,email,`provinces`, `amphures`, `districts`)
          VALUES ('{$name}', '{$id_card}', '{$number}', 'user1.png', '{$user_name}', '{$user_pass}', '$org_n', '$dep_n', '$dep_m','$status','$email','$provinces','$amphures','$districts')";
          mysqli_query($conn,$sql9);
           $err[] = "success";

           echo json_encode($err);
    }

//     ?>
