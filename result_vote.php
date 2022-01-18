<?php
include "header.php";
session_start();
$sr = "1";
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
$org = $_SESSION['org'];
$dep = $_SESSION['dep'];
$dep2 = $_SESSION['dep2'];
include "navbar0.php";
$sql = "SELECT * FROM `event` WHERE status_event = 'Public'";
$result = mysqli_query($conn,$sql);
?>
<style media="screen">
  .container{
    height: 100%
  }
  .first{
    height: 11%;
  }
  table{
    width: 100%;
  }
</style>
<div class="container">
  <div class="row first">
  </div>
  <div class="row">
    <div class="col-1">

    </div>
    <div class="col-11">
      <h3>ผลการโหวต</h3>
      <table class="table table-hover">
        <th>ลำดับ</th>
        <th>ชื่อการเลือกตั้ง</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>ผู้สร้าง</th>
        <th>สถานะ(พิเศษ)</th>
        <th>ตรวจสอบ</th>
            <?php
            $i = 0 ;
            while ($row = mysqli_fetch_array($result)) {
            $i = $i + 1 ;
            ?>
            <tr>
              <td>
            <?php   echo $i; ?>
              </td>
              <td>
            <?php   echo $row['event_name']; ?>
              </td>
              <td>
            <?php   echo $row['event_detail']; ?>
              </td>
              <td>
            <?php   echo $row['status_event']; ?>
              </td>
              <td>
            <?php   echo $row['user_id']; ?>
              </td>
              <td>
            <?php   echo $row['event_type']; ?>
              </td>
              <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#" ><img src="images/eye.png" alt="" style="width:30px;"></a>
              </td>
            </tr>
            <?php
            }
             ?>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<?php
  function modal(){

  }
 ?>
