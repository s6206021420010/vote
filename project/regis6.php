<?php
include "conn.php";
include "header.php";
session_start();

$_SESSION["school"] = $_POST["school"];
$_SESSION["list"] = $_POST["list"];
$_SESSION["room"] = $_POST["room"];
?>
<style media="screen">
#im{
  border-radius: 99%;
  border-width: 1px;
  border: black;
  width: 27%;
  margin-left: 36%;
  margin-top: 7%;
}
  input{
    margin-bottom: 15px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }
  .container{
    box-shadow: 0px 0px 13px #e0e0e0;
    border-radius: 13px;
    width: 35%;
    position: absolute;
    top: 20%;
    right: 10%;
  }
  .imgbg{
    width: 35%;
    position: absolute;
    top: 30%;
    left: 12%;
  }
  h4{
    margin: 3% 0% 3%
  }
  .h7{
    font-size: 13px;
    color: #dc3545;
  }
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container">
<form class="" action="add_user.php" method="post" enctype="multipart/form-data">


    <h5 style="margin-top:15px;">สมัครสมาชิก 6-6</h5>
  <hr style="margin:2% 0% 2% 5%;">
  <label for="">เลือกรูปภาพ</label>
  <input type="file" class="form-control" name="image" value="" required>
  <a href="regis5.php" class="btn btn-danger">ย้อนกลับ</a>
  <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ยืนยันการลงทะเบียน">
</form>
</div>
