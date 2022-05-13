<?php

include "header.php";
 ?>
<style media="screen">
  #pass1{
    display: none;
  }
  #pass2{
    display: none;
  }
  #otp,#chenge2{
    display: none;
  }
</style>
 <div class="d-flex justify-content-center align-items-center h-75">
   <div class="card w-50 h-50 overflow-hidden p-2">
   <div class="row">
     <div class="col">
       <h3>ลืมรหัสผ่าน</h3>
     </div>
   </div>
   <div class="row border-top pt-3">
     <div class="col">
       <h5 id="head">กรอกEmailเพื่อเปลียนรหัสผ่าน</h5>
            <input type="text" class="form-control" id="otp2" name="" value="" placeholder="กรอกOTP" >
     </div>
   </div>
   <div class="row">
     <div class="col">
       <input type="text" class="form-control" id="chenge_var" name="" value=""  placeholder="กรอกอีเมล">
     </div>
   </div>
   <div class="row" >
     <div class="col">
       <input type="text" class="form-control" id="otp" name="" value="" placeholder="กรอกOTP">

     </div>
     <!-- xxxxxxxxxx -->
     <div class="col">

       <input type="text" class="form-control" id="pass1" name="" value="" placeholder="กรอกรหัสผ่าน">
     </div>
   </div>
   <div class="row">
     <div class="col">
       <input type="text" class="form-control mt-2" id="pass2" name="" value="" placeholder="กรอกรหัสผ่านอีกครั้ง">
     </div>
   </div>
    <!-- xxxxxxxxxx -->
   <div class="row">
     <div class="col d-flex justify-content-center">
       <input type="text" class="btn btn-dark mt-3" name="" id="chenge" value="ส่งไปยังอีเมล">
       <input type="text" class="btn btn-dark mt-3" name="" id="chenge2" value="ยืนยัน">
     </div>
   </div>

   </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js">
 </script>
 <script type="text/javascript">
$("#chenge2").click(function(){
    var passer =  $("#pass1").val()
if (passer=="") {
  Swal.fire({
   icon: 'error',
   title: 'ห้ามเว้นว่าง',
   text: 'ห้ามเว้นว่างรหัสผ่านกรุณากรอกอีกครั้ง!'

  })
}else {
  var pass1 = $("#pass1").val()
    var pass2 = $("#pass2").val()
      var chenge_var = $("#chenge_var").val()
    if (pass1 == pass2) {
      $.ajax({
        type: "POST",
        url: "forget_pass0.php",
        data: {
          pass: pass1,
          email: chenge_var
        },
        success: function(data) {
          Swal.fire(
         'สำเร็จ!',
         'เปลี่ยนรหัสผ่านสำเร็จ!',
         'success'
        )
        setTimeout(function() {
          window.location.href = "index.php";
        }, 2000);
        }
      })
    }
    else {
  Swal.fire({
   icon: 'error',
   title: 'รหัสไม่ตรงกัน',
   text: 'รหัสผ่านไม่ตรงกรุณากรอกอีกครั้ง!'

  })
    }
}
})
  $("#otp").keyup(function(){
    var otp1 =  $("#otp").val()
    var otp2 =  $("#otp2").val()
    if (otp1 == otp2) {

       $("#pass1").fadeIn()
        $("#pass2").fadeIn()
        $("#otp").fadeOut()
        $("#chenge2").fadeIn(0)
    }
  })
 $("#chenge").click(function(){
   var change_var = $("#chenge_var").val()
   $.ajax({
     type: "POST",
     url: "forget_pass0.php",
     data: {
       email: change_var
     },
     success: function(data) {
       if (data == 1) {
          $("#chenge").fadeOut(0)
          $("#head").html('กรอกOTPที่ได้จากอีเมล')
         $("#chenge_var").prop("hidden","TRUE")
         $.ajax({
           type: "POST",
           url: "PHPMailer-main/sendEmail.php",
           data: {
             email: data
           },
           success: function(data) {
              $("#otp").fadeIn()
              $("#otp2").val(data)
           }
         })
         // $("#pass1").fadeIn()
         // $("#pass2").fadeIn()
       }
       else {
         Swal.fire({
         icon: 'error',
         title: 'อีเมลไม่ถูกต้อง',
         text: 'ไม่มีอีเมลนี้ในระบบ!'

       })
       }
     }
   })
 })
 </script>
