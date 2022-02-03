<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  session_start();
  $fn = $_SESSION['fn'];
  $img = $_SESSION['image'];
  include "header.php";
  include "conn.php";

  $sec = $_GET["user_id"];
  $sql = "SELECT * FROM user";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
  $user_id = $_SESSION['user_id'];

  include "navbar.php";

  ?>
</head>

<body>
  <div class="container" id="body" style="position:absolute; top:13%; left:12%; display:none;">

    <div class="col-sm-12 col-md-12 col-lm-2">
      <h3>สร้างการเลือกตั้ง</h3>
      <form action="add_eventlist.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-7">
            <div class="col-md-12 mb-4">
              <label for="">ชื่อการเลือกตั้ง</label>
              <input type="text" id="" name="event_name" class="form-control" placeholder="ชื่อการเลือกตั้ง" required>
              <input type="text" value="<?php echo $sec ?>" name="user_id" class="form-control" hidden>
            </div>

            <div class="col-md-12 mb-4">
              <label for="">รายละเอียดการเลือกตั้ง</label>
              <textarea id="" name="event_detail" class="form-control" placeholder="รายละเอียดการเลือกตั้ง"></textarea>
            </div>

            <div class="col-md-12 row mb-4">
              <div class="col-md-6">
                <label for="">วันเปิดโหวต</label>
                <input type="date" id="birthdaytime" class="form-control" name="date_start">
              </div>

              <div class="col-md-6">
                <label for="">เวลาเปิดโหวต</label>
                <input type="time" id="birthdaytime" class="form-control" name="time_start">
              </div>
            </div>

            <div class="col-md-12 row mb-4">
              <div class="col-md-6">
                <label for="">วันปิดโหวต</label>
                <input type="date" id="birthdaytime" class="form-control" name="date_end">
              </div>

              <div class="col-md-6">
                <label for="">เวลาปิดโหวต</label>
                <input type="time" id="birthdaytime" class="form-control" name="time_end">
              </div>
            </div>

            <div class="col-md-12 mb-4">
              <label for="cars">ประเภทการเลือกตั้ง</label>
              <select class="form-select form-control" name="cars" id="cars">
                <option value="Public" selected>Public</option>
                <option value="Private">Private</option>
              </select>
            </div>

            <div class="col-md-12 row mb-4">
              <label for="" class="col-md-4">รูปภาพ</label>
              <div class="col-md-8">
                <input class="form-control " type="file" name="file" id="file">
              </div>
            </div>



            <div class="col-md-12 row">
              <div class="col-md-6">
              <a href="show.php"> 
              <button type="submit" class="btn btn-success" style="margin-top:9px;">
           สร้างการเลือกตั้ง
                </button>
                </a>
              </div>
              <div class="col-md-6">
              <a href="show.php">
                <button type="button" class="btn btn-danger" style="margin-top:9px;">
                 ยกเลิก
                </button>
                </a>
              </div>
            </div>


          </div>

          <br>
          <input type="text" name="organization_id" value="<?php echo $row["organization_id"]; ?>" hidden>
          <input type="text" name="department_id" value="<?php echo $row["department_id"]; ?>" hidden>
          <input type="text" name="department2_id" value="<?php echo $row["department2_id"]; ?>" hidden>
          <input type="text" name="event_type" value="1" hidden>

        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
  <script src="script.js"></script>
</body>

</html>