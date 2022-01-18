<?php
include "conn.php";
$user = $_POST["user"];

if (isset($_POST["user"])) {
  $sqls = "SELECT * FROM `user` WHERE user_name = '$user'";
  $result = mysqli_query($conn,$sqls);

  if (mysqli_num_rows($result) > 0) {
    echo "non";
  }
  if (mysqli_num_rows($result) == 0) {
    echo "shorray";
  }
}
?>
