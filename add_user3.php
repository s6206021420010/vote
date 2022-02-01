<?php
include "conn.php";
session_start();
if ($conn->query($_SESSION["sql"]) == TRUE) {
  header("location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  ?>
