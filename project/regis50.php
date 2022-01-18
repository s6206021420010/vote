<?php
include "conn.php";
include "header.php";
session_start();

$_SESSION["provinces"] = $_POST["provinces"];
$_SESSION["amphures"] = $_POST["amphures"];
$_SESSION["districts"] = $_POST["districts"];
$_SESSION["zip_code"] = $_POST["zip_code"];
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
    margin: 5% 5% ;
  }
  .container{
    box-shadow: 0px 0px 13px #e0e0e0;
    border-radius: 13px;
    width: 35%;
    position: absolute;
    top: 20%;
    right: 10%;
  }
  .new{
    margin: 2px;
    background: #ffc107;
  }
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container">

  <hr>
  <h6 style="color:red;">* เลือกองค์กรณ์ที่จะเข้าร่วม</h6>
  <!-- ....................................บริษัท -->
  <br>


    <form class="" action="regis60.php" method="post">
      <?php
      $result = $conn->query("SELECT * FROM organization"); ?>
      <p id="p">
        <label id="m" for="sel1">มหาวิทยาลัย</label>
        <select class="form-control" name="school" id="provinces"required>
              <option value="" selected disabled>มหาวิทยาลัย</option>
              <?php foreach ($result as $value) { ?>
              <option value="<?=$value['organization_id']?>"> <?=$value['organization_name']?></option>
              <?php } ?>
        </select>
        <label id="k"for="sel1">คณะ</label>
        <select class="form-control" name="list" id="amphures"required>
        </select>
        <label id="s"for="sel1" >สาขา</label>
        <select style="margin-bottom:15px;"class="form-control" name="room" id="districts"required>
        </select>
      </p>
      <a href="regis40.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">
          <?php include('script.php');
          ?>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
