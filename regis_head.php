<?php
include "conn.php";
include "header.php";
session_start();
session_unset();

?>
<style media="screen">
  .btn-danger{
    background:#ff5757;
    border-radius:30px;
  }
  .btn-successi{
    background:#38d9a9;
    border:#38d9a9 ;
    border-radius:30px;
    width:30%;
  }
  h7{
    color: white;
    font-size: 24px;
  }
  .btn-success{
    color: #8378f7;
    background: white;
    border: solid 1px #8378f7;
  }
  .btn-success:hover{
    color: #fff;
    background: #8378f7;
    border: solid 1px #8378f7;
  }
</style>
<body>
  <div class="" style="background:#8378f7; width:101%; height:8.5%;position:inherit; top:0px; left:0px;">
    <h7>ระบบเลือกตั้งออนไลน์</h7>
  </div>
  <div class="container">
    <div class="" style="">
      <a href="index.php" class="btn btn-danger" style="margin-top:5px;">กลับ</a>
    </div>
    <div class="row" style="margin-top:10px;">
      <center>
        <div class="card" style="width:50%; margin:13% 0% 13%;">
          <div class="card-header" style="background:#8378f7; color:white;">
            ลงทะเบียน
          </div>
          <div class="row card-body">
            <div class="col-12 col-lg-6">
              <a href="create.php" class="btn btn-success w-100 rounded-pill" style="">ผู้สร้างการเลือกตั้ง</a>
            </div>
            <div class="col-12 mt-2 mt-lg-0 col-lg-6 ">
              <a href="user.php" class="btn btn-success w-100 rounded-pill" >ผู้ลงคะแนน</a>  
            </div>
          </div>
        </div>
      </center>
    </div>
    <div class="row-12" >
      <hr>
      <h6 style="text-align: center;">© 2565 ระบบเลือกตั้งออนไลน์, มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
    </div>
    </div>
  </div>
</body>
