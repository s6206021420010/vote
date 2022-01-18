<!DOCTYPE html>
<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body style="background-color:#ffffff; color:white;">
    <?php
      $user_id = $_GET['user_id'];
      include "navbar.php";
      include "header.php";
      $event_id = $_GET["event_id"];
      $sql = "SELECT * FROM `applicant` WHERE event_id = '{$event_id}' ";
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      ?>

      <div class="container" id="body" style="position:absolute;width:85%;top:13%; left:13%; display:none;">
        <h4 style="color:#565656;">เพิ่มตัวเลือกการโหวต</h4>
          <button type="button" style="
          background-color:#06b172;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          "data-toggle="modal" data-target="#myModal">เพิ่มตัวเลือกการโหวต</button>
          <!-- <a href="show.php" class="btn btn-danger" style="float:right;">ย้อนกลับ</a> -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="color:black;" >
        <div class="modal-header">
            <h4 class="modal-title">เพิ่มข้อมูลผู้สมัคร</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="">
        <div style="margin-left:5%;">
          <style media="screen">
            .form-control{
              width: 95%;
            }
          </style>
          <form class="form-group" action="add_event_detel.php" method="post" >
            <label for="">ชื่อผู้สมัคร</label>
            <input type="text" name="list" class="form-control input-modal" placeholder="Your name.." value=""  required>
            <input type="hidden" name="user_id" class="form-control input-modal" placeholder="Your name.." value="<?php echo   $user_id ?>"  required>

            <input type="hidden" name="id" value="<?php echo $event_id ?>">
            <label for="">หมายเลข</label>
            <input type="text" name="number" class="form-control" placeholder="Your number.." value=""  required>
            <label for="">รูปภาพ</label>
            <input type="file" name="image" class="form-control" value=""  >
            <input type="submit" value="เพิ่ม"class="btn btn-success" style="width: 95%; align-items:center; margin-top: 5px; ">
          </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<!-- correct -->

      <table class="table" style="border-radius:5px; color:white;">
      <thead>
        <tr>
          <th scope="col" style="color:#E6772E;">ชื่อรายการโหวต</th>
          <th scope="col"style="color:#E6772E;">แก้ไข</th>
          <th scope="col"style="color:#E6772E;">ลบ</th>
        </tr>
          </thead>
          <?php
          $sql = "SELECT * FROM `applicant` WHERE event_id = '{$event_id}' ";
          $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
             ?>
  <tbody>
    <tr>
      <td style="width: 60; color:#3d4c53;"><?php echo $row["applicant_name"]; ?></td>
      <td style="width: 20%;">
        <a class="btn btn-primary" href="#detail<?=$row['applicant_id'];?>"data-toggle="modal"> แก้ไข</a>
      </td>
      <td style="width: 20%;"><a href="list_del.php?applicant_id=<?php echo $row["applicant_id"]; ?>" class="btn btn-danger" type="button" name="">ลบ</a></td>
    </tr>
  </tbody>

             <?php
           }
        }

  ?>    </table>
      </div>
      <table style="background-color:red; width:100%;">
        <tr>

        </tr>
      </table>
  </body>
  <div class="modal fade" id="detail<?=$row['applicant_id'];?>">
    <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content" style="color:black;" >
    <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลผู้สมัคร</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>

    </div>
    <div class="">
    <div style="margin-left:5%;">
      <style media="screen">
        .form-control{
          width: 95%;
        }
      </style>
      <form class="form-group" action="add_event_detel.php" method="post" >
        <label for="">ชื่อตัวเลือก</label>
        <input type="text" name="list" class="form-control input-modal" placeholder="" value="<?php echo $user_id; ?>"  required>
        <input type="hidden" name="id" value="<?php echo $event_id ?>">
        <label for="">หมายเลข</label>
        <input type="text" name="number" class="form-control" placeholder="Your number.." value=""  required>
        <label for="">รูปภาพ</label>
        <input type="file" name="image" class="form-control" value=""  >
        <input type="submit" value=""class="btn btn-success" style="width: 95%; align-items:center; margin-top: 5px; ">
      </form>
    </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
  <script src="script.js"></script>
</html>
