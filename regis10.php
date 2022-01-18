<?php
include "conn.php";
include "header.php";
?><style media="screen">
  input{
    margin-bottom: 10px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 10% 5% 10%;
  }
  #passnon{
    color: red;
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
  <h5 style="margin-top:15px;">สมัครสมาชิก 1-6</h5>
  <hr style="width:100%; margin:15px 0px 15px;">
  <form action="regis20.php" method="post" enctype="multipart/form-data">
  <label for="">Username</label>
  <input type="text"  name="user_name" class="form-control" placeholder="Username" required>
  <hr>
  <label for="" style="">Password</label>
  <input type="password" id="pas1"  name="user_pass" class="form-control" placeholder="Password" required>
  <label for="" style="">Confirm Password</label>
  <input type="password" id="pas2"  name="pass" class="form-control" placeholder="Confirm Password"required>
  <p id="passnon"></p>
  <a href="regis_head.php" class="btn btn-danger">ย้อนกลับ</a>
  <input type="submit" name="" id="click" class="btn btn-success" style=" float:right;" value="ต่อไป" disabled >
  <h1 id="nx"></h1>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $( "#pas2" ).change(function() {
    if ($( "#pas1" ).val() != $( "#pas2" ).val()) {
      $("#pas1").css({"border-color" : "#f84858" , "border-width" : "2px"})
      $("#pas2").css({"border-color" : "#f84858" , "border-width" : "2px"})
      $( "#click" ).prop('disabled',true)
      $("#passnon").html("* รหัสผ่านไม่ตรงกัน")
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
      $("#passnon").html("")
    }
  })
</script>
<?php

 ?>
