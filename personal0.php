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

            </div>
            <div class="row">
              <h3 style="color:#3d4c53; margin-top:10px;   top: 0px; left: 0px; ;" >รายการเลือกตั้งที่สร้าง</h3>
              <?php
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {?>
                      <h3 style="">ข้อมูลส่วนตัว</h3>
                      <hr style="padding: 0px;  width: 98%;">
                      <form class="" action="per_insert.php" method="post">

                        <label for="" >ชื่อ</label>
                        <input class="form-control" type="text" name="user_id" value="<?php echo $row['user_id']; ?>" hidden>
                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
                        <label for="">บัตรประชาชน</label>
                        <input class="form-control" type="text" name="id_card" value="<?php echo $row['id_card']; ?>">
                        <label for="">เบอร์โทร</label>
                        <input class="form-control" type="text" name="number" value="<?php echo $row['number']; ?>">
                        <label for="">รูป</label>
                        <img class="form-control" style="width:20%; height:20%"src="images/<?php echo $row['image']; ?>" alt=""><br>
                        <input id="btn"type="submit" name="" value="ยืนยัน" class="btn btn-success">
            </div>

                </div>
                <div class="container" id="body" style="position:fixed; right:9%;top:30.2%; width:40%;">
                    <label for="">Username</label>
                    <input class="form-control" type="text" name="user_name" value="<?php echo $row['user_name']; ?>">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="user_pass" value="<?php echo $row['user_pass']; ?>">
                    <br><button type="button" name="button" class="btn btn-danger" id="b_pass">เปลี่ยนรหัสผ่าน</button>

                </form>
              </div>
                <?php include('script.php');?>

        <?php  }
          }
         ?>
      </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="script.js">
    $( "#Search" ).mouseenter(function(){
        alert("helllllllllllllllo")
    })
    </script>
    </html>
  </html>
