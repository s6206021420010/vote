<?php
    session_start();
?>
<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php

 $fn = $_SESSION['fn'];
 $img = $_SESSION['image'];
 $user_id = $_SESSION["user_id"];
 include "header.php"; include "conn.php";  include "function.php"; include "navbar.php";

 if (empty($_SESSION['login_user'])) {
     header("location:index.php");
 }
?>
<head>

</head>
<body>
<style>
.btn-for{
  background: #8378f7 ;
  color: white;
}
.btn-far{
  background: #D6D2FE ;
  color: white;
}

.btn-for:hover{
  background:  white ;
  color: #8378f7;
}
.btn-far:hover{
  background:white;
  color:  #D6D2FE ;
}


</style>
</body>

  <!DOCTYPE html>
  <html>
  <head>
  </head>

<?php
$txt = $_POST['txt_search'];
?>
  <div class="body" id="body" style="position:absolute; top:13%; left:13%;display: none">
  <h3 class="ml-3">รายการเลือกตั้งที่สร้าง</h3>
    <?php
   
    $sql1=  "SELECT * FROM `event`WHERE user_id=$user_id AND event_name LIKE '$txt%' ";
    $result = mysqli_query($conn, $sql1);
    ?>
    <meta charset="UTF-8">
    <div class="container">
    <div class="row">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
        <div class="card overflow-hidden h-75 m-1 mt-2 ml-5 p-2" style="width:230px;">
          <div class="row">
              <div class="col">
                <?php echo $row["event_name"]; ?>
              </div>
          </div>
          <div class="row">
              <?php if($row["status_event"]=="Public"){?>
                <div class="col w-75 bg-success rounded text-light" >
                <?php echo $row["status_event"]; ?>
                </div>
              <?php }
                    else{?>
                <div class="col w-75 bg-danger rounded text-light" >
                <?php echo $row["status_event"]; ?>               </div>
                   <?php } ?>
             
              
          </div>
          <div class="row">
            <div class="col d-flex justify-content-center">
              <img src="images/<?php echo $row["image"]; ?> " style="width:200px; height:175px; object-fit:cover;"class="rounded mb-1 mt-1 ">
            </div>
          </div>
          <div class="row">
            <div class="col">
            <textarea class="form-control h-100" name="name" disabled><?php echo $row["event_detail"]; ?></textarea>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col d-flex justify-content-between aling-items-center">
                  <a href="list.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $row["user_id"]; ?>" class="btn btn-for w-100">จัดการ</a>
                  <a href="delete.php?event_id=<?php echo $row["event_id"]; ?>" class="btn btn-far ml-2 w-100"    >ลบ</a>      
            </div>
          </div>
        </div>

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
