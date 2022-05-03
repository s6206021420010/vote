
<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
include "navbar.php";
include "header.php"; 
 $ev = $_GET["event_id"];
// vote
 $sql = "SELECT * FROM `vote` WHERE event_id=$ev";
$result = mysqli_query($conn,$sql);
$row = $result->num_rows;
// vote

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
    <div class="row" style="height:60px; ">
    </div>
    <div class="row">
    <div class="col-1"></div>
    <div class="col-3">
    <h4>ผลการโหวต</h4>
    </div>
    
    </div>
    <div class="row">
        
        <div class="col-1"></div>
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
       
    </div>
    <div>
      <p id="date_end" hidden><?php echo $rows["date_end"]; ?></p>
      <p id="time_end" hidden><?php echo $rows["time_end"]; ?></p>
    </div>
    <?php 
      $date_head = date("Y-m-d");
     $date_event = $rows["date_end"];
     if($date_head > $date_event){?>
      <!-- conctent --> 
    <div class="content" id="content">
      <div class="row" style="margin-top: 5%;">
      <div class="col-1">
      </div>
      <div class="col-3">      ผู้ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน
      </div>
      <div class="col-7" >
      <div class="progress" >
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row; ?>%"></div>
      </div>  
      </div>
      </div>
      <table class="table table-hover ml-5">
  <thead>
    <tr>
      
      <th scope="col">ชื่อผู้สมัคร</th>
      <th scope="col">หมายเลขผู้สมัคร</th>
      <th scope="col">รายละเอียดผู้สมัคร</th>
    </tr>
  </thead>
  <tbody>
  <?php
      if ($result_app->num_rows > 0) {
        while($row_app = $result_app->fetch_assoc()) {
        ?>
    <tr>
      
      <td><?php echo $row_app['applicant_name'];?></td>
      <td><?php echo $row_app['applicant_number'];?></td>
      <td><?php echo $row_app['applicant_detial'];?></td>
    </tr>
    
      
        <?php 
        }
      }
        ?>
        </tbody>
      </table> 
      <div class="row" style="margin-top: 5%;">
      <div class="col-1">
      </div>
      <div class="col-3">
      ผู้ไม่ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน
      </div>
      <div class="col-7" >
      <div class="progress" > 
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row; ?>%"></div>
      </div> 
      </div>
      </div>  
    </div>
    <!-- conctent -->
    <?php
     }
     else if($date_head == $date_event)
     {$time_head = date("H:i:s");
      $time_end = $rows["time_end"];
       if($time_end < $time_head){?>
               <!-- conctent --> 
                <div class="content" id="content">
                  <div class="row" style="margin-top: 5%;">
                  <div class="col-1">
                  </div>
                  <div class="col-3">      ผู้ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน
                  </div>
                  <div class="col-7" >
                  <div class="progress" >
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row; ?>%"></div>
                  </div>  
                  </div>
                  </div>

                  <div class="row" style="margin-top: 5%;">
                  <div class="col-1">
                  </div>
                  <div class="col-3">
                  ผู้ไม่ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน
                  </div>
                  <div class="col-7" >
                  <div class="progress" > 
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row; ?>%"></div>
                  </div> 
                  </div>
                  </div>  
                </div>
                <!-- conctent -->
          <?php
          }else{?>
            <div class="row">
          <div class="col-2">
          </div>
          <div class="col">
          <div class="card bg-danger w-75 mt-3" >
            <h2 class="d-flex justify-content-center text-light p-2">รอหมดเวลาโหวตเพื่อดูผลการโหวต(เวลา)</h2>    
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
            <h2 class="d-flex justify-content-center text-light p-2">รอหมดเวลาโหวตเพื่อดูผลการโหวต(วันที่)</h2>    
          </div>
          </div>
        </div>
       <?php
     }
    ?>
    <!-- endtime -->
    <div id="">

    </div>
    <!-- endtime -->

    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  
</script>