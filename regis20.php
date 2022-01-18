<?php
include "conn.php";
include "header.php";
session_start();
$_SESSION["user_name"] = $_POST["user_name"];
$_SESSION["user_pass"] = $_POST["user_pass"];

?>
<style media="screen">
  input{
    margin-bottom: 15px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container" style="
box-shadow: 0px 0px 13px #e0e0e0;
border-radius: 13px;
width: 35%;
position: absolute;
top: 20%;
right: 10%;">
  <form action="regis30.php" method="post" enctype="multipart/form-data">
  <label for="">ชื่อ-นามสกุล</label>
  <input type="text"  name="name" class="form-control" placeholder="name-lastname" required>
  <hr>
  <label for="" style="">เลขบัตรประชาชน</label>
  <input type="text"   name="idcard" class="form-control" placeholder="id card" required maxlength="13">
  <label for="" style="">เบอร์โทร</label>
  <input type="text"   name="phone" class="form-control" placeholder="phone number"required maxlength="10">
  <a href="regis10.php" class="btn btn-danger">ย้อนกลับ</a>
  <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">  </form>
</div>
