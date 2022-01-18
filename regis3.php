<?php
include "conn.php";
include "header.php";
session_start();

$_SESSION["name"] = $_POST["name"];
$_SESSION["idcard"] = $_POST["idcard"];
$_SESSION["phone"] = $_POST["phone"];
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
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container">
  <h5 style="margin-top:15px;">สมัครสมาชิก 3-6</h5>
  <hr style="width:100%; margin:15px 0px 15px;">

<form class="" action="regis4.php" method="post">
  <label for="">E-mail</label>
  <input  type="email" name="email" value="" class="form-control" placeholder="Email">
  <a href="regis2.php" class="btn btn-danger">ย้อนกลับ</a>
  <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">
</form>
</div>
