<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
  $org=$_SESSION['org'];
  $dep=$_SESSION['dep'];
  $dep2=$_SESSION['dep2'];
date_default_timezone_set('Asia/Bangkok');

$user_id = $_SESSION['user_id'];
include "header.php";
 $ev = $_GET["event_id"];
 // voteall
  $sqlall = "SELECT * FROM `event_user` WHERE `event_id`='$ev'";
$resultall = mysqli_query($conn,$sqlall);
$rowall = $resultall->num_rows;
// voteall

// ผู้ใช้สิทธิ์ลงคะแนน
 $sql = "SELECT * FROM `vote` WHERE event_id=$ev ";
$result = mysqli_query($conn,$sql);
$row = $result->num_rows;
// ผู้ใช้สิทธิ์ลงคะแนน

// เลือกใช้สิทธิ์ไม่ลงคะแนน
 $sqlo = "SELECT * FROM `vote` WHERE event_id=$ev AND applicant_id = '1'";
$resulto = mysqli_query($conn,$sqlo);
$rowo = $resulto->num_rows;
// เลือกใช้สิทธิ์ไม่ลงคะแนน

// event
$sql1 = "SELECT * FROM `event` WHERE  event_id=$ev";
$result1 = mysqli_query($conn,$sql1);
$rows = $result1->fetch_assoc();
// event

// applicant
 $sql_app = "SELECT * FROM `applicant` WHERE event_id = '$ev'";
$result_app = mysqli_query($conn,$sql_app);

 // applicant

?>
<style>

  #search{
    display: none;
  }
  #search2{
    display: none;
  }
</style>
<div class="container">
<div class="card p-3  overflow-hidden">
    <div class="row" >
        <div class="col">
            <a href="vote_value.php" class="btn btn-danger rounded-pill">กลับ</a>
        </div>
    </div>
    <div class="row">
    <div class="col-1"></div>
    <div class="col-3">
    <h2>ผลการโหวต</h2>
    </div>

    </div>
    <div class="row">

        <div class="col-1">

        </div>
        <div class="col-3">
        ฃื่อการเลือกตั้ง : <?php echo $rows["event_name"]; ?>
        </div>
        <div class="col-3">
        รายละเอียดการเลือกตั้ง : <?php echo $rows["event_detail"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3" >
        วันเปิดการเลือกตั้ง : <?php echo $rows["date_start"]; ?>
        </div>
        <div class="col-3" >
        เวลาเปิดการเลือกตั้ง : <?php echo $rows["time_start"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3" >
        วันปิดการเลือกตั้ง : <?php echo $rows["date_end"]; ?>
        </div>
        <div class="col-3" >
        เวลาปิดการเลือกตั้ง : <?php echo $rows["time_end"]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3">
        ผู้สร้างการเลือกตั้ง : <?php echo $rows["user_id"]; ?>
        </div>
        <div class="col-3 text-light rounded <?php if ($rows["status_event"]=="Private") {echo 'bg-danger';}else{echo 'bg-success';}?>" >
        สถานะการเลือกตั้ง : <?php echo $rows["status_event"]; ?>
        </div>
    </div>
    <div>
      <p id="date_end" hidden><?php echo $rows["date_end"]; ?></p>
      <p id="time_end" hidden><?php echo $rows["time_end"]; ?></p>
    </div>
    <?php
      $date_head = date("Y-m-d");
     $date_event = $rows["date_end"];
     if($date_head > $date_event){?>
      <!-- conctentวันที่ -->
      <div class="content" id="content">
        <div class="row text-primary" style="margin-top: 5%;">
        <div class="col-1">
        </div>
        <div class="col-4">
          <h4>ผู้ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน วันที่</h4>
        </div>
           <?php if($rows["status_event"] == "Private"){ ?>
        <div class="col-7" >
        <div class="progress" >
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="25" style="width: <?php echo $row*100/$rowall; ?>%"></div>
        </div>
        </div>
      <?php } ?>
        </div>
        <div class="row">
          <div class="col-1">

          </div>
             <?php if($rows["status_event"] == "Private"){ ?>
          <div class="col-7 text-primary">
          ผู้ใช้สิทธิ์ลงคะแนนคิดเป็น % จากทั้งหมด : <?php echo number_format( $row*100/$rowall , 2 )."
"; ?> %
          </div>
                <?php } ?>
        </div>
        <table class="table table-hover ml-5">
    <thead>
      <tr>

        <th scope="col">ชื่อผู้สมัคร</th>
        <th scope="col">หมายเลขผู้สมัคร</th>
        <th scope="col">รายละเอียดผู้สมัคร</th>
        <th scope="col">ผลโหวต</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="bg-danger text-light">ไม่ออกคะแนนเสียง</td>
        <td class="bg-danger text-light"></td>
        <td class="bg-danger text-light"></td>
        <td><?php echo $rowo;?></td>
      </tr>
    <?php
        if ($result_app->num_rows > 0) {
          while($row_app = $result_app->fetch_assoc()) {
              // vote
              $app = $row_app['applicant_id'];
               $sqla = "SELECT * FROM `vote` WHERE `applicant_id`=$app";
              $resultea = mysqli_query($conn,$sqla);
              $rowa = $resultea->num_rows;
              // vote
          ?>

      <tr>
        <td><?php echo $row_app['applicant_name'];?></td>
        <td><?php echo $row_app['applicant_number'];?></td>
        <td><?php echo $row_app['applicant_detial'];?></td>
        <td><?php echo $rowa;?></td>
      </tr>


          <?php
          }
        }
          ?>
          </tbody>
        </table>
        <?php if($rows["status_event"] == "Private"){ ?>
          <div class="row text-danger" style="margin-top: 5%;">
          <div class="col-1">
          </div>
          <div class="col-4">
          <h4>ผู้ไม่ใช้สิทธิ์ลงคะแนน : <?php echo $rowall-$row; ?> คน</h4>
          </div>
          <div class="col">
            <div class="progress">
               <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($rowall-$row)*100)/$rowall; ?>%"></div>
             </div>
          </div>
          </div>
          <div class="row">
            <div class="col-1">

            </div>
            <div class="col-7 text-danger">
                                 ผู้ไม่ใช้สิทธิ์ลงคะแนนคิดเป็น % จากทั้งหมด : <?php echo number_format( (($rowall-$row)*100)/$rowall , 2 )."
  "; ?> %
            </div>
          </div>
          <div class="row" style="margin-top: 5%;">
          <div class="col-1">
          </div>
          <div class="col-3 bg-dark text-light rounded pt-1 mb-5">
          <h4>ผู้มีสิทธิ์ลงคะแนน : <?php echo $rowall ;?> คน</h4>
          </div>
          </div>
      </div>
        <!-- conctentวันที่ -->
      <?php }  ?>

    <?php
     }
     else if($date_head == $date_event){
       $time_head = date("H:i:s");
      $time_end = $rows["time_end"];
       if($time_end < $time_head){?>
           <!-- conctentเวลา -->
           <div class="content" id="content">
             <div class="row text-primary" style="margin-top: 5%;">
             <div class="col-1">
             </div>
             <div class="col-4">
               <h4>ผู้ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน เวลา</h4>
             </div>
                <?php if($rows["status_event"] == "Private"){ ?>
             <div class="col-7" >
             <div class="progress" >
             <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="25" style="width: <?php echo $row*100/$rowall; ?>%"></div>
             </div>
             </div>
           <?php } ?>
             </div>
             <div class="row">
               <div class="col-1">

               </div>
                  <?php if($rows["status_event"] == "Private"){ ?>
               <div class="col-7 text-primary">
               ผู้ใช้สิทธิ์ลงคะแนนคิดเป็น % จากทั้งหมด : <?php echo $row*100/$rowall; ?> %
               </div>
                     <?php } ?>
             </div>
             <table class="table table-hover ml-5">
         <thead>
           <tr>

             <th scope="col">ชื่อผู้สมัคร</th>
             <th scope="col">หมายเลขผู้สมัคร</th>
             <th scope="col">รายละเอียดผู้สมัคร</th>
             <th scope="col">ผลโหวต</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td class="bg-danger text-light">ไม่ออกคะแนนเสียง</td>
             <td class="bg-danger text-light"></td>
             <td class="bg-danger text-light"></td>
             <td><?php echo $rowo;?></td>
           </tr>
         <?php
             if ($result_app->num_rows > 0) {
               while($row_app = $result_app->fetch_assoc()) {
                   // vote
                   $app = $row_app['applicant_id'];
                    $sqla = "SELECT * FROM `vote` WHERE `applicant_id`=$app";
                   $resultea = mysqli_query($conn,$sqla);
                   $rowa = $resultea->num_rows;
                   // vote
               ?>

           <tr>
             <td><?php echo $row_app['applicant_name'];?></td>
             <td><?php echo $row_app['applicant_number'];?></td>
             <td><?php echo $row_app['applicant_detial'];?></td>
             <td><?php echo $rowa;?></td>
           </tr>


               <?php
               }
             }
               ?>
               </tbody>
             </table>
             <?php if($rows["status_event"] == "Private"){ ?>
               <div class="row text-danger" style="margin-top: 5%;">
               <div class="col-1">
               </div>
               <div class="col-4">
               <h4>ผู้ไม่ใช้สิทธิ์ลงคะแนน : <?php echo $rowall-$row; ?> คน</h4>
               </div>
               <div class="col">
                 <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($rowall-$row)*100)/$rowall; ?>%"></div>
                  </div>
               </div>
               </div>
               <div class="row">
                 <div class="col-1">

                 </div>
                 <div class="col-7 text-danger">
                 ผู้ไม่ใช้สิทธิ์ลงคะแนนคิดเป็น % จากทั้งหมด : <?php echo (($rowall-$row)*100)/$rowall; ?> %
                 </div>
               </div>
               <div class="row" style="margin-top: 5%;">
               <div class="col-1">
               </div>
               <div class="col-3 bg-dark text-light rounded pt-1 mb-5">
               <h4>ผู้มีสิทธิ์ลงคะแนน : <?php echo $rowall ;?> คน</h4>
               </div>
               </div>
           </div>
          <!-- conctentเวลา -->
             <?php }  ?>
          <?php }else{?>
            <div class="row">
          <div class="col-2">
          </div>
          <div class="col">
          <div class="card bg-danger w-75 mt-3" >
            <h2 class="d-flex justify-content-center text-light p-2">รอหมดเวลาโหวตเพื่อดูผลการโหวต</h2>
          </div>
          </div>
        </div>
         <?php }
          ?>

    <?php
     }
     else{
       ?>
        <div class="row">
          <div class="col-2">
          </div>
          <div class="col">
          <div class="card bg-danger w-75 mt-3" >
            <h2 class="d-flex justify-content-center text-light p-2">รอหมดเวลาโหวตเพื่อดูผลการโหวต</h2>
          </div>
          </div>
        </div>
       <?php
     }
    ?>
    </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>
