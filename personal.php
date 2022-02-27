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
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>

      <body style="background-color: #ffffff;">
        <div class="container" id="body" style="position:fixed; left:12%; width:40%; margin-top:4%;">
            <div style="height:40px;"class="row">

            </div>
            <div class="row">
              <?php
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {?>
                      <h3 style="margin">ข้อมูลส่วนตัว</h3>
                      <hr style="padding: 0px;  width: 98%;">
                      <form class="" action="per_insert.php" method="post" enctype="multipart/form-data">
                        <label for="" >ชื่อ</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
                        <label for="">บัตรประชาชน</label>
                        <input class="form-control" type="text" name="id_card" value="<?php echo $row['id_card']; ?>" maxlength="13" required>
                        <label for="">เบอร์โทร</label>
                        <input class="form-control" type="text" name="number" value="<?php echo $row['number']; ?>" maxlength="10" required>
                        <label for="">รูป</label>
                        <img class="form-control" id="img_head" style="width:20%; height:20%"src="images/<?php echo $row['image']; ?>" alt="">
                        <input type="file" class="form-control form-control-sm" name="image" style="margin-top:10px;" value="<?php echo $row['image']; ?>" id="img" >
                        <br>
                        <input id="btn"type="submit" name="" style="background:#8378f7; border:#8378f7;" value="ยืนยัน" class="btn btn-success" >
            </div>

                </div>
                <div class="container" id="body" style="position:fixed; right:9%;top:26.0%; width:40%;">
                    <label for="">email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>">
                    <label for="">Username</label>
                    <input class="form-control" type="text" name="user_name" value="<?php echo $row['user_name']; ?>">
                    <label for="">Password</label> <h6 style="color: red;">*กรอกรหัสผ่านให้ถูกต้องเพื่อแก้ไขข้อมูลส่วนตัว</h6>
                        <input class="form-control " type="password" name="user_pass" id="pas1" value="">
                    <label for="">confirm Password</label>
                    <input class="form-control" type="password" name="" id="pas2" value="" >
                    <input class="form-control" type="password" namyye="stat" id="" value="0" hidden>
                    <input class="form-control" type="password" name="" id="pas3" value="<?php echo $row['user_pass']; ?>"  hidden>
                </form>

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
