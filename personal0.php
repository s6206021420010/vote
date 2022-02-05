<?php
session_start();
  $user_id=$_GET['user_id'];
  $fn = $_SESSION['fn'];
  $img = $_SESSION['image'];
  $sr = "1";
  include "header.php";
  include "navbar0.php";
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
        <div class="container" id="body" style="position:fixed; left:12%; width:40%;">
            <div style="height:40px;"class="row">
              <div style="overflow: hidden;">
                <img src="images/dbc8fd71d657a640c3aee9b0cb041838.svg" alt="">
  <svg
    preserveAspectRatio="none"
    viewBox="0 0 1200 120"
    xmlns="http://www.w3.org/2000/svg"
    style="fill: #ffffff; width: 226%; height: 245px;"
  >
    <path
    d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
    opacity=".25"
  />
    <path
      d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
      opacity=".5"
    />
    <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
  </svg>
</div>
            </div>
            <div class="row">
              <h3 style="color:#3d4c53; margin-top:10px;   top: 0px; left: 0px; ;" >รายการเลือกตั้งที่สร้าง</h3>
              <?php
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {?>
                      <h3 style="">ข้อมูลส่วนตัว</h3>
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
                        <input id="btn"type="submit" name="" value="ยืนยัน" class="btn btn-success" >
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
                    <input class="form-control" type="password" name="stat" id="" value="1" hidden>
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
