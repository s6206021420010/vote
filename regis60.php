<?php
include "conn.php";
include "header.php";
session_start();

$_SESSION["school"] = $_POST["school"];
$_SESSION["list"] = $_POST["list"];
$_SESSION["room"] = $_POST["room"];
?>
<!-- <style media="screen">
  #im {
    border-radius: 99%;
    border-width: 1px;
    border: black;
    width: 27%;
    margin-left: 36%;
    margin-top: 7%;
  }

  input {
    margin-bottom: 15px;
  }

  hr {
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }

  .container {
    box-shadow: 0px 0px 13px #e0e0e0;
    border-radius: 13px;
    width: 35%;
    position: absolute;
    top: 20%;
    right: 10%;
  }

  .imgbg {
    width: 35%;
    position: absolute;
    top: 30%;
    left: 12%;
  }

  h4 {
    margin: 3% 0% 3%
  }

  .h7 {
    font-size: 13px;
    color: #dc3545;
  }
</style> -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 text-center  ">
      <img width="250px" height="250px" src="images/document.png" alt="">
    </div>
    <div class="col-12">
      <form class="" action="add_user0.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-12">
                <h6>Username</h6>
                <label for="" class="form-control"><?php echo $_SESSION["user_name"]; ?></label>
              </div>
              <div class="col-12">
                <h6>ชื่อ</h6>
                <label for="" class="form-control"><?php echo $_SESSION["name"]; ?></label>
              </div>
              <div class="col-12">
                <h6>เบอร์โทร</h6>
                <label for="" class="form-control"><?php echo $_SESSION["phone"]; ?></label>
              </div>
              <div class="col-12">
                <h6>จังหวัด</h6>
                <label for="" class="form-control"><?php echo $_SESSION["provinces"]; ?></label>
              </div>
              <div class="col-12">
                <h6>ตำบล</h6>
                <label for="" class="form-control"><?php echo $_SESSION["districts"]; ?></label>
              </div>
              <div class="col-12">
                <h6>ชื่อองค์กร</h6>
                <label for="" class="form-control"><?php echo $_SESSION["school"]; ?></label>
              </div>
              <div class="col-12">
                <h6>รายละเอียดย่อย 2</h6>
                <label for="" class="form-control"><?php echo $_SESSION["room"]; ?></label>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="col-12">
              <h6>Password</h6>
              <label for="" class="form-control"><?php echo $_SESSION["user_pass"]; ?></label>
            </div>
            <div class="col-12">
              <h6>เลขบัตรประชาชน</h6>
              <label for="" class="form-control"><?php echo $_SESSION["idcard"]; ?></label>
            </div>
            <div class="col-12">
              <h6>รูปประจำตัว</h6>
              <label for="" class="form-control"><?php echo $_SESSION["image"]; ?></label>
            </div>
            <div class="col-12">
              <h6>อำเภอ</h6>
              <label for="" class="form-control"><?php echo $_SESSION["amphures"]; ?></label>
            </div>
            <div class="col-12">
              <h6>รหัรหัสไปรษณีย์</h6>
              <label for="" class="form-control"><?php echo $_SESSION["zip_code"]; ?></label>
            </div>
            <div class="col-12">
              <h6>รายละเอียดย่อย 1</h6>
              <label for="" class="form-control"><?php echo $_SESSION["list"]; ?></label>
            </div>
          </div>

        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-6 text-center">
            <div class="row justify-content-center">
              <div class="col-12">
                <a href="regis50.php" class="btn btn-danger col-4 mr-2">ย้อนกลับ</a>
                <input style="float: right;" type="submit" name="" class="btn btn-success col-4" value="ยืนยันการลงทะเบียน">

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>


    <!-- <div class="col-md-6">
      <img class="imgbg" src="images/document.png" alt="">
    </div>
    <div class="col-md-6">
      <form class="" action="add_user0.php" method="post" enctype="multipart/form-data">
        <h4>สมัครสมาชิก</h4>
        <h6>รูปโปรไฟล์</h6>
        <input type="file" name="image" value="" class="form-control" required>
        <h7 class="h7">* โปรดตรวจสอบข้อมูลส่วนตัว</h7>
        <hr style="margin:2% 0% 2% 5%;">
        <h6>Username</h6>
        <label for="" class="form-control"><?php echo $_SESSION["user_name"]; ?></label>
        <h6>Password</h6>
        <label for="" class="form-control"><?php echo $_SESSION["user_pass"]; ?></label>
        <h6>ชื่อ</h6>
        <label for="" class="form-control"><?php echo $_SESSION["name"]; ?></label>
        <h6>เลขบัตรประชาชน</h6>
        <label for="" class="form-control"><?php echo $_SESSION["idcard"]; ?></label>
        <h6>เบอร์โทร</h6>
        <label for="" class="form-control"><?php echo $_SESSION["phone"]; ?></label>
        <h6>รูปประจำตัว</h6>
        <label for="" class="form-control"><?php echo $_SESSION["image"]; ?></label>
        <h6>จังหวัด</h6>
        <label for="" class="form-control"><?php echo $_SESSION["provinces"]; ?></label>
        <h6>อำเภอ</h6>
        <label for="" class="form-control"><?php echo $_SESSION["amphures"]; ?></label>
        <h6>ตำบล</h6>
        <label for="" class="form-control"><?php echo $_SESSION["districts"]; ?></label>
        <h6>รหัรหัสไปรษณีย์</h6>
        <label for="" class="form-control"><?php echo $_SESSION["zip_code"]; ?></label>
        <h6>ชื่อองค์กร</h6>
        <label for="" class="form-control"><?php echo $_SESSION["school"]; ?></label>
        <h6>รายละเอียดย่อย 1</h6>
        <label for="" class="form-control"><?php echo $_SESSION["list"]; ?></label>
        <h6>รายละเอียดย่อย 2</h6>
        <label for="" class="form-control"><?php echo $_SESSION["room"]; ?></label>
        <a href="regis50.php" class="btn btn-danger">ย้อนกลับ</a>
        <input style="float: right;" type="submit" name="" class="btn btn-success" value="ยืนยันการลงทะเบียน">
      </form>
    </div> -->
  </div>
</div>