<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
 $user_id = $_SESSION['user_id'];
 include "header.php"; include "conn.php";  include "function.php"; include "navbar.php";

 if ($_SESSION['login_user'] == "") {
     header("location:index.php");
 }
?>
<head>

</head>
<body>

</body>

  <!DOCTYPE html>
  <html>
  <head>
  </head>

<?php
?>
  <div class="body" id="body" style="position:absolute; top:13%; left:13%;display: none">
    <div class="container">
      <div class="row">

          <h3 style="color:#3d4c53; margin-top:10px;   top: 0px; left: 0px; ;" >รายการเลือกตั้งที่สร้าง</h3>
          <am>
          </am>

        <div class="col-6" align="end" style="">
          <?php
          $sqls = "SELECT * FROM user WHERE user_id= $user_id  ";
          $results = mysqli_query($conn, $sqls);
          if ($results->num_rows > 0) {
              while($rows = $results->fetch_assoc()) {?>
                <div class="table1">

                </div>

        </div>
      </div>
    </div>
    <?php
    $db = new db();
    $sql1=  "SELECT * FROM `event`WHERE user_id=$user_id";
    $result = mysqli_query($conn, $sql1);

    ?>

    <meta charset="UTF-8">
    <div class="container">
      <div class="row">

    <?php

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

    ?>

    <div class="card col-3" style="background-color:#ffffff;margin-left:6%; margin-top:1%;width:1124px; height:380px;">
      <table>
          <a href="detail.php">
            <tr>
              <th style="top:10px; position:relative;"><?php echo $row["event_name"]; ?>
                <hr style="width:100%;  border:0px;">
              </th>
            </tr>
            <tr>
              <td><center><img style="border-radius:3px;color:white; margin-top:10px;object-fit:cover;width:250px; height:150px;" src="images/<?php echo $row["image"]; ?>"class="img"></center></td>
            </tr>
          </a>
          <tr>
            <td>
              <textarea class="form-control"style="width:100%; height:50px; margin-top:5px;" name="name" rows="8" cols="80" disabled><?php echo $row["event_detail"]; ?></textarea>
                <a href="list.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $row["user_id"]; ?>" class="btn btn-success" style="width: 49%; height:35px;margin-top:10px;">จัดการ</a>
                <a href="delete.php?event_id=<?php echo $row["event_id"]; ?>" class="btn btn-danger "style="border-radius: 5px; height:35px; width: 48%;  margin-top: 10px;">ลบ</a><br>
                <!-- <a href="show_evet.php?event_id=<?php echo $row["event_id"]; ?>" class="btn btn-primary "style="border-radius: 5px; height:35px; width: 100%;  margin-top: 10px;">ดูรายละเอียด</a><br> -->
            </td>
          </tr>
      </table>
    </div>
    <?php
        }
    }
    ?>
    <?php
        }
    }
    ?>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
  <script src="script.js"></script>
  </html>
</body>
</html>
