<?php
   include("conn.php");

   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = $_POST['username'];
      $password = $conn->real_escape_string($_POST['password']);

      $sql = "SELECT * FROM user WHERE user_name = '{$username}' and user_pass = '{$password}'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
       if($count == 1){
         if ($row["status"]==2) {
           $_SESSION['image'] = $row['image'];
           $_SESSION['login_user'] = $username;
           $_SESSION['user_id'] = $row['user_id'];
           header("location:home_admin.php");
              }
         if($row["status"]==1) {
                $_SESSION['image'] = $row['image'];
                $_SESSION['login_user'] = $username;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['org'] = $row['organization_id'];
                $_SESSION['dep'] = $row['department_id'];
                $_SESSION['dep2'] = $row['department2_id'];
                $_SESSION['fn'] = $row['name'];
                 header("location: show.php?sweet='1'");
              }
          if($row["status"]==3) {
                 header("location: index.php?sweet=0");
               }
          if($row["status"]==4) {
                $_SESSION['image'] = $row['image'];
                $_SESSION['login_user'] = $username;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['org'] = $row['organization_id'];
                $_SESSION['dep'] = $row['department_id'];
                $_SESSION['dep2'] = $row['department2_id'];
                $_SESSION['fn'] = $row['name'];
                 header("location:home0.php");
                    }
       }
       else {
         header("location: index.php?sweet=1");
       }
   }
?>
