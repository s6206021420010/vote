<?php include "header.php"; include "conn.php";
$org = $_GET["org"];
$dep = $_GET["dep"];
$dep2 = $_GET["dep2"];
$sql = "SELECT * FROM `organization` WHERE organization_name = '$org'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
echo $row["organization_id"];
?>
