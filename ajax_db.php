<?php include "conn.php"; ?>

<?php

  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM department WHERE organization_id ='$id'";
  	$query = mysqli_query($conn, $sql);
    echo '<option  value="" selected disabled>-กรุณาเลือก-</option>';
  	foreach ($query as $value) {
  		echo '<option  value="'.$value['department_id'].'">'.$value['department_name'].'</option>';

  	}
  }


if ($_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM department2 WHERE department_id='$id'";
    $query = mysqli_query($conn, $sql);
    echo '<option  value="" selected disabled>-กรุณาเลือก-</option>';
    foreach ($query as $value2) {
    echo '<option value="'.$value2['department2_id'].'">'.$value2['department2_name'].'</option>';
    }
    exit();
  }


?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
