<?php
include "conn.php";
include "header.php";
session_start();

$_SESSION["email"] =  $_POST["email"];
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
  <h5 style="margin-top:15px;">สมัครสมาชิก 4-6</h5>
<form action="regis5.php" method="post" enctype="multipart/form-data">
  <label for="">จังหวัด</label>
  <select class="form-control" name="provinces" id="provinces">
    <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
<?php
$sql = "SELECT * FROM `provinces` WHERE 1";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {?>
  <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_th"]; ?></option>
  <?php
  }
}
 ?>
  </select>
  <label for="">อำเภอ</label>
  <select class="form-control" name="amphures" id="amphures">

  </select>
  <label for="">ตำบล</label>
  <select class="form-control" name="districts" id="districts">

  </select>
  <label for="sel1">รหัสไปรษณีย์:</label>
  <input type="text" name="zip_code" id="zip_code" class="form-control">
  <a href="regis3.php" class="btn btn-danger">ย้อนกลับ</a>
  <input style="float: right;" type="submit" name=""  class="btn btn-success" value="ต่อไป">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script type="text/javascript">
$('#provinces').change(function() {
  var id_province = $(this).val();

    $.ajax({
    type: "POST",
    url: "ajax_regis.php",
    data: {id:id_province,function:'provinces'},
    success: function(data){
        $('#amphures').html(data);
        $('#districts').html(' ');
        $('#districts').val(' ');
        $('#zip_code').val(' ');
    }
  });
});

$('#amphures').change(function() {
  var id_amphures = $(this).val();

    $.ajax({
    type: "POST",
    url: "ajax_regis.php",
    data: {id:id_amphures,function:'amphures'},
    success: function(data){
        $('#districts').html(data);
    }
  });
});

 $('#districts').change(function() {
  var id_districts= $(this).val();

    $.ajax({
    type: "POST",
    url: "ajax_regis.php",
    data: {id:id_districts,function:'districts'},
    success: function(data){
        $('#zip_code').val(data)
    }
  });

});
</script>
