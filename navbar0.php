<!DOCTYPE html>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<html lang="en" dir="ltr">
<style media="screen">
  .btn-custom {
    margin-left: 9px !important;
    color: #28a745 !important;
    border-color:  !important;
    border-radius: 30px !important;
    box-shadow: 0px 1px 4px #d6d6d6 !important;
    padding: 13px 10px !important;
  }

  .btn-custom:hover {
    color: white !important;
    border-color: #28a745 !important;
    border-radius: 30px !important;
    background: #28a745 !important;
  }

  .nav-link {
    color: #525252;
    font-size: 0.96em;
  }

  .nav-link:hover {
    color: #28a745;
    ;
  }

  #bd {
    display: none;
  }

  body {
    font-family: 'Prompt', sans-serif;
    border-collapse: collapse;
  }

  .flex-column {
    z-index: 3;
    position: fixed;
    top: 57px;
    width: 165px;
    height: 100%;

  }

  .card {
    height: 70px;
    margin-top: 50px;
    width: 90%;
    margin-left: 5%;
  }

  .profile {
    margin: 0;
    width: 100%;
    border-width: 0.1px;
    border: #212529;

  }
</style>

<body>

  <nav class="navbar navbar-expand-lg navbar-light " style="position:fixed; z-index:2; width:100%; top:0px; background-image: linear-gradient(180deg, #e64980 5%, #ff8787 95%);">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a style="margin-left:50px; color: #ffffff;" class="navbar-brand" href="home0.php?user_id=<?php echo $user_id; ?>"><img style="width:3%; position:fixed; left:15px;" src="images/vote.png" alt="">รายการเลือกตั้ง</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

      <form id="Search" class="form-inline my-2 my-lg-0" method="get" action="" <?php if ($sr == "1") {echo "hidden";} ?>  
      <input type="text">                                                                          
        <input class="form-control mr-sm-2" type="text" name="txt_search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" style="
      background: #ffffff00;
      color: #ffffff;
      border-color: white;" type="submit">Search</button>
      </form>
    </div>
    <a href="logout.php" class="btn btn-success" style="    position: fixed;
    right: 1%;
    width: 10%;
    height: 9%;
    background: #ffffff00;
    color: #ffffff;
    padding: 10px;
    border-color: white;">ออกจากระบบ</a>
  </nav>
  <hr style="position: fixed;  z-index: 2;width: 107%;top: 40px;height: 0px;">
  <ul class="nav flex-column">

    <li class="nav-item">
      <img src="images/<?php echo $img ?>" alt="avatar" class="avatar" style="width:50px;height:50px;border-radius:50%;position:fixed; z-index:1;margin-top:20px; margin-left:53px;">
      <div class="card" style="display: flex;">
        <h6 style=" margin-left: 10px;width: 100px; text-align:left; margin-top:20px;">name
          <hr class="profile"><?php echo $fn; ?>
        </h6>

      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="personal0.php?user_id=<?php echo $user_id; ?>" style="left:0px; font-size: 1.1em; color:#525252;"><i class="fas fa-users-cog"></i> ข้อมูลส่วนตัว</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ad" href="result_vote.php" style="left:0px;color:#525252;"><i class="fas fa-poll"></i> ผลการโหวต</a>
    </li>
  </ul>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>

</html>