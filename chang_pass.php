<?php
include "conn.php";
$pass = $_POST['pass'];
$id = $_POST['id'];
 $sql = "UPDATE `user` SET `user_pass`='$pass' WHERE `user_id` = $id";
 $result = mysqli_query($conn,$sql);
if (!empty($result)) {
    echo "success";
}else{
    echo "error";
}
?> 