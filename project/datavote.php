<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_GET['user_id'];
  include "header.php";
  include "function.php";
  include "navbar.php";
  $event_id = $_GET['event_id'];
  $date = $_GET['date'];
  $db = new db();
  $result = $db->select("*","applicant","event_id = '$event_id'");
 ?>
<div class="container" id="body" style="position:absolute; top:10%; left:12%;display:none;">
  <h3 style="margin:10px;">ลงคะแนน</h3>

   <table class="table"style="width:100%;">
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
         ลงคะแนน
      </th>

     </tr>
   <?php
   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {?>
        <tr >
          <td style="align-items: center;">
            <img style="width:100px; height:49px;border-radius:5px;object-fit:cover;position:absolute; "src="images/<?php echo $row['applicant_image']; ?>" alt="">
          </td>
          <td style="text-align: center;"><?php echo $row['applicant_name']; ?></td>
          <td style="text-align: center;"><?php echo $row['applicant_number'];?></td>

          <td style="text-align: center;">
          <?php
          $sql = "SELECT * FROM `vote` WHERE user_id='$user_id' and event_id='$event_id'";
          $result1 = mysqli_query($conn,$sql);

          $date_now = date("Y-m-d");
          if ($date>$date_now) {
            if ($result1->num_rows > 0) {
              $row1 = $result1->fetch_assoc()
              ?>
                <a style="margin:5px; border-radius:5px;"  class="btn btn-danger" >ลงคะแนนแล้ว</a>
              <?php
            }
            else {?>
              <a style="margin:5px;" href="result.php?user_id=<?php echo $user_id; ?>&event_id=<?php echo $event_id;?>&applicant_id=<?php echo $row['applicant_id']; ?>&date=<?php echo $date ?>" class="btn btn-success" >ลงคะแนน</a>
            <?php
            }
          }else {?>
              <a style="margin:5px; border-radius:5px;"  class="btn btn-danger" >หมดเวลาโหวต</a>
            <?php }
           ?>
          </td>

          <td style="text-align: center;">
            <!-- <?php

            if (isset($row1)) {
              $row_n = $row1['vote_id'];
              $sql = "SELECT * FROM `vote` WHERE vote_id='$row_n'";
              $result2 = mysqli_query($conn,$sql);
              echo $data = $result1->num_rows;            }
             ?> -->
          </td>
          </tr>
   <?php
       }
   }
   ?>
     </table>

 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js">
 </script>
 <script src="script.js"></script>
