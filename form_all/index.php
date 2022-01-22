<?php
include "font.php";
 ?>
 <body>
   <div class="container">
     <div class="row" style="background-image: linear-gradient(45deg, #be4bdb 5%, #75cefa 95%); width:101%; height:8.5%;position:absolute; top:0px; left:0px;">
     </div>
     <div class="row-12" style="text-align:center;">
         <img style="margin-top:4%; width:10%;" src="../images/kmutnb.png" alt="">
     </div>
     <div class="row-12">
       <center>
         <h5 style="margin-top:3px;">ระบบเลือกตั้งออนไลน์</h5>
         <div class="card" style="height:60%; width:50%;text-align:center; margin-top:10px; ">
           <div class="card-header" style="background-image: linear-gradient(270deg, #fefffe 5%, #38d9a9 95%);">
             <img style="float:left; width:5%;" src="../images/login.png" alt=""><h6 style="float:left; margin:2px 10px;"> เข้าสูระบบ</h6>
           </div>
            <div class="card-body" style="background:#f0f8fd;">
              <form class="" action="index.html" method="post">
                <h6 style="float:left;">ชื่อผู้ใช้งาน :</h6>
                <input type="text" class="form-control" name="" value="" placeholder="ชื่อผู้ใช้งาน">
                <h6 style="float:left;">รหัสผ่านผู้ใช้งาน :</h6>
                <input type="password"class="form-control" name="" value="" placeholder="รหัสผ่าน">
                <input type="button" name="" class="btn" value="ล้าง"  style="background:#ff5757; border-radius:30px; width:20%; color:white; margin:15px 20px;">
                <input type="submit" name="" class="btn" value="เข้าสู่ระบบ" style="background:#38d9a9; border-radius:30px;  width:20%; color:white; margin:0px 0px 0px 20px;">

                <a href="#" style="float:left; margin-top:12%;">ลืมรหัสผ่าน?</a>
                <a href="register_head.php" style="float:right; margin-top:12%;">ลงทะเบียน</a>
              </form>

            </div>
         </div>
           <hr>
           <h6>© 2565 ระบบเลือกตั้งออนไลน์, มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
       </center>
     </div>
   </div>
 </body>
