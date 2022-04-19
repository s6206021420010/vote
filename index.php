<!DOCTYPE html>
<?php include "header.php"; ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;1,100;1,200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title></title>

  </head>
  <style>
  body {
    font-family: 'Prompt', sans-serif;
  }
      * {
        box-sizing: border-box
      }
      h6{
        color: #fff;
      }
      .mySlides {
        display: none
      }
      img {
        vertical-align: middle;
        display: inherit;
      }
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }
      /* Next & previous buttons */
      .prev,
      .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }
      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover,
      .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
      }
      /* Caption text */
      .text {
        color: #ffffff;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }
      /* Number text (1/3 etc) */
      .numbertext {
        color: #ffffff;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }
      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #999999;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }
      .active,
      .dot:hover {
        background-color: #111111;
      }
      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }
      @-webkit-keyframes fade {
        from {
          opacity: .4
        }
        to {
          opacity: 1
        }
      }
      @keyframes fade {
        from {
          opacity: .4
        }
        to {
          opacity: 1
        }
      }
      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev,
        .next,
        .text {
          font-size: 11px
        }
      }
      h1{
        background: #8378f7;
        border-radius: 40px;
        padding: 3px;
        color: white;
        text-align: center;
      }
      .logo{
        width: 10%;
        border: #fff;
        border-width: 8px;
        padding: 3px;
        background-color: white;
        border-radius: 5px;
      }
      .link{
        color:#fff;
        text-decoration:none;
        font-size:13px;
      }
    </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-200 h-25"  style=" background:#8378f7;">
      <div class="container-fluid">
        <a class="navbar-brand d-none" href="#"><img src="images/v.png" class="logo" alt=""></a>
                
              <form class="" action="login.php" method="post">
                <div class="row "style="">
                  <div class="col-12 mb-2 mb-sm-0 col-sm-4">
                    <input type="text"  class="form-control form-control-sm"  value="" name="username" placeholder="username">
                  </div>
                  <div class="col-12 mb-2 mb-sm-0 col-sm-4">
                    <input type="text"  class="form-control form-control-sm"  value="" name="password" placeholder="password">
                  </div>
                  <div class="col-12 col-sm-4">
                    <input type="submit" name="" class="btn w-100 w-sm-"  value="Login" style="color:white; border: solid 1px white;">
                  </div>
                </div>
                <div class="row" style="">
                  <div class="col-4">
                    <a href="regis_head.php" class="link">Register</a>
                  </div>
                  <div class="col">
                    <a href="#" class="link">forget password</a>
                  </div>
                </div>
              </form>
            
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top:15px;">

      <div class="row">
        <div class="col-12 col-sm-5 d-lg-none">
          <h1 class="">ระบบเลือกตั้งออนไลน์</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="slideshow-container">
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/survey-1594962_1920.jpg" style="width:100%; height:400px; object-fit: cover;">
              <div class="text">ลงคะแนนแบบOnlineโดยมีความปลอดภัย</div>
            </div>
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/elections-gae2545548_1920.jpg" style="width:100%; height:400px; object-fit: cover;">
              <div class="text">ตรวจสอบผลคะแนนแบบออนไลน์</div>
            </div>
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="images/pexels-negative-space-160107.jpg" style="width:100%; height:400px; object-fit: cover;">
              <div class="text">ระบบการทำงานที่จะไม่มีความซ้ำซ้อนในระบบ </div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

          <br>
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
  <?php
  if (isset($_POST['sweet'])) {
    if ($_POST['sweet'] == 1) {
      echo "<script>Swal.fire(
    'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
    'Invalid username or password',
    'error'
    )</script>";
      clearstatcache();
    } else if ($_POST['sweet'] == 0) {
      echo "<script>Swal.fire(
  'ยังไม่ได้รับการยืนยัน',
  'not confirmed',
  'error'
  )</script>";
      $_POST['sweet'] = 2;
    }
  }

  if (isset($_SESSION)) {
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
        var slideIndex = 0;
        showSlides();
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          for(i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if(slideIndex > slides.length) {
            slideIndex = 1
          }
          slides[slideIndex - 1].style.display = "block";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
      </script>
</html>
