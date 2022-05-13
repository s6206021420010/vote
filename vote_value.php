<?php
session_start();

$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
 $user_id = $_SESSION['user_id'];

include "navbar.php";
include "header.php"; 
$sql = "SELECT * FROM `event` WHERE user_id =  $user_id";
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
                <td><a href="vote_commit.php?event_id=<?php echo $row["event_id"];?>" class="btn btn-success"> ดูคะแนน </a></td>
            </tr>
        <?php
        }
        ?>
        </table>
        </div>
    </div>
</div>
