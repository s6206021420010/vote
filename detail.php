<?php
  include "conn.php";
    $sql = "SELECT * FROM event WHERE event_id = '{$username}' and user_pass = '{$password}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


?>
