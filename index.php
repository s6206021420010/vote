<!DOCTYPE html>
<?php
  error_reporting(0);
   include "header.php";
   include "login.php";
   if(!isset($_SESSION))
   {
   session_start();
   }
   ?>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;1,100;1,200&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>

body {
font-family:'Prompt', sans-serif;
}
form {border: 0px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

h1{
  font-family: 'Prompt', sans-serif;
  color: #3D4C53;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  margin-left: 10px;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 80%;
}

.container {
  padding: 1px;
  background-image: url(beach.jpg);
  border-radius: 8px;
}

.containe-end {
  padding: 16px;

}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
  /* faloat:right ชิดขวา****************/
}
</style>
</head>
<body>
  <video style="width:100%; position:absolute;top:0px; z-index:-1;filter: blur(0px);object-fit:cover;height:100%;" autoplay muted loop >
    <source src="images/Computer - 47158.mp4" type="video/mp4">
  </video>
<div class="container" style="background:white;margin-top:4%;width:65%; height:420px;">
  <div class="row" style="">
    <div class="col-6">
    <img src="images/kmutnb.png" style="width: 65%;margin: 17% 3% 10% 19%" alt="">
    </div>
    <div class="col-6 sm-1 lg-1" style="">
      <h1 style="color:#252727; margin-top:23.5%;">เลือกตั้งออนไลน์</h1>
      <form action="login.php" method="post" style="">
          <input style="width:90% ;margin-top:1%;" class="form-control" type="text" placeholder="Enter Username" name="username" required>
          <input style="width:90%;" class="form-control" type="password" placeholder="Enter Password" name="password" required>
          <button style="width:20%; margin:3% 0% 3% 0%;" type="submit" class="btn btn-primary">Login</button>
          <br>
          <span class="psw" style="color:#252727;">Forgot <a href="#" style="color:#252727;">password?</a></span><a style="width:50%; margin-left:40%;"href="regis_head.php">Register</a><br>
      </form>

    </div>
    <?php

  if (isset($_GET['sweet'])) {
    if ($_GET['sweet'] == 1) {
      echo "<script>Swal.fire(
        'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
        'Invalid username or password',
        'error'
        )</script>";
        clearstatcache();
      }
      else if ($_GET['sweet'] == 0) {
    echo "<script>Swal.fire(
      'ยังไม่ได้รับการยืนยัน',
      'not confirmed',
      'error'
      )</script>";
      $_GET['sweet'] = 2;

}
  }

    if(isset($_SESSION)){
      if ($_SESSION["regis"] == 1) {
        echo "<script>Swal.fire(
          'ลงทะเบียนสำเร็จ',
          'Successful',
          'success'
            )</script>";

    }
    if ($_SESSION["regis"] == "") {
      echo "<script>Swal.fire(
        'ว่าง,
        'Successful',
        'success'
        )</script>";
    }

    }
     ?>

  </div>
  <br>
  <h6 style="text-align: center;">© 2565 ระบบเลือกตั้งออนไลน์, มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</html>
