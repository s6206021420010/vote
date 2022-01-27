<?php
include "conn.php";
if (isset($_POST['org'])) {
  $org = $_POST['org'];
  $sql = "SELECT * FROM `department` WHERE organization_id = $org";
  $query = mysqli_query($conn, $sql);
  echo '<option value="" selected disabled>-กรุณาเลือกรายการย่อย1-</option>';
  foreach ($query as $value) {
  echo '<option value="'.$value['department_id'].'">'.$value['department_name'].'</option>';
  }
}
if (isset($_POST['dep'])) {
  $dep = $_POST['dep'];
  $sql = "SELECT * FROM `department2` WHERE department_id = $dep";
  $query = mysqli_query($conn, $sql);
  echo '<option value="" selected disabled>-กรุณาเลือกรายการย่อย2-</option>';
  foreach ($query as $value) {
  echo '<option value="'.$value['department2_id'].'">'.$value['department2_name'].'</option>';
  }
}
?>x
