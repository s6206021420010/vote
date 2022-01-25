<?php
include "conn.php";
include "header.php";
?>
<style media="screen">
  .btn-danger{
    background:#ff5757;
    border-radius:30px;
  }
  .btn-success{
    background:#38d9a9;
    border:#38d9a9 ;
    border-radius:30px;
    width:30%;
  }
  h7{
    color: white;
    font-size: 24px;
  }
</style>
<body>
  <?php
  include "conn.php";
  include "header.php";
  ?>
  <style media="screen">
    .btn-danger{
      background:#ff5757;
      border-radius:30px;
    }
    .btn-success{
      background:#38d9a9;
      border:#38d9a9 ;
      border-radius:30px;
      width:15%;
    }
    h7{
      color: white;
      font-size: 24px;
    }
  </style>
  <body>
    <form class="" action="add_user.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image" value="">
      <input type="submit" name="" value="">
    </form>
  </body>
