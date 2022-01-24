<!DOCTYPE html>
<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
$_SESSION["event_id"] = $_GET["event_id"];
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
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
  ?>

  <div class="container" id="body" style="position:absolute;width:85%;top:13%; left:13%; display:none;">
    <h4 style="color:#565656;">จัดการการเลือกตั้ง</h4>
    <button type="button" style="
          background-color:#FFD700;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          " >รายชื่อผู้สมัคร</button>
      <a href="add_xcell.php?user_id=<?php echo $user_id ?>&&event_id=<?php echo $event_id ?>" >
          
<button type="button" style="
          background-color:#191970;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          ">รายชื่อผู้มีสิทธิ์เลือกตั้ง</button>
</a>

<button type="button" style="
          background-color:#B03060;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          ">ผลการเลือกตั้ง</button>
</a>
<hr style="    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 2px;
    border-top: 3px solid rgb(0 0 0);
">


    <!-- <a href="show.php" class="btn btn-danger" style="float:right;">ย้อนกลับ</a> -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="color:black;">
          <div class="modal-header">
            <h4 class="modal-title">เพิ่มข้อมูลผู้สมัคร</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="">
            <div style="margin-left:5%;">
              <style media="screen">
                .form-control {
                  width: 95%;
                }
              </style>
              <form class="form-group" action="add_event_detel.php" method="post" enctype="multipart/form-data">
                <label for="">ชื่อผู้สมัคร</label>
                <input type="text" name="list" class="form-control input-modal" placeholder="Your name.." value="" required>
                <input type="hidden" name="user_id" class="form-control input-modal" placeholder="Your name.." value="<?php echo   $user_id ?>" required>

                <input type="hidden" name="id" value="<?php echo $event_id ?>">
                <label for="">หมายเลข</label>
                <input type="text" name="number" class="form-control" placeholder="Your number.." value="" required>
                <label for="">รูปภาพ</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" value="">
                <input type="submit" value="เพิ่ม" class="btn btn-success" style="width: 95%; align-items:center; margin-top: 5px; ">
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

 <div class="col-md-12 text-right">
 <button type="button" style="
          background-color:#06b172;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          " data-toggle="modal" data-target="#myModal">เพิ่มผู้สมัคร <i class="fas fa-plus-circle" aria-hidden="true"></i></button>
 </div>
    <table class="table" style="border-radius:5px; color:white;">
      <thead>
        <tr>
          <th scope="col" style="color:#E6772E;">หมายเลข</th> 
          <th scope="col" style="color:#E6772E;">ชื่อรายการโหวต</th>
          <th scope="col" style="color:#E6772E;">รูปภาพ</th>
          <th scope="col" style="color:#E6772E;">แก้ไข</th>
          <th scope="col" style="color:#E6772E;">ลบ</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * FROM `applicant` WHERE event_id = '{$event_id}' ";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tbody>
            <tr>
              <td style="width: 60; color:#3d4c53;">
                <?php echo $row["applicant_number"]; ?>
              </td>
              <td style="width: 60; color:#3d4c53;"><?php echo $row["applicant_name"]; ?></td>
              <td style="width: 60; color:#3d4c53;">
                <img style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="<?php echo 'images/' . $row["applicant_image"]; ?>" class="img">
              </td>
              <td style="width: 20%;">
                <a class="btn btn-primary" data-target="#myModal-edit-<?php echo $row["applicant_id"] ?>" data-toggle="modal"> แก้ไข</a>
              </td>
              <td style="width: 20%;"><a href="list_del.php?applicant_id=<?php echo $row["applicant_id"]; ?>&&event_id=<?php echo $event_id ?>&&user_id=<?php echo $user_id ?>" class="btn btn-danger" type="button" name="">ลบ</a></td>
            </tr>
          </tbody>


          <div class="modal fade" id="myModal-edit-<?php echo $row["applicant_id"] ?>" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="color:black;">
          <div class="modal-header">
            <h4 class="modal-title">เพิ่มข้อมูลผู้สมัคร</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="">
            <div style="margin-left:5%;">
              <style media="screen">
                .form-control {
                  width: 95%;
                }
              </style>
              <form class="form-group" action="update_event_detel.php" method="post" enctype="multipart/form-data">
                <label for="">ชื่อผู้สมัคร</label>
                <input type="text" name="list" class="form-control input-modal" placeholder="Your name.." value="<?php echo $row["applicant_name"] ?>" required>
                <input type="hidden" name="user_id" class="form-control input-modal" placeholder="Your name.." value="<?php echo   $user_id ?>" required>
                <input type="hidden" name="applicant_id" class="form-control input-modal" placeholder="Your name.." value="<?php echo   $row["applicant_id"] ?>" required>
                
                <input type="hidden" name="id" value="<?php echo $event_id ?>">
                <label for="">หมายเลข</label>
                <input type="text" name="number" class="form-control" placeholder="Your number.." value="<?php echo $row["applicant_number"] ?>" required>
                <label for="">รูปภาพ</label>
                <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" class="form-control" value="">
                <input type="submit" value="เพิ่ม" class="btn btn-success" style="width: 95%; align-items:center; margin-top: 5px; ">

                <img id="before" style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="<?php echo 'images/' . $row["applicant_image"]; ?>" class="img">
                <img id="blah" style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="#"  class="img">
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
      <?php
        }
      }

      ?>
    </table>
  </div>
  <table style="background-color:red; width:100%;">
    <tr>

    </tr>
  </table>
</body>
<div class="modal fade" id="detail<?= $row['applicant_id']; ?>">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="color:black;">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลผู้สมัคร</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="">
        <div style="margin-left:5%;">
          <style media="screen">
            .form-control {
              width: 95%;
            }
          </style>
          <form class="form-group" action="add_event_detel.php" method="post">
            <label for="">ชื่อตัวเลือก</label>
            <input type="text" name="list" class="form-control input-modal" placeholder="" value="<?php echo $user_id; ?>" required>
            <input type="hidden" name="id" value="<?php echo $event_id ?>">
            <label for="">หมายเลข</label>
            <input type="text" name="number" class="form-control" placeholder="Your number.." value="" required>
            <label for="">รูปภาพ</label>
            <input type="file" name="image" class="form-control" value="">
            <input type="submit" value="" class="btn btn-success" style="width: 95%; align-items:center; margin-top: 5px; ">
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
<script type="text/javascript">
               let blah =  document.getElementById('blah');
               blah.style.display = 'none';

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);

               let imgBe =  document.getElementById('before');
               imgBe.style.display = 'none';
               blah.style.display = 'block';

            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</html>