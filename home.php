<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php include "header.php";
  include "chart.php";
  session_start();
  if ($_SESSION['user_id'] == NULL) {
    header("location:index.php");
  }
  if ($_SESSION['login_user'] == "") {
      header("location:index.php");
  }

  $fn = $_SESSION['fn'];
  $img = $_SESSION['image'];
  $user_id = $_SESSION['user_id'];
  $org = $_SESSION['org'];
  $dep = $_SESSION['dep'];
  $dep2 = $_SESSION['dep2'];

  include "navbar.php";?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<style>

body {
font-family:'Prompt', sans-serif;
}
    .container{
      padding: 2px;
    }
    .ha {
      font-size: 10px;
    }
    .img{
      border-radius: 1%;
    }
    .btn-danger{
      border-radius: 10%;
    }
    .col-3{
      padding: 16px 20px ;
      background-color:  #F9F6F4;
      border-radius: 25px;
      margin: 40px;
    }

    table {
      font-family: 'Prompt', sans-serif;S
      border-collapse: collapse;
      width: 100%;
        color: black;

    }

    .table1{
        width: 25%;
        font-family: 'Prompt', sans-serif;
        border-collapse: collapse;
        text-align: right;
        background-color: #DDDDDD;
        margin-left: 390px;
        border-radius: 30px;

    }
    td, th {
      border: 9px;
      text-align: left;
      padding: ;
    }


    am{
      margin: : 20px;
    }
    tr:nth-child(even) {
      background-color: ;
    }
    .img{
      padding: 2px
    }
    .btn_vote{
      position:absolute;
      top:130px;
      left:110;
      display:none;
      z-index: 1;
    }
    .image_blur {
      filter: blur(8px) !important;
      -webkit-filter: blur(8px) !important;
    }
  </style>

    <?php

    include "function.php";
    $db = new db();
    $result = $db->select("*","event","event_name like '%".$_GET['txt_search']."%' AND (status_event='public' OR user_id='$user_id' OR organization_id='$org' OR department_id='$dep' OR department2_id='$dep2')AND event_type='2'");
    //print_r($result);
    ?>
  <div class="body" style="position:absolute; top:15%; left:13%;display: none"  id="body">

    <div class="container" id="body">
      <h3 style="color:#3d4c53;">รายการเลือกตั้ง</h3>

      <div class="row">
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
      ?>
        <div class="card col-3" id="card" onmouseover="setblurCard(<?php echo $row["event_id"]; ?>);" onmouseout="removeblurCard(<?php echo $row["event_id"]; ?>)" style="border-radius:5px;background:#ffffff;height:220px; width:1067px;">
          <label style="filter:blur(px);"><?php echo $row["event_name"]; ?></label>
          <hr style="margin: 1px;">
          <?php $sta = $row["status_event"];
          if($sta=="Public"){
              $sta = "#49915a";
          }
          else {
              $sta = "#da4d5a";
          } ?>
          <label style="background:<?php echo $sta; ?>; border-radius:3px; color:white; padding:0px 7px; position:absolute; right:10px; top:10px;" for=""><?php echo $row["status_event"]; ?></label>
          <?php
            $img = $row["image"];
            if ($img == "") {?>
              <img id="img_bg_vote_<?php echo $row["event_id"]; ?>" class="img_bg_vote" style="filter: blur(5px);border-radius:2px;position:absolute; left:5px; top:66px;width:272px; height:150px;object-fit:cover;" src="images/vote.png; ?>" alt="">

            <?php
            }
            else {?>
              <img id="img_bg_vote_<?php echo $row["event_id"]; ?>" class="img_bg_vote" style="filter: blur(0.7px);border-radius:2px;position:absolute; left:5px; top:66px;width:272px; height:150px;object-fit:cover;" src="images/<?php echo $row["image"]; ?>" alt="">
            <?php
            }
           ?>

          <a style="position:absolute; left:35.5%; color:white; background:#28a745;" id="btn_vote_<?php echo $row["event_id"]; ?>" href="datavote.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $user_id; ?>&date=<?php echo $row['date_time']; ?>" class="btn btn_vote">ลงคะแนน</a>

        </div>
      <?php
          }
      }else{
        echo "<h4>ไม่พบข้อมูล</h4>";
      }
      ?>
      </div>
    </div>

  </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <label class="form-control" style="width:100%">
        <?php echo $row["event_name"]; ?>
      </label>
      <a href="datavote.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-success">โหวต</a>

            <img style="border-radius:; margin-left:40px;" width="200px" height="200px" src="images/<?php echo $row["image"]; ?>" alt="">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <h5 class="modal-title">ข้อมูลการเลือกตั้ง</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo $event_id = $_GET["event_id"];
          $db = new db();
          $result = $db->select("*","event","status_event='public' OR user_id='$user_id'"); ?>
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<script type="text/javascript">
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [1, 2, 3, 4, 12];
var barColors = ["#264653", "#2a9d8f","#e9c46a","#f4a261","#e76f51"];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
</html>
