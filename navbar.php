  <!DOCTYPE html>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<html lang="en" dir="ltr">
  <style media="screen">
    .btn-custom{
      margin-left: 9px !important;
      color: #8378f7 !important;
      border-radius: 30px !important;
      box-shadow: 0px 1px 4px #d6d6d6 !important;
      padding: 13px 10px !important;
    }
    .btn-custom:hover{
      margin-left: 9px !important;
      color: #fff !important;
      background: #8378f7;
      border-radius: 30px !important;
      box-shadow: 0px 1px 4px #d6d6d6 !important;
      padding: 13px 10px !important;
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
    .logout{
      position: fixed !important ;
      right: 1% !important ;
      width: 10% !important ;
      height: 9% !important ;
      background: #ffffff00 !important ;
      color: #8378f7 !important ;
      padding: 10px !important ;
      border-color: #8378f7 !important ;
    }
    .logout:hover{
      position: fixed !important ;
      right: 1% !important ;
      width: 10% !important ;
      height: 9% !important ;
      background: #8378f7 !important ;
      color: #fff !important ;
      padding: 10px !important ;
      border-color: #8378f7 !important ;
    }
  </style>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light " style="position:fixed; z-index:2; width:100%; top:0px; background:#ffffff;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a style="margin-left:50px;"class="navbar-brand" href="show.php"><img style="width:3%; position:fixed; left:15px;"src="images/v.png" alt="">รายการเลือกตั้ง</a>

  <div class="collapse navbar-collapse col-8" id="navbarTogglerDemo03"  >
    <form class="form-inline my-2 my-lg-0" method="get"  action="" >
      <input  class="form-control mr-sm-2" id="search" type="text" name="txt_search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" id="search2"  type="submit">Search</button>
    </form>
  </div>

 <a href="logout.php" class="btn btn-success logout">ออกจากระบบ</a>

  </nav>
<hr style="position: fixed;  z-index: 2;width: 107%;top: 40px;height: 0px;">
<ul class="nav flex-column" style="z-index:3;position:fixed; top:65px; width:160px;height: 100%;">

<li class="nav-item">
  <a  href="form_addeven.php?user_id=<?php echo $user_id?>"class="btn btn-custom" >สร้างการเลือกตั้ง <i class="fas fa-plus-circle"></i></a>
</li>
<li class="nav-item">
 <img src="images/<?php echo $img ?>" alt="avatar" class="avatar" style="width:50px;height:50px;border-radius:50%;position:fixed; z-index:1;margin-top:20px; margin-left:53px;">
 <div class="card" style="height:59px;margin-top:50px; ">
   <h6 style="text-align:center; margin-top:20px;"><?php echo $fn ;?></h6>

</div>
</li>
<li class="nav-item">
  <a class="nav-link" href="show.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-tasks"></i> รายการที่สร้าง</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="personal.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-users-cog"></i> ข้อมูลส่วนตัว</a>
</li>
<!-- <li class="nav-item">
  <a class="nav-link" href="add_xcell.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-user-plus"></i> เพิ่มสมาชิก</a>
</li> -->
    <li class="nav-item">
      <a class="nav-link"id="ad" href="vote_value.php" style="left:0px;color:#525252;" ><i class="fas fa-poll"></i> ผลการโหวต</a>
    </li>
</ul>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
</html>
