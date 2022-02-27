<?php
session_start();
$sr = 1;
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_GET['user_id'];
include "header.php";
include "function.php";
include "navbar0.php";
$event_id = $_GET['event_id'];
$date = $_GET['date'];

$db = new db();
$result = $db->select("*", "applicant", "event_id = '$event_id'");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container" id="body" style="position:absolute; top:10%; left:12%;display:none;">
  <h3 style="margin:10px;">ลงคะแนน</h3> <a href="home0.php" type="button" class="btn btn-danger" style="border-radius: 35px;"><i class="material-icons" style="font-size:10px">navigate_before</i>กลับ </a>

  <table class="table " style="width:100%;">
    <tr>
      <th scope="col" style="text-align: center;">
        รูป
      </th>
      <th scope="col" style="text-align: center;">
        ชื่อ
      </th>
      <th scope="col" style="text-align: center;">
        หมายเลข
      </th>
      <th scope="col" style="text-align: center;">
        ดูข้อมูล
      </th>

      <th scope="col" style="text-align: center;">
        time now
      </th>


    </tr>
    <?php
    $sql2 = "SELECT * FROM `event` WHERE `event_id`= $event_id";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = $result2->fetch_assoc();
    date_default_timezone_set('asia/bangkok');
    $date_now = date("Y-m-d");
    $time = date("H:i:s");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td style="align-items: center;">
            <img style="width:100px; height:49px;border-radius:5px;object-fit:cover;position:absolute; " src="images/<?php echo $row['applicant_image']; ?>" alt="">
          </td>
          <td style="text-align: center;"><?php echo $row['applicant_name']; ?></td>
          <td style="text-align: center;"><?php echo $row['applicant_number']; ?></td>
          <td style="text-align: center;"><a style="margin:5px; border-radius:5px;" data-target="#myModal-detail-<?php echo $row["applicant_id"] ?>" data-toggle="modal" class="btn btn-success">ข้อมูล</a></td>

          <td style="text-align: center;">
            <?php
            $sql = "SELECT * FROM `vote` WHERE user_id='$user_id' and event_id='$event_id'";
            $result1 = mysqli_query($conn, $sql);

            
            if ($date >= $date_now) {
              if( $time <= $row2['time_end']){
              if ($result1->num_rows > 0) {
                $row1 = $result1->fetch_assoc()
            ?>
                <a style="margin:5px; border-radius:5px;" class="btn btn-danger">ลงคะแนนแล้ว</a>
              <?php
              } else { ?>
                <a style="margin:5px;" href="result.php?user_id=<?php echo $user_id; ?>&event_id=<?php echo $event_id; ?>&applicant_id=<?php echo $row['applicant_id']; ?>&date=<?php echo $date ?>" class="btn btn-success">ลงคะแนน</a>
              <?php
              }
            }else{?>
          <a style="margin:5px; border-radius:5px;" class="btn btn-danger">หมดเวลาโหวต</a>
            <?php
            }

            } else { ?>
              <a style="margin:5px; border-radius:5px;" class="btn btn-danger">หมดเวลาโหวต</a>
            <?php }
            ?>
          </td>

          <td style="text-align: center;">
            <!-- <?php

                  if (isset($row1)) {
                    $row_n = $row1['vote_id'];
                    $sql = "SELECT * FROM `vote` WHERE vote_id='$row_n'";
                    $result2 = mysqli_query($conn, $sql);
                    echo $data = $result1->num_rows;
                  }
                  ?> -->
          </td>
        </tr>
        <div class="modal fade" id="myModal-detail-<?php echo $row["applicant_id"] ?>" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <h4 class="modal-title">ข้อมูลผู้สมัคร</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="mb-5">
                <div style="margin-left:5%;">
                  <style media="screen">
                    .form-control {
                      width: 95%;
                    }
                  </style>
                  <form class="form-group" action="update_event_detel.php" method="post" enctype="multipart/form-data">
                    <div class="w-100 d-flex justify-content-center">
                      <img id="before" style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="<?php echo 'images/' . $row["applicant_image"]; ?>" class="img">
                    </div>

                    <label for="">ชื่อผู้สมัคร</label>
                    <label name="list" class="form-control input-modal" placeholder="Your name.." required><?php echo $row['applicant_name']; ?></label>
                    <label for="">หมายเลข</label>
                    <label name="number" class="form-control" placeholder="Your number.." required><?php echo $row['applicant_number']; ?></label>
                  </form>
                </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script src="script.js"></script>
