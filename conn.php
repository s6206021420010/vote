<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_product";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
mysqli_query($conn,"set names utf-8");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
