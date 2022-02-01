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

$sql_idcard = "SELECT * FROM `user` WHERE id_card = '$id_card'";
$result6 = mysqli_query($conn,$sql_idcard);
    if ($result6->num_rows > 0) {
      header("location:user.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "1";
    }

    $sql_email = "SELECT * FROM `user` WHERE email = '$email'";
      $result7 = mysqli_query($conn,$sql_email);
      if ($result7->num_rows > 0) {
        header("location:user.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
        $_SESSION["stat"] = "2";
      }

    $sql_number = "SELECT * FROM `user` WHERE number = '$number'";
    $result8 = mysqli_query($conn,$sql_number);
    if ($result8->num_rows > 0) {
      header("location:user.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "3";
  }

     $sql_user = "SELECT * FROM `user` WHERE user_name = '$user_name'";
     $result9 = mysqli_query($conn,$sql_user);
     if ($result9->num_rows > 0) {
      header("location:user.php?id_card=$id_card&name=$name&number=$number&user_name=$user_name&email=$email&org=$org&dep=$dep&dep2=$dep2");
      $_SESSION["stat"] = "4";
}

}
echo $sql9 = "INSERT INTO user (name, id_card, `number`, image, user_name, user_pass, organization_id,	department_id,department2_id,status,email,`provinces`, `amphures`, `districts`)
VALUES ('{$name}', '{$id_card}', '{$number}', '$image ', '{$user_name}', '{$user_pass}', '$org', '$dep', '$dep2','$status','$email','$provinces','$amphures','$districts')";
    if(isset($sql9)){
      $_SESSION["sql"] = $sql9;
      header("location:add_user3.php");
    }
    ?>
    <img src="images/<?php echo $image; ?>" alt="">
      
    
