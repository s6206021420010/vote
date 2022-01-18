<?php
include "conn.php";
include "header.php";
session_start();
$_SESSION["user_name"] = $_POST["user_name"];
$_SESSION["user_pass"] = $_POST["user_pass"];

?>
<style media="screen">
  input{
    margin-bottom: 15px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container" style="
box-shadow: 0px 0px 13px #e0e0e0;
border-radius: 13px;
width: 35%;
position: absolute;
top: 20%;
right: 10%;">
<h5 style="margin-top:15px;">สมัครสมาชิก 2-6</h5>
<hr style="width:100%; margin:15px 0px 15px;">
  <form action="regis3.php" method="post" enctype="multipart/form-data">
  <label for="">ชื่อ-นามสกุล</label>
  <input type="text"  name="name" class="form-control" placeholder="name-lastname" required>
  <hr>
  <label for="" style="">เลขบัตรประชาชน</label>
  <input type="text" id="idcard"  name="idcard" class="form-control" placeholder="id card" required maxlength="13">
  <label for="" style="">เบอร์โทร</label>
  <input type="text"   name="phone" class="form-control" placeholder="phone number"required maxlength="10">
  <a href="regis1.php" class="btn btn-danger">ย้อนกลับ</a>
  <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$("#idcard").change(function(){
  var idcard = $("#idcard").val()
  $.ajax({
    type : 'POST',
    url : 'ajax2.php',
    data : {
      idcard : idcard
    },
    success : function(idcard){
      alert(idcard)
      if (idcard == 'success') {
        $("#idcard").css({"border-color" : "#f84858" , "border-width" : "2px"})
        // $("#use").html("* ชื่อนี้มีการใช้งานแล้ว")
        // $("#hidden").val("aaaa")
        // alert($("#hidden").val())
      }
      else if(idcard == 'error') {
        $("#idcard").css({"border-color" : "#ced4da" , "border-width" : "1px"})
        // $("#use").html("")
        // $("#hidden").val("test")
        // alert($("#hidden").val())
      }
    }
  })
})

</script>
