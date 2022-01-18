<?php
include "conn.php";
include "header.php";
session_start();


$_SESSION["provinces"] = $_POST["provinces"];
$_SESSION["amphures"] = $_POST["amphures"];
$_SESSION["districts"] = $_POST["districts"];
$_SESSION["zip_code"] = $_POST["zip_code"];
?>
<style media="screen">
#im{
  border-radius: 99%;
  border-width: 1px;
  border: black;
  width: 27%;
  margin-left: 36%;
  margin-top: 7%;
}
  input{
    margin-bottom: 15px;
  }
  hr{
    border-width: 0px;
    width: 90%;
    margin: 5% 5% ;
  }
  .container{
    box-shadow: 0px 0px 13px #e0e0e0;
    border-radius: 13px;
    width: 35%;
    position: absolute;
    top: 20%;
    right: 10%;
  }
  .new{
    margin: 2px;
    background: #ffc107;
  }
</style>
<img class="imgbg" src="images/document.png" style="position:absolute; left:80px; top:25px;"alt="">
<div class="container">
    <h5 style="margin-top:15px;">สมัครสมาชิก 5-6</h5>
  <a href="#" id="click_studen" class="btn new">นักเรียน-นักศึกษา</a>
  <a href="#" id="click_borisut" class="btn new">บริษัท</a>
  <a href="#" id="click_nor" class="btn new">บุคคลทัวไป</a>
  <hr>

  <!-- ....................................บริษัท -->
  <br>

  <div id="borisut" style="display:none;">
    <form class="" action="regis6.php" method="post">
      <label for="" >บริษัท</label>
      <input type="text" name="school" value=""class="form-control" required>
      <label for="" >สาขา</label>
      <input type="text" name="list" value=""class="form-control"required>
      <label for="" >ฝ่าย</label>
      <input type="text" name="room" value=""class="form-control"required>
      <a href="regis4.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">    </form>
  </div>
  <!-- ....................................นักเรียน-นักศึกษา -->
  <select id="studen" class="form-control" name="" style="display:none;">
    <h3>ระดับการศีกษา</h3>
    <option value="" selected disabled>เลือกระดับการศีกษา</option>
    <option value="1" >ระดับประถมศึกษา</option>
    <option value="2">ระดับมัธยมศึกษา</option>
    <option value="3">ระดับอาชีวศึกษา</option>
    <option value="4">ระดับอุดมศึกษา</option>
  </select>
  <div id="normal"  style="display:none; margin-top:10px;">
    <form class="" action="regis6.php" method="post">
      <label for="">ข้อมูลที่เกี่ยวข้อง 1</label>
      <input type="text" name="school" value="" class="form-control"required>
      <label for="">ข้อมูลที่เกี่ยวข้อง 2</label>
      <input type="text" name="list" value="" class="form-control"required>
      </select>
      <label for="">ข้อมูลที่เกี่ยวข้อง 3 </label>
      <input type="text" name="room" value="" class="form-control"required>
      <a href="regis4.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">    </form>

  </div>
  <div id="pratom"  style="display:none; margin-top:10px;">
    <form class="" action="regis6.php" method="post">
      <label for="">โรงเรียน</label>
      <input type="text" name="school" value="" class="form-control"required>
      <label for="">ระดับชั้น</label>
      <input type="text" name="list" value="" class="form-control"required>
      </select>
      <label for="">ห้อง</label>
      <input type="text" name="room" value="" class="form-control"required>
      <a href="regis4.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">    </form>

  </div>
  <div id="povocho"  style="display:none; margin-top:10px;">
    <form class="" action="regis6.php" method="post">
      <label for="">วิทยาลัย</label>
      <input type="text" name="school" value="" class="form-control"required>
      <label for="">ระดับชั้น</label>
      <input type="text" name="list" value="" class="form-control"required>
      </select>
      <label for="">ห้อง</label>
      <input type="text" name="room" value="" class="form-control"required>
      <a href="regis4.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">
        </form>

  </div>
  <div id="maha"  style="display:none; margin-top:10px;">
    <form class="" action="regis6.php" method="post">
      <label for="">มหาวิทยาลัย</label>
      <input type="text" name="school" value="" class="form-control"required>
      <label for="">คณะ</label>
      <input type="text" name="list" value="" class="form-control"required>
      </select>
      <label for="">สาขา</label>
      <input type="text" name="room" value="" class="form-control"required>
      <a href="regis4.php" class="btn btn-danger">ย้อนกลับ</a>
      <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">
    </form>
  </div>
  <!-- ....................................บุคคลทัวไป -->
  <br>
  <!-- .................................... -->
  <br>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script type="text/javascript">
$("#studen").change(function(){
    var std = $("#studen").val()
        $("#normal").fadeOut(500)
   if (std == 1 || std == 2) {
         $("#pratom").fadeIn(1000)
         $("#povocho").fadeOut()
          $("#maha").fadeOut()

   }

   if (std == 3 ) {
         $("#povocho").fadeIn(1000)
         $("#pratom").fadeOut()
         $("#maha").fadeOut()
   }
   if (std == 4 ) {
         $("#maha").fadeIn(1000)
         $("#pratom").fadeOut()
         $("#povocho").fadeOut()

   }
})
// ..................
$("#click_nor").click(function(){
  $("#borisut").fadeOut()
  $("#studen").fadeOut()
   $("#povocho").fadeOut()
    $("#pratom").fadeOut()
  $("#normal").fadeIn(1000)

})
  $("#click_studen").click(function(){
    $("#borisut").fadeOut()
    $("#studen").fadeIn(1000)
      $("#normal").fadeOut(1000)

  })
  $("#click_borisut").click(function(){
    $("#studen").fadeOut()
     $("#povocho").fadeOut()
      $("#pratom").fadeOut()
       $("#maha").fadeOut()
    $("#borisut").fadeIn(1000)
      $("#normal").fadeOut(1000)
  })

</script>
