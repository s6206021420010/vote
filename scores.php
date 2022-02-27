<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
$sr = 1;
include "navbar.php";
include "header.php"; ?>
<style>
  #search {
    display: none;
  }

  #search2 {
    display: none;
  }
</style>

<html>

<head>
  <script src="./js/loader.js"></script>
</head>

<body>

  <?php

  $event_id = $_GET["event_id"];
  $org = $_SESSION['org'];
  $dep = $_SESSION['dep'];
  $dep2 = $_SESSION['dep2'];
  $sql = "SELECT event_id, event_name, event_detail, date_start, date_end, image, status_event FROM event";
  $result = mysqli_query($conn, $sql);

  ?>

  <div class="container" style="position:fixed;left:13%; top:13%;">
    <h4 style="color:#565656;">เพิ่มตัวเลือกการโหวต</h4>
    <a href="list.php?event_id=<?php echo $event_id ?>&&user_id=<?php echo $user_id ?>">

      <button type="button" style="
            background-color: #8378f7;
            border-width: 0px;
            padding: 10px 10px;
            color: white;
            width:18%;
            border-radius: 6px;
            margin-bottom:10px;
            "
          >รายชื่อผู้สมัคร</button>
    </a>

    <a href="add_xcell.php?event_id=<?php echo $event_id ?>&&user_id=<?php echo $user_id ?>">

      <button type="button" style="
            background-color: #8378f7;
            border-width: 0px;
            padding: 10px 10px;
            color: white;
            width:18%;
            border-radius: 6px;
            margin-bottom:10px;
            "
                  >รายชื่อผู้มีสิทธิ์เลือกตั้ง</button>
    </a>
    <button type="button" style="
          background-color: #8378f7;
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
 
                    ผลการเลือกตั้ง</button>
    </a>

    <div id="barchart_values" style="width: 900px; height: 300px;"></div>
    <?php
    $sql = "SELECT v.*, COUNT(v.applicant_id) as vote, a.applicant_name as aname, a.applicant_number as anumber FROM `vote` v
    LEFT JOIN applicant a ON v.applicant_id = a.applicant_id
    WHERE v.event_id = '$event_id'
    GROUP BY v.applicant_id;";
    $result1 = mysqli_query($conn, $sql);
    $cnt = 1;
    while ($row = mysqli_fetch_array($result1)) :
    ?>
      <div class="row">
        <div class="col">
          <?php echo 'ผู้ได้รับการเลือกตั้งลำดับที่ ' . $cnt . ' : ' . $row['aname'] . '    ' . $row['vote'] . ' คะแนน'; ?>
        </div>
      </div>

    <?php
      $cnt++;
    endwhile; ?>

    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['bar']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'จำนวนโหวต'],
          <?php
          $sql = "SELECT v.*, COUNT(v.applicant_id) as vote, a.applicant_name as aname, a.applicant_number as anumber FROM `vote` v
        LEFT JOIN applicant a ON v.applicant_id = a.applicant_id
        WHERE v.event_id = '$event_id'
        GROUP BY v.applicant_id;";
          $result1 = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result1)) {

            echo "['" . "หมายเลข " . $row['anumber'] . "  " . $row['aname'] . "'," . $row['vote'] . "],";
          }
          ?>
        ]);

        var options = {
          chart: {
            title: 'ผลโหลต',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_values'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <!-- <script type="text/javascript">
      google.load("visualization", "1", {
        packages: ["corechart"]
      });
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data_val = google.visualization.arrayToDataTable([

          ['Date', 'จำนวนโหวต'],
          <?php
          $sql = "SELECT v.*, COUNT(v.applicant_id) as vote,  a.applicant_name as aname FROM `vote` v
                      LEFT JOIN applicant a ON v.applicant_id = a.applicant_id
                      WHERE v.event_id = '$event_id'
                      GROUP BY v.applicant_id";
          $result1 = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result1)) {

            echo "['" . $row['aname'] . "'," . $row['vote'] . "],";
          }
          ?>

        ]);

        var options_val = {
          chart: {
            title: 'ผลโหวต',
          },
          bars: 'horizontal'
        };
        var chart_val = new google.visualization.ColumnChart(document.getElementById("barchart_values"));
        chart_val.draw(data_val, options_val);
      }
    </script> -->
</body>

</html>
>>>>>>> ac2a0a77e1129cd390505c2264f0155f2b8dd150
