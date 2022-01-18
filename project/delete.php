<?php
include("conn.php");
$delete=$_GET["event_id"];
$sql = "DELETE FROM event WHERE event_id= $delete";

if (mysqli_query($conn, $sql)) {
  header("location:show.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
