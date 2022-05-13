<?php
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<?php

$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
$_SESSION["event_id"] = $_GET["event_id"];
?>
<html lang="en" dir="ltr">
<style>
  #search {
    display: none;
  }

  #search2 {
    display: none;
  }
</style>

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body style="background-color:#ffffff;">
  <?php
  $user_id = $_GET['user_id'];
  include "navbar.php";
  include "header.php";

  $event_id = $_GET["event_id"];
  $sql = "SELECT * FROM `applicant` WHERE event_id = '{$event_id}' ";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();

  $sql_event = "SELECT * FROM `event` WHERE event_id = $event_id";
  $result_event = $conn->query($sql_event);
  $row_event = $result_event->fetch_assoc();


  $sql_user = "SELECT d1.department_name,d2.department2_name,org.organization_name FROM `user` u
              left JOIN organization org ON u.organization_id = org.organization_id
              left JOIN department d1 ON u.department_id = d1.department_id
              left JOIN department2 d2 on u.department2_id = d2.department2_id
              WHERE u.`user_id` = $user_id";
  $result_user = $conn->query($sql_user);
  $row_user = $result_user->fetch_assoc();
  ?>


  <div class="container" id="body" style="position:absolute;width:85%;top:13%; left:13%; display:none;">

    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6">
            <h3>รหัสเลือกตั้ง : <?php echo $row_event['event_id']; ?> </h3>
          </div>
          <div class="col-6 text-end">
              <button type="button" class="btn border mr-2 col-3" data-toggle="modal" data-target="#qrc"  value="<?php echo $row_event['event_id']; ?>"><img style="width:50px;" src="images/scan.png" alt="">Generate QRcode</button>
            <button type="button" class="btn btn-warning col-3" data-toggle="modal" data-target="#exampleModal" style="background:#E3BF40 ; color:#fff;" value="<?php echo $row_event['event_id']; ?>">แก้ไข</button>
          </div>
            <!-- //////////////////////////////// -->

            <!-- Modal qr code-->
            <div class="modal fade" id="qrc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สร้าง QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">
                    <div class="row d-flex justify-content-center">
                      <div class="col">
                        <h4>QR Code ของการเลือกตั้ง</h4>
                      </div>
                    </div>
                    <div class="row border-top">
                      <div class="col d-flex justify-content-center align-items-center">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://voteverything.000webhostapp.com/index.php?event_id=<?php echo $event_id; ?>" title="Link to my Website" />
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <form class=""  action="forget_pass00.php" method="POST" >
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลการเลือกตั้ง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5>ชื่อการเลือกตั้ง</h5>
                        <input type="text"  class="form-control" name="ev_id" value="<?php echo $row_event['event_id']; ?>" hidden>
                    <input type="text"  class="form-control" name="ev_n" value="<?php echo $row_event['event_name']; ?>" required>
                    <h5>รายละเอียด</h5>
                    <input type="text"  class="form-control" name="ev_d" value="<?php echo $row_event['event_detail']; ?>" required>
                    <div class="row p-2 bg-success mt-2 text-light rounded">
                      <div class="col">
                        <h5>วันเปิดโหวต</h5>
                        <input type="date"  class="form-control" name="ev_ds" value="<?php echo $row_event['date_start']; ?>" required>
                      </div>
                      <div class="col">
                        <h5>เวลาเปิดโหวต</h5>
                        <input type="time"  class="form-control" name="ev_ts" value="<?php echo $row_event['time_start']; ?>" required>
                                                 <h5>เวลาเดิม<?php echo $row_event['time_start']; ?></h5>
                      </div>
                    </div>

                    <div class="row p-2 bg-danger mt-2 text-light rounded">
                      <div class="col">
                        <h5>วันปิดโหวต</h5>
                        <input type="date"  class="form-control" name="ev_de"  value="<?php echo $row_event['date_end']; ?>" required>
                      </div>
                      <div class="col">
                        <h5>เวลาปิดโหวต</h5>

                        <input type="time"  class="form-control" name="ev_te" value="<?php echo $row_event['time_end']; ?>" required>
                         <h5>เวลาเดิม<?php echo $row_event['time_end']; ?></h5>

                      </div>
                    </div>
                    <p id="stat" hidden><?php echo $row_event['status_event']; ?></p>
                    <div class="row d-flex justify-content-center mt-4 border-top pt-2">


                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- //////////////////////////////// -->
        </div>
        <div class="row">
          <div class="col-6">
            <h5>ชื่อการเลือกตั้ง : <?php echo $row_event['event_name']; ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <h5> <?php echo 'องค์กร ' . $row_user['organization_name'] . ' คณะ ' . $row_user['department_name'] . ' สาขา ' . $row_user['department2_name']; ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <h5>รายละเอียด : <?php echo $row_event['event_detail']; ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <h5>วันเริ่มต้นลงคะแนน : <?php echo $row_event['date_start'] . ' ' . substr($row_event['time_start'], 0, 5) . ' น.'; ?></h5>
          </div>
          <div class="col-5">
            <h5>วันสิ้นสุดลงคะแนน : <?php echo $row_event['date_end'] . ' ' . substr($row_event['time_end'], 0, 5) . ' น.'; ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <h5>รายละเอียด : </h5>
          </div>
        </div>

      </div>
    </div>
    <h4 style="color:#565656;">จัดการการเลือกตั้ง</h4>
    <button type="button" style="
          background-color: #8378f7;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          ">รายชื่อผู้สมัคร</button>
    <a href="add_xcell.php?user_id=<?php echo $user_id ?>&&event_id=<?php echo $event_id ?>">

      <button type="button" style="
          background-color: #8378f7;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          ">รายชื่อผู้มีสิทธิ์เลือกตั้ง</button>
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
          background-color:#C5A7E3;
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
          <th scope="col" style="color:#C1B61D;">หมายเลข</th>
          <th scope="col" style="color:#C1B61D;">ชื่อรายการโหวต</th>
          <th scope="col" style="color:#C1B61D;">รูปภาพ</th>
          <th scope="col" style="color:#C1B61D;">แก้ไข</th>
          <th scope="col" style="color:#C1B61D;">ลบ</th>
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
                <img style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:80px; width:100px;" src="<?php echo 'images/' . $row["applicant_image"]; ?>" class="img">
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

                      <img id="" style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="<?php echo 'images/' . $row["applicant_image"]; ?>" class="img">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
  let blah = document.getElementById('blah');
  blah.style.display = 'none';

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);

        let imgBe = document.getElementById('before');
        imgBe.style.display = 'none';
        blah.style.display = 'block';

      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

</html>
