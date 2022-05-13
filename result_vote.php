<?php
session_start();

$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
 $user_id = $_SESSION['user_id'];

include "navbar0.php";
include "header.php"; 
$sql = "SELECT event.event_id ,event.event_name,event.event_detail,event.date_start,event.image,event.status_event,event.user_id,event.event_type,event.organization_id,event.department_id,event.department2_id,event.date_end,event.time_start,event.time_end FROM event LEFT JOIN event_user ON event.event_id = event_user.event_id WHERE event_user.user_id = $user_id OR status_event = 'Public' GROUP BY event.event_id";
$result = mysqli_query($conn,$sql);
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
    <div class="row" style="height: 56px; background:red;">

    </div>
    <div class="row">
        <div class="col-1" style="height: 56px; ">
        </div>
        <div class="col-11">
        <table class="table">
            <th>รูป</th>
            <th>ชื่อ</th>
            <th>รายละเอียด</th>
            <th>คะแนนโหวต</th>
            <?php
            while($row = $result->fetch_assoc()) {?>  
            <tr>
                <td><img class="rounded " style="width:150px; height:150px; object-fit: cover;" src="images/<?php echo $row["image"]; ?>" alt=""></td>
                <td><?php echo $row["event_name"]; ?></td>
                <td><?php echo $row["event_detail"]; ?></td>
                <td><a href="vote_commit2.php?event_id=<?php echo $row["event_id"];?>" class="btn btn-success"> ดูคะแนน </a></td>
            </tr>
        <?php
        }
        ?>
        </table>
        </div>
    </div>
</div>
