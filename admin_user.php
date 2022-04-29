<?php 
error_reporting(0);
session_start();
$user_id =  $_SESSION['user_id'];

include "header.php";
include "conn.php";
$sql = "SELECT * FROM `event` WHERE 1";
$result = mysqli_query($conn,$sql);
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
     </style>
   <div class="row-12">

         <nav class="navbar navbar-expand-lg navbar-light " style="color:#fff; position:fixed; z-index:3; width:100%; top:0px; background:#bce75e;">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <a style="margin-left:50px;"class="navbar-brand" href="home_admin.php"><img style="width:3%; position:fixed; left:15px;"src="images/vote.png" alt="">รายการเลือกตั้ง</a>

       <d iv class="collapse navbar-collapse" id="navbarTogglerDemo03">
         <form class="form-inline my-2 my-lg-0" method="POST" action="">
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
     <h3>ผู้ใช้งานทั้งหมด</h3>
     <?php  if($_POST){$txt = $_POST['txt_search'];}
      
      $sql="SELECT * FROM user WHERE user_id NOT LIKE '%1101%'AND user_id NOT LIKE '%1103%' AND (user_id LIKE '$txt%' OR name LIKE '$txt%' OR number LIKE '$txt%' OR email LIKE '$txt%')";
     $result=mysqli_query($conn,$sql);
    
     ?>
     <table class="table table-hover" style="margin-top:13px;">
         <th>ชื่อ</th>
         <th>หรัสบัตรประชาชน</th>
         <th>เบอร์โทร</th>
         <th>อีเมล</th>
         <th>ดูข้อมูล</th>
         <th>ลบผู้ใช้</th>

       <?php
       if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
           ?>
            <tr>
                <td>
                    <?php echo $row["name"]; ?>
                </td>
                <td>
                    <?php echo $row["id_card"]; ?>
                </td>
                <td>
                    <?php echo $row["number"]; ?>
                </td>
                <td>
                    <?php echo $row["email"]; ?>
                </td>
                <td>
                    <input type="button" class="btn btn-warning" value="ดูข้อมูล">
                </td>
                <td>
                    
                    <input type="button" onClick="dell(<?php echo $row["user_id"]; ?>)" class="btn btn-danger" value="ลบข้อมูล">
                </td>
            </tr>
            <?php
         }
        }
        ?>

     </div>  
     <script src="https://code.jquery.com/jquery-3.6.0.min.js">
     </script>
     <script type="text/javascript">
         function dell(id){
            //  var id = $("#id_user").html()
            //  alert(id)
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type:"POST",
                url:"admin_user_dell.php",
                data:{
                    id:id
                },
                success: function (data) {
                  
                }
            })
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
         }
       function slide(id){
         // alert(id)
         $.ajax({
            type:"GET",
            url:"ajax.php",
            data:{
                id:id
            },
      
               
            success: function (html) {

            }
         });
       }
       function checkall(){
         $.ajax({
           type:"GET",
           url:"ajax.php",
           data:{
             all:"1"
           },
           dataType:"html",
           success: function (html) {

           }
         });
       }
       function unall(){
         $.ajax({
           type:"GET",
           url:"ajax.php",
           data:{
             un:"2"
           },
           dataType:"html",
           success: function (html) {

           }
         });
       }
     </script>
   </html>
