<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
include "navbar.php";
include "header.php"; ?>


  <html>
  <head>
   <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
  <?php

  $event_id=$_GET["event_id"];
  $org=$_SESSION['org'];
  $dep=$_SESSION['dep'];
  $dep2=$_SESSION['dep2'];
  $sql = "SELECT event_id, event_name, event_detail, date_start, date_end, image, status_event FROM event";
  $result = mysqli_query($conn, $sql);
  ?>

  <div class="container" style="position:fixed;left:13%; top:13%;">
  <h4 style="color:#565656;">เพิ่มตัวเลือกการโหวต</h4>
  <a href="list.php?event_id=<?php echo $event_id?>&&user_id=<?php echo $user_id ?>" >

    <button type="button" style="
          background-color:#06b172;
          border-width: 0px;
          padding: 10px 10px;
          color: white;
          width:18%;
          border-radius: 6px;
          margin-bottom:10px;
          " >รายชื่อผู้สมัคร</button>
          </a>

                <a href="add_xcell.php?event_id=<?php echo $event_id?>&&user_id=<?php echo $user_id ?>" >
          
          <button type="button" style="
                    background-color:#FFD700;
                    border-width: 0px;
                    padding: 10px 10px;
                    color: white;
                    width:18%;
                    border-radius: 6px;
                    margin-bottom:10px;
                    " >รายชื่อผู้มีสิทธิ์เลือกตั้ง</button>
          </a>
          <button type="button" style="
                    background-color:#191970;
                    border-width: 0px;
                    padding: 10px 10px;
                    color: white;
                    width:18%;
                    border-radius: 6px;
                    margin-bottom:10px;
                    " >ผลการเลือกตั้ง</button>
          </a>
        <body>
            
            <div id="barchart_values" style="width: 900px; height: 300px;"></div>
        </body>
</html>

 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data_val = google.visualization.arrayToDataTable([

 ['Date', 'จำนวนโหวต'],
 <?php 
        $sql = "SELECT v.*, COUNT(v.applicant_id) as vote,  a.applicant_name as aname FROM `vote` v 
                            LEFT JOIN applicant a ON v.applicant_id = a.applicant_id
                            WHERE v.event_id = '$event_id'
                            GROUP BY v.applicant_id"; 
                $result1 = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($result1)){
           
            echo "['".$row['aname']."',".$row['vote']."],";
        }
         ?>
 
 ]);

 var options_val = {
 title: 'ผลโหวต'
 };
 var chart_val = new google.visualization.ColumnChart(document.getElementById("barchart_values"));
 chart_val.draw(data_val, options_val);
 }
 </script>