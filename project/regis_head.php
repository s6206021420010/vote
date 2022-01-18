<?php
include "conn.php";
include "header.php";
?><style media="screen">
  input{
    margin-bottom: 15px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }
  .btn{
    background: #ffce47;
    width: 120px;
    border-radius: 10px;
  }
#back:hover{

transition: all 1.0s ;
transform :rotate(360deg);
}
</style>
<!-- <img style="position:absolute;"src="images/registered.png" alt=""> -->
<div class="container" style="margin-top:5%;"  >
<a href="index.php">  <img id="back" style="width:5%; position:absolute; top:5; left:5;" src="images/previous.png" alt=""> </a>
  <div class="row">
    <center><h3 style="margin-bottom:30px;">สมัครสมาชิก</h3></center>
  </div>
  <div class="row">
    <div href="" class="col-6">
      <img id="im" style="   width: 10%;
    position: absolute;
    right: 113px;
    top: -10px;"src="images/create (1).png" alt="">
  </form>
    <a  href="regis1.php" id="regis" style="float:right; border-radius:10px;  "class="btn">ผู้สร้างโหวต<p style="  position: absolute;
      top: 47px;
      left: 93px;
      font-weight: 800;
      color: #092a40;
      text-align: left;
      display: none;
      " id="22">ผู้สร้างโหวต<br>
      ผู้สร้างโหวต - จะมีหน้าที่ในการสร้างโหวตโดยจะสามารถ<br>ตรวจสอบผู้มีสิทธิ์ลงคะแนน
    </p></a>
</div>
    <div class="col-6">
      <img id="im2" style="    width: 10%;
    position: absolute;
    top: -11px;
    left: 110px;"src="images/create (2).png" alt="">
      <a  href="regis10.php" id="regis2" style="    background: #00dd80;"class="btn">ผู้ลงคะแนน<p style="  position: absolute;
        top: 47px;
        left: 93px;
        font-weight: 800;
        color: #092a40;
        text-align: left;
        display: none;
        " id="23">ผู้ลงคะแนน<br>
        ผู้ลงคะแนน - จะมีหน้าที่ในกาลงคะแนนโดยต้องได้รับการอณุมัติ<br>จากผู้สร้างโหวตก่อน
      </p></a>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$("#regis").mouseenter(function(){
    $("#regis").animate({width: '530px',padding:'150px'},500);
    $("#regis").val()
    $("#im2").css({"transition": "all 1.0s", "transform": "rotate(0deg)"});
    $("#im").css({"transition": "all 1.0s", "transform": "rotate(360deg)"});
    $("#regis2").animate({width: '120px',padding:'5px'},500);
    $("e").text("ผู้ลงคะแนน ");
    $("#22").fadeIn(500)
    $("#23").fadeOut(500)
})

// .............................
$("#regis2").mouseenter(function(){
    $("#regis2").animate({width: '530px',padding:'150px'},500);
    $("#regis").animate({width: '120px',padding:'5px'},500);

    $("#22").fadeOut(500)
    $("#23").fadeIn(500)
    $("#im").css({"transition": "all 1.0s", "transform": "rotate(0deg)"});
    $("#im2").css({"transition": "all 1.0s", "transform": "rotate(360deg)"});
})

// ..............................

  $( "#pas2" ).change(function() {
    if ($( "#pas1" ).val() != $( "#pas2" ).val()) {
      $("#pas1").css({"border-color" : "#f84858" , "border-width" : "2px"})
      $("#pas2").css({"border-color" : "#f84858" , "border-width" : "2px"})
      $( "#click" ).prop('disabled',true)

    }

  })
  $( "#click" ).click(function() {
    if ($( "#pas1" ).val() != $( "#pas2" ).val()) {
    }
  })
$( "#pas2" ).change(function() {
    if ($( "#pas1" ).val() == $( "#pas2" ).val()) {
      $( "#click" ).prop('disabled',false)
      $("#pas1").css({"border-color" : "#ced4da" , "border-width" : "1px"})
      $("#pas2").css({"border-color" : "#ced4da" , "border-width" : "1px"})
    }
  })
</script>
<?php

 ?>
