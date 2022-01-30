<?php
include("conn.php");
if(isset($_POST['idcard'])){
    $idcard = $_POST['idcard'];
$sql = "SELECT * FROM `user` WHERE $idcard";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "value";
    }
    else{
        echo "1";
    }
}
if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
$sql = "SELECT * FROM `user` WHERE $phone";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "phone1";
    }
    else{
        echo "phone2";
    }
}
?>