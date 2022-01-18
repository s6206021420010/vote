<?php
include "header.php";
include "conn.php";
include "navbar.php";
$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];
$applicant_id = $_GET['applicant_id'];
$sql ="SELECT user.number FROM `user` WHERE user_id='$user_id'";
$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();

?>

<form class="" action="checkphone.php" method="post" id="body" style="display:none;">
  <div class="container" style="position:fixed; top:12%; left:12%;">
      <div class="col-12">
        <div class="row">
        <div class="col-2">
          <p>กรอกเบอร์โทรศัพย์</p>
          <input type="text" name="user_id" value="<?php echo $user_id; ?>"hidden>
          <input type="text" name="event_id" value="<?php echo $event_id; ?>"hidden>
          <input type="text" name="applicant_id" value="<?php echo $applicant_id; ?>"hidden>
          <!-- <input type="text" name="number" value="<?php echo $row['number']; ?>"hidden> -->
        
        </div>
        <div class="col-3">
          <input type="text" name="number" value="" class="form-control" required>
        </div>
      </div>
    </div>
      <div class="col-2">
        <input type="submit" name="" value="Sent OTP" class="btn btn-success">
      </div>
  </div>
</form>
<?php include "jq.php"; ?>
