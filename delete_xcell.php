<?php
include("conn.php");
$delete=$_GET["user_id"];
$sql = "DELETE FROM user WHERE user_id= $delete";

if (mysqli_query($conn, $sql)) {
  header("location:add_xcell.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
