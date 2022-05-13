<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_product";
// $username = "voteonsite";
// $password = "GMg-!Z3NT2";
// $db = "voteonsite_fitm";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// mysqli_query($conn,"set names utf-8");
$conn->set_charset("utf8");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
