<?php
include "conn.php";
include "header.php";
session_start();

if ($_POST) {
  echo $name_borisut = $_POST["name_borisut"];
  echo $panax_borisut = $_POST["panax_borisut"];
  echo $saka_borisut = $_POST["saka_borisut"];
}
?>
<style media="screen">
  .btn-danger {
    background: #ff5757;
    border-radius: 30px;
  }

  .btn-success {
    background: #38d9a9;
    border: #38d9a9;
    border-radius: 30px;
    width: 15%;
  }

  h7 {
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
            <form class="" action="add_user0.php" method="post" enctype="multipart/form-data">
                  <input type="text" value="3" name="status" id="status" hidden>
                  <label  for="">รหัสบัตรประชาชน</label><input id="idcard" maxlength="13" type="text" class="form-control form-control-sm" name="idcard" value="<?php if($_GET){ echo $_GET['id_card']; } ?>" required>
                  <h6 style="color: #f45d5d;"> <?php if($_SESSION){if($_SESSION["stat"] == 1){echo "*รหัสบัตรประชาชนนี้ถูกใช้ไปแล้ว"; }} ?></h6>
                  <label for="">เบอร์โทร</label><input id="phone" type="text" maxlength="10" class="form-control form-control-sm" name="phone" value="<?php if($_GET){ echo $_GET['number']; } ?>" maxlength="10"required>
                  <h6 style="color: #f45d5d;"> <?php if($_SESSION){if($_SESSION["stat"] == 3){echo "*เบอร์โทรนี้ถูกใช้ไปแล้ว"; }}?></h6>
              </div>
              <div class="col-6">
                <label for="">ชื่อ - นามสกุล</label><input type="text" class="form-control form-control-sm" name="name" value="<?php if($_GET){ echo $_GET['name']; } ?>"required>
                <label for="">Email</label><input type="text" class="form-control form-control-sm" name="email" value="<?php if($_GET){ echo $_GET['email']; } ?>"required>
                <h6 style="color: #f45d5d;"> <?php if($_SESSION){if($_SESSION["stat"] == 2){echo "*อีเมลนี้ถูกใช้ไปแล้ว"; }}?></h6>
              </div>
            </div>

            <div class="row">

              <div class="col-3">
                <label for="">จังหวัด</label>
                <select class="form-control" name="provinces" id="provinces">
                  <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                  <?php
                  $sql = "SELECT * FROM `provinces` WHERE 1";
                  $result = mysqli_query($conn, $sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                      <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_th"]; ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-3">
                <label for="">อำเภอ</label>
                <select class="form-control" name="amphures" id="amphures"required>
                </select>
              </div>
              <div class="col-3">
                <label for="">ตำบล</label>
                <select class="form-control" name="districts" id="districts"required>
                </select>
              </div>
              <div class="col-3">
                <label for="sel1">รหัสไปรษณีย์:</label> 
                <input type="text" name="zip_code" id="zip_code" class="form-control"required>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <label for="">Username</label><input type="text" class="form-control form-control-sm" name="user_name" value="<?php if($_GET){ echo $_GET['user_name']; } ?>">
                <h6 style="color: #f45d5d;"> <?php if($_SESSION){if($_SESSION["stat"] == 4){echo "*ยูสเซอร์เนมนี้ถูกใช้ไปแล้ว"; }}?></h6>
              </div>
              <div class="col-4">
                <label for="">Password</label><input type="password" class="form-control form-control-sm" name="user_pass" value="<?php if($_SESSION){echo $_SESSION["pass"];}?>">
              </div>
              <div class="col-4">
                <label for="">ยืนยัน Password</label><input type="password" class="form-control form-control-sm" name="" value="<?php if($_SESSION){echo $_SESSION["pass"];}?>">
              </div>
            </div>
            <div class="row">
              <br>
              <hr style="width:98%;">
              <h6>ข้อมูลองค์กร</h6>
              <!-- <div class="col">
                  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">บริษัท</a>
                  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#studen">นักเรียน-นักศึกษา</a>
                  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#local">อื่น ๆ / บุคคนทั่วไป</a>
                </div> -->
            </div>
            <div class="row">
          
            </div>
            <div class="row col-12" id="form_data">
            <label id="m" for="sel1">องค์กรณ์  <h6 style="color: #f45d5d;">*เลือกบริษัท/มหาลัย/โรงเรียน/องกรณ์ทั่วไป (ตามที่ผู้สร้างโหวตได้สร้างไว้)</h6></label>
        <select class="form-control" name="b1" id="org"required>
              <option value="" selected disabled></option>
              <?php $sql = "SELECT * FROM `organization` WHERE 1";
              $result = mysqli_query($conn,$sql);
              foreach ($result as $value) { ?>
              <option  value="<?=$value['organization_id']?>"> <?=$value['organization_name']?></option>
              <?php } ?>
        </select>
        <label id="k"for="sel1">รายการย่อยที่1</label>
        <select class="form-control" name="b2" id="dep"required>
        </select>
        <label id="s"for="sel1" >รายการย่อยที่2</label>
        <select style="margin-bottom:15px;"class="form-control" name="b3" id="dep2"required>
        </select>
            </div>
            <div class="row" style="margin-top:10px;">
              <div class="col-2">
                <label for="">อัพโหลดรูปภาพ</label>
              </div>
              <div class="col-5">
                <input type="file" class="form-control" name="image" value="" required>
              </div>
            </div>
            <div class="row" style="margin-top:10px;">
              <div class="col-3">
              </div>
              <div class="col-3">
                <a href="regis_head.php" class="btn btn-danger" style="width:100%;">ยกเลิก</a>
              </div>
              <div class="col-3">
                <input type="submit" id="display_none" class="btn btn-success" style="width:100%;" name="" value="ลงทะเบียน">
                </form>
              </div>
              <div class="col-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-12">
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
  
  $('#org').change(function() {
    var org = $(this).val();
 
    $.ajax({
      type: "POST",
      url: "ajax3.php",
      data: {
        org:org
      },
      success: function(data) {
        $('#dep').html(data)
      }
    });
  });
  $('#dep').change(function() {
    var dep = $(this).val();
    $.ajax({
      type: "POST",
      url: "ajax3.php",
      data: {
        dep:dep
      },
      success: function(data) {
        $('#dep2').html(data)
      }
    });
  });
  $('.changeDepartment').on('change', function() {
    let val = $(this).val();
    let html = '';
    if (val == 1) {
      html = `<label for="">ชื่อบริษัท</label>
              <input type="text" name="b1" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">แผนก</label>
              <input type="text " name="b2" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">สาขา</label>
              <input type="text" name="b3" id="" value="" class="form-control form-control-sm" style="width: 45%;" >`;
    } else if (val == 2) {
      html = `<label for="">ระดับการศึกษา</label>
                <Select class="form-control" name="department" style="width:45%" requried>
                <option value="" selected disabled>กรุณาเลือกระดับชั้น</option>
                <option value="">อนุบาลศึกษา</option>
                <option value="">ประถมศึกษา</option>
                <option value="">มัธยมศึกษา</option>
                <option value="">อุดมศึกษา</option>
                </Select>
              <label for="">โรงเรียน</label>
              <input type="text " name="b2" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">ระดับชั้น</label>
              <input type="text" name="b3" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">ห้อง</label>
              <input type="text" name="b4" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              `;
    } else if (val == 3) {
      html = `<label for="">จังหวัด</label>
                <Select class="form-control" name="department" style="width:45%" requried>
                <option value="" selected disabled>กรุณาเลือกระดับชั้น</option>
                <option value="">อนุบาลศึกษา</option>
                <option value="">ประถมศึกษา</option>
                <option value="">มัธยมศึกษา</option>
                <option value="">อุดมศึกษา</option>
                </Select>
              <label for="">อำเภอ</label>
              <Select class="form-control" name="department" style="width:45%" requried>
                <option value="" selected disabled>กรุณาเลือกระดับชั้น</option>
                <option value="">อนุบาลศึกษา</option>
                <option value="">ประถมศึกษา</option>
                <option value="">มัธยมศึกษา</option>
                <option value="">อุดมศึกษา</option>
                </Select>            
                <label for="">ตำบล</label>
                <Select class="form-control" name="department" style="width:45%" requried>
                <option value="" selected disabled>กรุณาเลือกระดับชั้น</option>
                <option value="">อนุบาลศึกษา</option>
                <option value="">ประถมศึกษา</option>
                <option value="">มัธยมศึกษา</option>
                <option value="">อุดมศึกษา</option>
                </Select>
                <label for="">หมู่บ้าน</label>
                <input type="text" name="b4" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              `;
    } else {
      html = `<label for="">ข้อมูลเกี่ยวข้องที่ 1</label>
              <input type="text" name="b1" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">ข้อมูลเกี่ยวข้องที่ 2</label>
              <input type="text " name="b2" id="" value="" class="form-control form-control-sm" style="width: 45%;" >
              <label for="">ข้อมูลเกี่ยวข้องที่ 3</label>
              <input type="text" name="b3" id="" value="" class="form-control form-control-sm" style="width: 45%;" >`;
    }
    $('#form_data').html(html);
  });

  $('#provinces').change(function() {
    var id_province = $(this).val();

    $.ajax({
      type: "POST",
      url: "ajax_regis.php",
      data: {
        id: id_province,
        function: 'provinces'
      },
      success: function(data) {
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
      data: {
        id: id_amphures,
        function: 'amphures'
      },
      success: function(data) {
        $('#districts').html(data);
      }
    });
  });

  $('#districts').change(function() {
    var id_districts = $(this).val();

    $.ajax({
      type: "POST",
      url: "ajax_regis.php",
      data: {
        id: id_districts,
        function: 'districts'
      },
      success: function(data) {
        $('#zip_code').val(data)
      }
    });

  });
</script> 