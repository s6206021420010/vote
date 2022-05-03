<?php 
error_reporting(0);
session_start();
$user_id =  $_GET['user_id'];

include "header.php";
include "conn.php";
$sql = "SELECT user_id,name,id_card,number,email,image,user_name,user_pass,provinces.name_th AS p,amphures.name_th AS a,districts.name_th AS d ,organization.organization_name AS org,department.department_name AS dep,department2.department2_name AS dep2 FROM `user` LEFT JOIN `provinces` ON user.provinces = `provinces`.`id` LEFT JOIN `amphures` ON user.amphures = `amphures`.`id` LEFT JOIN `districts` ON user.districts = `districts`.`id` LEFT JOIN `organization` ON user.organization_id = `organization`.`organization_id` LEFT JOIN `department` ON user.department_id = `department`.`department_id` LEFT JOIN `department2` ON user.department2_id = `department2`.`department2_id` WHERE `user_id` = $user_id";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc()
 ?>
 <body>
   <!DOCTYPE html>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   <html lang="en" dir="ltr">
     <style media="screen">
       .btn-custom{
         margin-left: 9px !important;color:#28a745 !important; border-color: !important; border-radius:30px !important; box-shadow:0px 1px 4px #d6d6d6 !important;padding:13px 10px !important;
       }
       .btn-custom:hover{
         color:white !important; border-color:#28a745 !important; border-radius:30px !important; background:#28a745 !important;
       }
       .nav-link{
         color:#525252;
          font-size: 0.96em;
       }
       .nav-link:hover{
         color:#28a745;;
       }
       #bd{
         display:none;
       }
       body{
         font-family: 'Prompt', sans-serif;
         border-collapse: collapse;
       }
       .onoff{
         border-radius: 30px;
         width: 10px;
       }
       .txt_serch{
           display:none;
       }
     </style>
   <div class="row-12">

         <nav class="navbar navbar-expand-lg navbar-light " style="color:#fff; position:fixed; z-index:3; width:100%; top:0px; background:#bce75e;">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <a style="margin-left:50px;"class="navbar-brand" href="home_admin.php"><img style="width:3%; position:fixed; left:15px;"src="images/vote.png" alt="">รายการเลือกตั้ง</a>

       <d iv class="collapse navbar-collapse" id="navbarTogglerDemo03">
         <form class="form-inline my-2 my-lg-0 txt_serch" method="POST" action="">
           <input  class="form-control mr-sm-2" type="text" name="txt_search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>

       <a href="logout.php"class="btn btn-success" style="position:fixed; right:1%; width:10%; height:9%; background:#ffffff00; color:#49915a;padding:10px;">ออกจากระบบ</a>
       </nav>
     <hr style="position: fixed;  z-index:0;width: 107%;top: 40px;height: 0px;">

     </div>
   <div class="row">
     <div class="col-2">
       <ul class="nav flex-column" style="z-index:0;position:fixed; top:58px; width:170px;background:#f4f4f4; height:100%;">
       <li class="nav-item">
         <a class="nav-link" href="home_admin.php" style="left:0px; font-size: 1.1em; color:#525252; width:100%;" ><i class="fas fa-tasks"></i> รายการเลือกตั้ง</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="admin_user.php" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-user-plus"></i> ข้อมูลสมาชิก</a>
       </li>
  
       </ul>
     </div>

     <div class="col-10" style="position:absolute;left:14%;top: 12%; z-index:1;">
     <h3>ข้อมูลผู้ใช้งาน</h3>
     <div class="card p-3">
         <div class="row ">
             <div class="col">
                <img src="images/<?php echo $row['image'];?>" class="rounded" style="width:170px; height:170px;" alt="">
             </div>
             <div class="col">
                
             </div>
         </div>
         <div class="row mt-2 border-top pt-3">
             <div class="col-3">
                <h4>ชื่อผู้ใช้งาน</h4>
             </div>
             <div class="col-3 border-right">
                <?php echo $row['name'];?>
             </div>
             <div class="col-3">
                <h4>รหัสบัตรประชาชน</h4>
             </div>
             <div class="col-3">
                <?php echo $row['id_card'];?>
             </div>
         </div>
         <div class="row mt-2 pt-3">
             <div class="col-3">
                <h4>เบอร์โทร</h4>
             </div>
             <div class="col-3 border-right">
                <?php echo $row['number'];?>
             </div>
             <div class="col-3">
                <h4>อีเมล</h4>
             </div>
             <div class="col-3">
                <?php echo $row['email'];?>
             </div>
         </div>
         <div class="row mt-2 pt-3">
             <div class="col-3">
                <h4>Username</h4>
             </div>
             <div class="col-3 border-right">
                <?php echo $row['user_name'];?>
             </div>
             <div class="col-3">
                <h4>Password</h4>
             </div>
             <div class="col-3">
                <?php echo $row['user_pass'];?>
             </div>
         </div>
         <div class="row mt-2 border-top pt-3">
             <div class="col-2">
                <h4>ตำบล</h4>
             </div>
             <div class="col-2 border-right">
                <?php echo $row['p'];?>
             </div>
             <div class="col-2">
                <h4>อำเภอ</h4>
             </div>
             <div class="col-2 border-right">
                <?php echo $row['a'];?>
             </div>
             <div class="col-2">
                <h4>จังหวัด</h4>
             </div>
             <div class="col-2">
                <?php echo $row['d'];?>
             </div>
         </div>
         <div class="row mt-2 border-top pt-3">
             <div class="col-2">
                <h4>องค์กร</h4>
             </div>
             <div class="col-2 border-right">
                <?php echo $row['org'];?>
             </div>
             <div class="col-2">
                <h4>ข้อมูลย่อย1</h4>
             </div>
             <div class="col-2 border-right">
                <?php echo $row['dep'];?>
             </div>
             <div class="col-2">
                <h4>ข้อมูลย่อย1</h4>
             </div>
             <div class="col-2">
                <?php echo $row['dep2'];?>
             </div>
         </div>
         <div class="row mt-2 border-top pt-3">
             <div class="col-12">
                <a href="admin_user.php" class="btn btn-danger">ย้อนกลับ</a>
             </div>
         </div>
        </div>
     
     </div>  

     <script src="https://code.jquery.com/jquery-3.6.0.min.js">
     </script>
     <script type="text/javascript">
     </script>
   </html>
