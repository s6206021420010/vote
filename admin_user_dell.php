<?php

include "conn.php";
 $id = $_POST["id"];
echo $sql="UPDATE `user` SET  `dell`='1' WHERE user_id = $id";
   $result=mysqli_query($conn,$sql);
?>