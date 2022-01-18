<!DOCTYPE html>
<html>
<?php  include "conn.php";  include "function.php"; include "header.php";
?>
<meta charset="UTF-8">
<head>
  <head>
</head>
<style media="screen">
  #p{
    display:none;
  }
  #p1{
    display:none;
  }
  #p2{
    display:none;
  }
</style>
<body>
  <div class="container" style=" box-shadow:0px 1px 10px #b3b3b3; margin-top:2%;width:65%; border-radius:5px;">
    <div class="row">
      <div class="col-6">
        <h3>สมัครสมาชิก</h3>
        <form action="add_user.php" method="post" enctype="multipart/form-data">
            <label for="">ชื่อ-นามสกุล</label>
            <input type="text" id="" name="name" class="form-control" placeholder="Your name.." required>

        <label for="">Username</label>
        <input type="text" id="" name="user_name" class="form-control" placeholder="Username" required>
        <label for="" style="">Password</label>
        <input type="password" id="" name="user_pass" class="form-control" placeholder="Password" required>
        <label for="" style="">Confirm Password</label>
        <input type="password" id="" name="pass" class="form-control" placeholder="Password" required>
        <input style="margin:10px 10px 10px 0px;"type="submit" name="" value="ยืนยัน" class="btn btn-success">

        </div>
        <div class="col-6">
          <label style="margin-top:43px;"for="">รูปภาพ</label>
          <input type="file" class="form-control" name="image" >
          <label for="">เลขบัตรประชาชน</label>
          <input type="text" id="" name="id_card" class="form-control" placeholder="เลขบัตรประชาชน..." required() maxlength="13">
      <label for="">เบอร์โทร</label>
      <input type="text"  name="number" class="form-control" placeholder="เบอร์โทร" required maxlength="10">
      <input type="radio" id="rrr"name="rrr" value="มหาวิทยาลัย">      <label  for="sel1">มหาวิทยาลัย </label>
      <input type="radio" id="rrr1"name="rrr" value="บริษัท">      <label for="sel1">บริษัท </label>
      <input style="margin-top:1%;margin-left:22%;" type="button" data-toggle="modal" data-target="#myModal" name="" class="btn btn-success"value="เพิ่มองค์กรณ์"><br>

      <?php
      $result = $conn->query("SELECT * FROM organization"); ?>
      <p id="p">
        <label id="m" for="sel1">มหาวิทยาลัย</label>
        <select class="form-control" name="org" id="provinces"required>
              <option value="" selected disabled>มหาวิทยาลัย</option>
              <?php foreach ($result as $value) { ?>
              <option value="<?=$value['organization_id']?>"> <?=$value['organization_name']?></option>
              <?php } ?>
        </select>
        <label id="k"for="sel1">คณะ</label>
        <select class="form-control" name="dep" id="amphures"required>
        </select>
        <label id="s"for="sel1" >สาขา</label>
        <select style="margin-bottom:15px;"class="form-control" name="dep2" id="districts"required>
        </select>
      </p>

          <?php include('script.php');
          ?>
    </form>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มองค์กรณ์</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form class="" action="add_org.php" method="post">
          <label for="sel1" >บริษัท</label>
          <input class="form-control"type="text" name="org" placeholder="กรุณากรอกบริษัท"value="" required>
          <label for="sel1" >สาขา</label>
          <input class="form-control"type="text" name="dep" placeholder="กรุณากรอกสาขา"value="" required>
          <label for="sel1" >ฝ่าย</label>
          <input class="form-control"type="text" name="dep2" placeholder="กรุณากรอกฝ่าย"value="" required>
          <input style="margin-top:2%;" type="submit"class="btn btn-success" name="" value="เพิ่มองค์กรณ์">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</html>
<?php ?>
