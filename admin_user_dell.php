<?php

include "conn.php";
 $id = $_POST["id"];
echo $sql="DELETE FROM `user` WHERE user_id = $id";
   $result=mysqli_query($conn,$sql);
?>