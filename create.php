  <?php
include "conn.php";
include "header.php";
session_start();

if ($_POST) {
  echo $name_borisut = $_POST["bvbvbvbvb"];
  echo $panax_borisut = $_POST["panax_borisut"];
  echo $saka_borisut = $_POST["saka_borisut"];
}
?>
<style media="screen">
  .btn-dangerer {
    background: #ff5757;
    border-radius: 30px;
  }

  .btn-successi {
    background: #38d9a9;
    border: #38d9a9;
    border-radius: 30px;
    width: 15%;
  }

  h7 {
    color: white;
    font-size: 24px;
  }
  h6{
    display: none;
  }
  #display_none{
    pointer-events: none;
    
  }
</style>

<body>
  <div class="" style="background:#8378f7; width:101%; height:8.5%;position:inherit; top:0px; left:0px;">
    <h7>ระบบเลือกตั้งออนไลน์</h7>
  </div>
  <div class="container">
    <div class="row-12" style="">

    </div>
    <div class="row-12" style="margin-top:10px;">

      <div class="card" style="width:100%; ">
        <div class="card-header" style="background:#8378f7; color:white; ">
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
              <div class="col-12 col-sm-6">
                <form id="fome"class="" action="" enctype="multipart/form-data">
                  <input type="text" value="1" name="status" id="status" hidden>
                  <label  for="">รหัสบัตรประชาชน</label><input placeholder="รหัสบัตรประชาชน"  id="idcard" maxlength="13" type="text" class="form-control form-control-sm" name="idcard" value="<?php if($_GET){ echo $_POST['id_card']; } ?>" required>
                  <h6 style="color: #f45d5d;" id="err_idc"> *รหัสบัตรประชาชนนี้ถูกใช้ไปแล้ว</h6>
                  <!-- otp -->
                  <label for="">เบอร์โทร</label>
                  <div class="input-group mb-3">
                    <input type="text" placeholder="เบอร์โทร" id="phone"  name="phone" value="<?php if($_GET){ echo $_GET['number']; } ?>" maxlength="10"required class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" id="s_otp" data-toggle="modal" data-target="#setotp" type="button" id="button-addon2">ส่ง OTP</button>
                  </div>
                  <h6 style="color: #f45d5d;" id="err_num">*เบอร์โทรนี้ถูกใช้ไปแล้ว</h6>
                  <!-- Modal -->
                  <div class="modal fade" id="setotp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">ยืนยันตัวตนด้วย OTP</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ยืนยันตัวตน
                          <div class="input-group mb-3">
                            <input type="text" id="otp_stay" > 
                            <input type="text" class="form-control" value="" id="phone_mod" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" hidden>
                            <input type="text" class="form-control" value="" id="phone_mod_otp" placeholder="รหัส otp" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" id="s_otp_mod" type="button" >รับ OTP</button>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" id="sub" class="btn btn-primary">ยืนยัน</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- otp -->
              </div>
              <div class="col-12 col-sm-6">
                <label for="">ชื่อ - นามสกุล</label><input placeholder="ชื่อ - นามสกุล" type="text" class="form-control form-control-sm" name="name" value="<?php if($_GET){ echo $_GET['name']; } ?>"required>
                <label for="">Email</label><input  placeholder="Email" type="text" class="form-control form-control-sm" name="email" value="<?php if($_GET){ echo $_GET['email']; } ?>"required>
                <h6 style="color: #f45d5d;" id="err_em">*อีเมลนี้ถูกใช้ไปแล้ว"</h6>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6 ">
                <label for="">จังหวัด</label>
                <select class="form-control" name="provinces" id="provinces" require>
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
              <div class="col-6 ">
                <label for="">อำเภอ</label>
                <select class="form-control" name="amphures" id="amphures"required>
                  <option value="" hidden>-กรุณาเลือกอำเภอ-</option>
                </select>
              </div>
              <div class="col-6 ">
                <label for="">ตำบล</label>
                <select class="form-control" name="districts" id="districts"required>
                  <option value="" hidden>-กรุณาเลือกตำบล-</option>
                </select>
              </div>
              <div class="col-6 ">
                <label for="sel1">รหัสไปรษณีย์:</label>
                <input placeholder="รหัสไปรษณีย์" type="text" name="zip_code" id="zip_code" class="form-control"required>
              </div>
            </div>

            <div class="row border-top mt-4 pt-3">
              <div class="col-6 col-sm-6">
                <label for="">Username</label><input require placeholder="Username" type="text" class="form-control form-control-sm" name="user_name" value="<?php if($_GET){ echo $_GET['user_name']; } ?>">
                <h6 style="color: #f45d5d;" id="err_use">*ยูสเซอร์เนมนี้ถูกใช้ไปแล้ว</h6>
              </div>
              <div class="col-6 col-sm-6">
                <label for="">Password</label><input  require placeholder="Password" type="password" class="form-control form-control-sm" name="user_pass" value="<?php if($_SESSION){echo $_SESSION["pass"];}?>">
              </div>
              <div class="col-12 col-sm-12">
                <label for="">ยืนยัน Password</label><input require placeholder="ยืนยัน Password" type="password" class="form-control form-control-sm" name="" value="<?php if($_SESSION){echo $_SESSION["pass"];}?>">
              </div>
            </div>

            <div class="row">
              <br>
              <hr style="width:98%;">
              <h6>ข้อมูลองค์กร</h6>

            </div>
            <div class="row">
              <div class="col-12">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="company" name="department" value="1" checked class="custom-control-input changeDepartment">
                  <label class="custom-control-label" for="company">บริษัท</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="education" name="department" value="2" class="custom-control-input changeDepartment">
                  <label class="custom-control-label" for="education">สถานศึกษา</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="normalpeople" name="department" value="4" class="custom-control-input changeDepartment">
                  <label class="custom-control-label" for="normalpeople">บุคคนทั่วไป</label>
                </div>
              </div>
            </div>

            <div class="row" id="form_data">
              <label for="">ชื่อบริษัท</label>
              <input placeholder="ชื่อบริษัท" type="text" name="b1" id="" value="<?php if($_GET){ echo $_GET['org']; }?>" class="form-control form-control-sm" require>
              <h6 style="color: #f45d5d;" id="err_org">*ชื่อนี้ถูกใช้ไปแล้ว</h6>
              <label for="">แผนก</label>
              <input placeholder="แผนก" type="text " name="b2" id="" value="<?php if($_GET){ echo $_GET['dep']; } ?>" class="form-control form-control-sm" require>
              <label for="">สาขา</label>
              <input placeholder="สาขา" type="text" name="b3" id="" value="<?php if($_GET){ echo $_GET['dep2']; } ?>" class="form-control form-control-sm" require>
            </div>

            <div class="row mt-3">
              <div class="col-12 col-sm-6  ">
                <a href="regis_head.php" class="btn btn-danger w-100 rounded-pill"  >ยกเลิก</a>
              </div>
              <div class="col-12 mt-2 mt-sm-0 col-sm-6 ">
                <a type="button" id="display_none" class="btn btn-success rounded-pill w-100 " name="button">ลงทะเบียน</a>
                </form>
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

</script>
<script type="text/javascript">
  // num
  $("#idcard").on("keypress" , function (e) {
        var code = e.keyCode ? e.keyCode : e.which;
        if(code > 57){
            return false;
        }else if(code < 48 && code != 8){
            return false;
        }
    });
  
  $("#phone").on("keypress" , function (e) {
        var code = e.keyCode ? e.keyCode : e.which;
        if(code > 57){
            return false;
        }else if(code < 48 && code != 8){
            return false;
        }
    });
  // num
  // otp
  $("#sub").click(function(){
    var otp1 = $("#phone_mod_otp").val()
    var otp2 = $("#otp_stay").val()
    if (otp1==otp2) {
      $("#display_none").css("pointer-events","auto")
      $('#setotp').modal('toggle')
    }
  })
  $("#s_otp").click(function(){
    var phone = $("#phone").val()
    $("#phone_mod").val(phone)
    
  })
  
  $("#s_otp_mod").click(function(){
    var phone_mod = $("#phone_mod").val()
    
    $.ajax({
      type: "POST",
      url: "sms.php",
      data: {
        phone: phone_mod
      },
      success: function(data) {
        $("#otp_stay").val(data)
       
      }
    })
  })
  // otp

$("#display_none").click(function(){

  $.ajax({
    type : 'POST',
    url : 'add_user.php',
    dataType:"json",
    data : $('#fome').serialize(),
    success : function(res){
      if (res == "success") {
        alert("ลงทะเบียนสำเร็จ")
        window.location="index.php";
      }
      $("#err_idc").hide()
      $("#err_em").hide()
      $("#err_num").hide()
      $("#err_use").hide()
      $("#err_org").hide()
      res_len = res.length
      for(i=0;i<res_len;i++){
        if(res[i] == "idc"){
          $("#err_idc").show()

        }
        if(res[i] == "em"){
          $("#err_em").show()
        }
        if(res[i] == "num"){
          $("#err_num").show()
        }
        if(res[i] == "use"){
          $("#err_use").show()
        }
        if(res[i] == "org"){
          $("#err_org").show()
        }
      }
    }
  })
})

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
      html = `

              <label for="">โรงเรียน</label> <h6 style="color:#4b9258;" >* กรอกสถานศึกษา(มหาลัย/มัธยม/ประถม ฯลฯ)</h6>
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
