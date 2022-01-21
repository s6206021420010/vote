<?php
session_start();
  $user_id=$_GET['user_id'];
  $fn = $_SESSION['fn'];
  $img = $_SESSION['image'];
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
        <h3 style="color:#3d4c53; margin-top:10px;   top: 0px; left: 0px; ;" >รายการเลือกตั้งที่สร้าง</h3>
        <div class="container" id="body" style="position:fixed; left:12%; width:40%;">

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {?>
                <h3>ข้อมูลส่วนตัว</h3>
                <hr style="padding: 0px;  width: 98%;">
                <form class="" action="per_insert.php" method="post">

                  <label for="" >หมายเลข</label>
                  <input class="form-control" type="text" name="applicant_id" value="<?php echo $row['applicant_id']; ?>" hidden>
                  <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
                  <label for="">ชื่อผู้สมัคร</label>
                  <input class="form-control" type="text" name="applicant_name" value="<?php echo $row['applicant_name']; ?>">
                  <label for="">รูป</label>
                  <img class="form-control" style="width:20%; height:20%"src="images/<?php echo $row['image']; ?>" alt=""><br>
                  <input id="btn"type="submit" name="" value="ยืนยัน" class="btn btn-success">

                </div>

                </form>
              </div>
                <?php include('script.php');?>

        <?php  }
          }
         ?>
      </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="script.js"></script>
    </html>
  </html>
