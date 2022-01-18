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
  </style>
<div class="row-12">

      <nav class="navbar navbar-expand-lg navbar-light " style="position:fixed; z-index:2; width:100%; top:0px; background:#ffffff;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a style="margin-left:50px;"class="navbar-brand" href="home.php?user_id=<?php echo $user_id; ?>"><img style="width:3%; position:fixed; left:15px;"src="images/vote.png" alt="">รายการเลือกตั้ง</a>

    <d iv class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <form class="form-inline my-2 my-lg-0" method="get" action="">
        <input  class="form-control mr-sm-2" type="text" name="txt_search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

    <a href="logout.php"class="btn btn-success" style="position:fixed; right:1%; width:10%; height:9%; background:#ffffff00; color:#49915a;padding:10px;">ออกจากระบบ</a>
    </nav>
  <hr style="position: fixed;  z-index:0;width: 107%;top: 40px;height: 0px;">

  </div>
<div class="row-12">
  <div class="col-4">
    <ul class="nav flex-column" style="z-index:0;position:fixed; top:58px; width:170px;background:#f4f4f4; height:100%;">
    <li class="nav-item">
      <a class="nav-link" href="home_admin.php" style="left:0px; font-size: 1.1em; color:#525252; width:100%;" ><i class="fas fa-tasks"></i> รายการเลือกตั้ง</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-user-plus"></i> ข้อมูลสมาชิก</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" style="left:0px; font-size: 1.1em; color:#525252;" ><i class="fas fa-users-cog"></i> ข้อมูลส่วนตัว</a>
    </li>
    </ul>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
</html>
