<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
include "navbar.php";
include "header.php"; 
 $ev = $_GET["event_id"];
 $sql = "SELECT * FROM `vote` WHERE event_id=$ev";
$result = mysqli_query($conn,$sql);
$row = $result->num_rows;
$sql1 = "SELECT * FROM `event` WHERE  event_id=$ev";
$result1 = mysqli_query($conn,$sql1);
$rows = $result1->fetch_assoc();
?>
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
    <div class="row" style="margin-top: 5%;">
    <div class="col-1">
    </div>
    <div class="col-3">
    ผู้ใช้สิทธิ์ลงคะแนน : <?php echo $row; ?> คน
    </div>
    <div class="col-7" >
    <div class="progress" >
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row; ?>%"></div>
    </div>  
    </div>
    </div>
</div>