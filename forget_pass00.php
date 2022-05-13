<?php
include "conn.php";
 $ev_id = $_POST["ev_id"];
 $ev_n = $_POST["ev_n"];
 $ev_d = $_POST["ev_d"];
 $ev_ds = $_POST["ev_ds"];
 $ev_ts = $_POST["ev_ts"];
 $ev_de = $_POST["ev_de"];
 $ev_te = $_POST["ev_te"];

   $sql="UPDATE `event` SET `event_name`='$ev_n',`event_detail`='$ev_d',`date_start`='$ev_ds',`date_end`='$ev_de',`time_start`='$ev_ts',`time_end`=' $ev_te' WHERE `event_id`='$ev_id'";
  $result = mysqli_query($conn,$sql);
  echo "string";

 ?>
