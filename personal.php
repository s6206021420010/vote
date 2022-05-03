<?php
session_start();
  $user_id=$_GET['user_id'];
  $fn = $_SESSION['fn'];
  $img = $_SESSION['image'];
  $sr = "1";
  include "header.php";
  include "navbar.php";
  include "function.php";
  $db = new db();
  $result = $db->select("*","user
LEFT JOIN organization ON user.organization_id = organization.organization_id
","user_id = '$user_id'ORDER BY user.organization_id");

?>
<style>
     #frmCheckPassword {
                border-top: #F0F0F0 2px solid;
                background: #808080;
                padding: 10px;
            }

            .demoInputBox {
                padding: 7px;
                border: #F0F0F0 1px solid;
                border-radius: 4px;
            }

            #password-strength-status {
                padding: 5px 10px;
                color: #FFFFFF;
                border-radius: 4px;
                margin-top: 5px;
            }

            .medium-password {
                background-color: #b7d60a;
                border: #BBB418 1px solid;
            }

            .weak-password {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }

            .strong-password {
                background-color: #12CC1A;
                border: #0FA015 1px solid;
            }

  #search{
    display: none;
  }
  #search2{
    display: none;
  }
  #new_pass{
    display: none;
  }
  #row_pass{
    display: none;
  }
</style>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>

      <body style="background-color: #ffffff;">
        <div class="container w-75" id="body" style="position:fixed; left:170px;  margin-top:70px;">
            <div class="row">
              <?php
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {?>
                      <h3>ข้อมูลส่วนตัว</h3>
                      <hr>
                <div class="col">
                      <form class="" action="per_insert.php" method="post" enctype="multipart/form-data">
                        <label for="" >ชื่อ</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
                        <label for="">บัตรประชาชน</label>
                        <input class="form-control" type="text" name="id_card" value="<?php echo $row['id_card']; ?>" maxlength="13" required >
                        <label for="">เบอร์โทร</label>
                        <input class="form-control" type="text" name="number" value="<?php echo $row['number']; ?>" maxlength="10" required  >
                        <label for="">รูป</label>
                        <img class="form-control" id="img_head" style="width:20%; height:20%"src="images/<?php echo $row['image']; ?>" alt="">
                        <input type="file" class="form-control form-control-sm" name="image" style="margin-top:10px;" value="<?php echo $row['image']; ?>" id="img" >
                        <br>
                        
                </div>
                <div class="col" id="body">
                    <label for="">email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>" >

                    <label for="">Username</label>
                    <input class="form-control" type="text" name="user_name" value="<?php echo $row['user_name']; ?>" >
                    <div class="mt-2 rounded  p-2" style="background:#ffda44;">
                      <label for="">Password</label> <h6 style="color: red;">*กรอกรหัสผ่านให้ถูกต้องเพื่อแก้ไขข้อมูลส่วนตัว</h6>
                          <input class="form-control " type="password" name="user_pass" id="pas1" value="">
                      <label for="">confirm Password</label>
                      <input class="form-control" type="password" name="" id="pas2" value="" >
                      <input class="form-control" type="password" name="stat" id="" value="0" hidden>
                      <input class="form-control" type="password" name="" id="pas3" value="<?php echo $row['user_pass']; ?>"  hidden>
                      <input id="btn"type="submit" name="" style="background:#8378f7; border:#8378f7;" value="ยืนยัน" class="btn btn-success mt-3" >
                      <input id="sw_pass" type="button" data-toggle="modal" data-target="#exampleModal"  value="เปลี่ยนรหัสผ่าน" class="btn btn-dark mt-3 float-right" >
                      <p id="alert"></p>
                    </div>
                    </form>
                </div>
            </div>  
            </div> 
                <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <p id="pass_id" hidden><?php echo $row['user_id'];?></p>
                          <p id="pass_base" hidden><?php echo $row['user_pass'];?></p>
                  
                            <label for="#pass_ck" id="lab_ck">กรอกรหัสผ่าน</label>
                            <input class="form-control" type="password" id="pass_ck" value="" placeholder="กรอกรหัสผ่านเก่า">
                     
                          <div id="new_pass">
                            <!-- <label for="#pass_ck">กรอกรหัสผ่านใหม่</label>
                            <input class="form-control" type="password" name="" id="pass_new1" placeholder="กรอกรหัสผ่านใหม่">
                            <label for="#pass_ck">กรอกรหัสผ่านใหม่อีกครั้ง</label>
                            <input class="form-control" type="password" name="" id="pass_new2" placeholder="กรอกรหัสผ่านใหม่อีกครั้ง">   -->
                            <label>กรอกรหัสผ่านใหม่</label>
                            <input type="password" name="password" id="password" class="form-control demoInputBox"  placeholder="กรอกรหัสผ่านใหม่" onKeyUp="checkPasswordStrength();" />
                            <div id="password-strength-status"></div>
                            <label for="#pass_ck">กรอกรหัสผ่านใหม่อีกครั้ง</label>
                            <input class="form-control" type="password" name="" id="pass_new2" placeholder="กรอกรหัสผ่านใหม่อีกครั้ง">
                            
                          </div>
                          
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" data-dismiss="modal" id="sub_pass" class="btn btn-primary">ยืนยันการเปลี่ยนรหัสผ่าน</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php include('script.php');?>

        <?php  }
          }
          if (isset($_GET["alert"])) {
            if ($_GET["alert"] == 1) {
              echo "<script>Swal.fire(
              'แก้ไขข้อมูลส่วนตัวสำเร็จ',
              'Successful',
              'success'
                )</script>";

            }
          }
         ?>
      </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script >
       $("#btn").css("pointer-events","none")
      $("#pas1,#pas2").change(function(){
      var pas1 = $("#pas1").val()
      var pas2 = $("#pas2").val()
      var pas3 = $("#pas3").val()
      if(pas1 == pas2 & pas2 == pas3 & pas1 == pas3){
        $("#btn").css("pointer-events","auto")
      }
      if(pas1 != pas3 | pas2 != pas3){
        $("#btn").css("pointer-events","none")
      }
      })



    </script>
    </html>
  </html>
