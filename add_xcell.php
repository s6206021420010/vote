<?php
session_start();
$fn = $_SESSION['fn'];
$img = $_SESSION['image'];
$user_id = $_SESSION['user_id'];
include "navbar.php";
include "header.php"; ?>

<body>
</body>
  <html>

  <?php

  $event_id=$_GET["event_id"];
  $org=$_SESSION['org'];
  $dep=$_SESSION['dep'];
  $dep2=$_SESSION['dep2'];
  $sql = "SELECT event_id, event_name, event_detail, date_start, date_end, image, status_event FROM event";
  $result = mysqli_query($conn, $sql);
  ?>

  <div class="container" style="position:fixed;left:13%; top:13%;">
    <h2 style="color:#373737;">เพิ่มสมาชิก</h2>
    <i class=”fa fa-dashboard fa-2x”></i>
  <div class="row">
    <h4 style="color:#373737;">โหลดฟอร์มXcell</h4>
    <a href="https://drive.google.com/file/d/1vQd_nQ34PeNn0PBxtbC2EQETLAOB92Z5/view?usp=sharingป" class="btn btn-success" style="width:15%;">Download</a>
<br>
  </div>
      <form action="f_save.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                  <label >เลือกไฟล์ Xcell ที่เพิ่มข้อมูลแล้ว</label>
                      <input style="width:30%;"class="form-control" type="file" name="file"
                      id="file" accept=".xls,.xlsx">
                  <button style="margin-top:1%;"type="submit" id="submit" name="import"
                      class="btn btn-primary">Import</button>
                  </center>
          </form>

<!-- -------------------------- -->
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


<?php
$conn = mysqli_connect("localhost","root","","db_product");
   $sqlSelect = "SELECT * FROM user WHERE organization_id=$org and department_id=$dep and department2_id=$dep2 and status=3 or status=4
";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
   <center>
    <table class="table table-striped" style="position:absolute; margin-top:1%;width:90%;">
            <tr style="border-radius:5px;">
                <th>ชื่อ-นามสกุล</th>
                <th>บัตรประชาชน</th>
                <th>เบอร์โทร</th>
                <th>เพิ่ม</th>
                <th>ลบ</th>
            </tr>

<?php
    while ($row = mysqli_fetch_array($result)) {
?>
        <tr>
            <td><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['id_card']; ?></td>
            <td><?php  echo $row['number']; ?></td>
            <td><label class="switch" style="margin-left:30px;">
              <input style=""  id="<?php  echo $row['user_id']; ?>" onclick="check(<?php  echo $row['user_id']; ?>)" type="checkbox" <?php if ($row['status'] == 4) {
                echo "checked";
              } ?> >
              <span class="slider round"></span>
            </label></td>
            <td><a href="delete_xcell.php?user_id=<?php echo $row["user_id"]; ?>" style="color:#373737;">ลบ</a></td>

        </tr>

<?php
    }
?>

    </table></center>
<?php
}
else{
  echo "ว่าง";
}
?>

    </div>

<!-- modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:right;">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js">
 </script>
 <script type="text/javascript">
  function check(id){
    // alert(id)
      $.ajax({
         type:"GET",
         url:"ajax_user.php",
         data:{id:id},
         dataType:"html",
         success: function (html) {
           // alert(html)
         }
       })

  }
 </script>
</html>
