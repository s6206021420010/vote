<?php
include "conn.php";
include "header.php";
?>
<style media="screen">
  .btn-danger{
    background:#ff5757;
    border-radius:30px;
  }
  .btn-success{
    background:#38d9a9;
    border:#38d9a9 ;
    border-radius:30px;
    width:15%;
  }
  h7{
    color: white;
    font-size: 24px;
  }
</style>
<body>
  <div class="" style="background-image: linear-gradient(45deg, #be4bdb 5%, #75cefa 95%); width:101%; height:8.5%;position:inherit; top:0px; left:0px;">
    <h7>ระบบเลือกตั้งออนไลน์</h7>
  </div>
  <div class="container">
    <div class="row-12" style="">

    </div>
    <div class="row-12" style="margin-top:10px;">

        <div class="card" style="width:100%; ">
          <div class="card-header" style="background-image: linear-gradient(270deg, #fefffe 5%, #38d9a9 95%);">
            ลงทะเบียนผู้จัดการการเลือกตั้ง
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-3">
                  <h6>กรอกข้อมูลการเลือกตั้ง</h6>
                </div>
              </div>
              <div class="row">
                <hr style="width:98%;">
                <div class="col-6">
                  <form class="" action="add_user.php" method="post" enctype="multipart/form-data">
                  <label for="">รหัสบัตรประชาชน</label><input type="text"  class="form-control form-control-sm"name="idcard" value="" maxlength="13" required>
                  <label for="">เบอร์โทร</label><input type="text"  class="form-control form-control-sm"name="phone" value="" maxlength="10" required>
                </div>
                <div class="col-6">
                  <label for="">ชื่อ - นามสกุล</label><input type="text"  class="form-control form-control-sm"name="name" value="" required>
                  <label for="">Email</label><input type="text"  class="form-control form-control-sm"name="email" value="" required>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
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
                </div>
                  <div class="col-3">
                    <label for="">อำเภอ</label>
                    <select class="form-control" name="amphures" id="amphures">
                </select>
                  </div>
                  <div class="col-3">
                    <label for="">ตำบล</label>
                    <select class="form-control" name="districts" id="districts">
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="sel1">รหัสไปรษณีย์:</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control">
                  </div>
              </div>
              <div class="row">
                <div class="col-4">
                    <label for="">Username</label><input type="text"  class="form-control form-control-sm"name="user_name" value="">
                </div>
                <div class="col-4">
                    <label for="">Password</label><input type="text"  class="form-control form-control-sm"name="user_pass" value="">
                </div>
                <div class="col-4">
                    <label for="">ยืนยัน Password</label><input type="text"  class="form-control form-control-sm"name="" value="">
                </div>
              </div>
              <div class="row">
                <br>
                <hr style="width:98%;">
                <h6>ข้อมูลองค์กร</h6>
                <div class="col">
                  <a href="#" class="btn btn-success">บริษัท</a>
                  <a href="#" class="btn btn-success">นักเรียน-นักศึกษา</a>
                  <a href="#" class="btn btn-success">เลือกตั้งท้องถิ่น</a>
                  <a href="#" class="btn btn-success">อื่น ๆ / บุคคนทั่วไป</a>

                </div>
              </div>
              <div class="row" style="margin-top:10px;">
                <div class="col-2">
                  <label for="">อัพโหลดรูปภาพ</label>
                </div>
                <div class="col-5">
                  <input type="file" class="form-control" name="image" value="" >
                </div>
              </div>
              <div class="row" style="margin-top:10px;">
                <div class="col-3">
                </div>
                <div class="col-3">
                    <a href="regis_head.php" class="btn btn-danger" style="width:100%;">ยกเลิก</a>
                </div>
                <div class="col-3">
                     <input type="submit" class="btn btn-success" style="width:100%;" name="" value="ลงทะเบียน">
                    </form>
                </div>
                <div class="col-3">
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <div class="row-12" >
    <br>
      <h6 style="text-align: center;">© 2565 ระบบเลือกตั้งออนไลน์, มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h6>
    </div>
    </div>
  </div>
</body>
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
