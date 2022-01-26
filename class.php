<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <div class="modal fade" id="myModal_correct" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="">
          <div style="margin-left:5%;">
            <style media="screen">
              .form-control {
                width: 95%;
              }
            </style>
            <?php
            $applicant_id = $row['applicant_id'];
            $sql = "SELECT * FROM `applicant` WHERE applicant_id = '{$applicant_id}' ";
            $result = mysqli_query($conn, $sql);
            print_r($row = $result->fetch_assoc());
            ?>
            <form class="form-group" action="correct_list.php" method="post">
              <label for="">ชื่อผู้สมัคร</label>
              <input type="text" name="list" class="form-control input-modal" placeholder="Your name.." value="<?php echo $row['applicant_name']; ?>" required>

              <label for="">หมายเลข</label>
              <input type="text" name="number" class="form-control" placeholder="Your number.." value="" required>
              <label for="">สุภาษิต</label>
              <input type="text" name="motto" class="form-control" placeholder="Your motto.." value="" required>
              <label for="">คำขวัญ</label>
              <input type="text" name="property" class="form-control" placeholder="Your image.." value="" required>
              <label for="">รูปภาพ</label>
              <input type="file" name="image" class="form-control" value="" required>
              <input type="submit" class="btn btn-success" style="width: 90%; align-items:center; margin-top: 5px; ">
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</body>

</html>