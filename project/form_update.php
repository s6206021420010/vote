
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>



<div class="container" style="margin-top:20px; background:white; border-radius:20px; width:50%; height:80%; ">
  <h3>แก้ไข</h3>
  <hr style="width:97%; text-align:left; margin-left:15;margin-top:30px; background:white;">
  <form action="update.php" method="post" enctype="multipart/form-data">
    <?php
        include "header.php";
        include "conn.php";
        $id = $_GET["event_id"];
        $sql="SELECT * FROM event WHERE event_id = '{$id}'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc()
        ?>
          <div class="form-group">
            <label for=""></label>
            <input type="hidden" id="" name="event_id" class="form-control"  placeholder="Your name..">
          </div>
          <div class="form-group">
            <label for="">ชื่อการเลือกตั้ง</label>
            <input type="text" id="" name="event_name" class="form-control"value="<?php echo $row["event_name"]; ?>" >
          </div>

          <div class="form-group">
            <label for="">รายละเอียดการเลือกตั้ง</label>
            <textarea id="" name="event_detail" class="form-control"><?php echo $row["event_detail"]; ?></textarea>
          </div>

          <div class="form-group">
            <label for="">วันเวลาการเปิด-ปิด</label>
            <input type="date" id="" name="date_time" class="form-control" placeholder="" >
          </div>

          <div class="form-group">
            <label for="">สถานะ</label>
            <select class="form_control" name="">
              <option value="">Private</option>
              <option value="">Public</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">รูปภาพ</label>
            <input type="file" class="form-control" name="image">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success" style="margin:10px;">แก้ไข</button>
            <a href="show.php" type="button" class="btn btn-primary" style="margin:10px; float:right;" href="show.php">กลับ</a>
          </div>



  </form>
</div>
</body>
</html>
