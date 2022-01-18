<?php
include "conn.php";
$idcard = $_POST["idcard"];

if (isset($_POST["idcard"])) {
  $sqls = "SELECT * FROM `user` WHERE id_card = '$idcard'";
  $result = mysqli_query($conn,$sqls);

  if (mysqli_num_rows($result) > 0) {
    echo "success";
  }
  if (mysqli_num_rows($result) == 0) {
    echo "error";
  }
}
?>
