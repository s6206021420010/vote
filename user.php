<?php
include "conn.php";
include "header.php";
?>
<style media="screen">
  .btn-danger{
    background:#ff5757;
    border-radius:30px;
  }
  .btn-success{
    background:#38d9a9;
    border:#38d9a9 ;
    border-radius:30px;
    width:30%;
  }
  h7{
    color: white;
    font-size: 24px;
  }
</style>
<body>
  <?php
  include "conn.php";
  include "header.php";
  ?>
  <style media="screen">
    .btn-danger{
      background:#ff5757;
      border-radius:30px;
    }
    .btn-success{
      background:#38d9a9;
      border:#38d9a9 ;
      border-radius:30px;
      width:15%;
    }
    h7{
      color: white;
      font-size: 24px;
    }
  </style>
  <body>
    <div class="" style="background-image: linear-gradient(45deg, #be4bdb 5%, #75cefa 95%); width:101%; height:8.5%;position:inherit; top:0px; left:0px;">
      <h7>ระบบเลือกตั้งออนไลน์</h7>
    </div>
    <div class="container">
      <div class="row-12" style="">
        <a href="index.php" class="btn btn-danger" style="margin-top:5px;">กลับ</a>
      </div>
      <div class="row-12" style="margin-top:10px;">

          <div class="card" style="width:100%; ">
            <div class="card-header" style="background-image: linear-gradient(270deg, #fefffe 5%, #38d9a9 95%);">
              ลงทะเบียนผู้จัดการการเลือกตั้ง
            </div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-3">
                    <h6>กรอกข้อมูลการเลือกตั้ง</h6>
                  </div>
                </div>
                <div class="row">
                  <hr style="width:98%;">
                  <div class="col-6">
                    <label for="">รหัสบัตรประชาชน</label><input type="text"  class="form-control form-control-sm"name="" value="">
                    <label for="">เบอร์โทร</label><input type="text"  class="form-control form-control-sm"name="" value="">
                  </div>
                  <div class="col-6">
                    <label for="">ชื่อ - นามสกุล</label><input type="text"  class="form-control form-control-sm"name="" value="">
                    <label for="">Email</label><input type="text"  class="form-control form-control-sm"name="" value="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                      <label for="">Username</label><input type="text"  class="form-control form-control-sm"name="" value="">
                  </div>
                  <div class="col-4">
                      <label for="">Password</label><input type="text"  class="form-control form-control-sm"name="" value="">
                  </div>
                  <div class="col-4">
                      <label for="">ยืนยัน Password</label><input type="text"  class="form-control form-control-sm"name="" value="">
                  </div>
                </div>
                <div class="row">
                  <br>
                  <hr style="width:98%;">
                  <h6>ข้อมูลองค์กร</h6>
                  <div class="col">
                    <a href="#" class="btn btn-success">บริษัท</a>
                    <a href="#" class="btn btn-success">นักเรียน-นักศึกษา</a>
                    <a href="#" class="btn btn-success">เลือกตั้งท้องถิ่น</a>
                    <a href="#" class="btn btn-success">อื่น ๆ / บุคคนทั่วไป</a>

                  </div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-2">
                    <label for="">อัพโหลดรูปภาพ</label>
                  </div>
                  <div class="col-5">
                    <input type="file" class="form-control" name="" value="" >
                  </div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-3">
                  </div>
                  <div class="col-3">
                      <a href="regis_head.php" class="btn btn-danger" style="width:100%;">ยกเลิก</a>
                  </div>
                  <div class="col-3">
                       <input type="submit" class="btn btn-success" style="width:100%;" name="" value="ลงทะเบียน">
                  </div>
                  <div class="col-3">
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
      <div class="row-12" >
      <br>
        <h6 style="text-align: center;">© 2565 ระบบเลือกตั้งออนไลน์, มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
      </div>
      </div>
    </div>
  </body>

</body>
