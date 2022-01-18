<?php
 include "header.php";
session_start();
 $fn = $_SESSION['fn'];
 $img = $_SESSION['image'];
 $user_id = $_SESSION['user_id'];
 $org = $_SESSION['org'];
 $dep = $_SESSION['dep'];
 $dep2 = $_SESSION['dep2'];
 include "navbar0.php";
 ?>
 <style media="screen">
.container {
    display: flex;
    margin-top:5%;
}

.container__sidebar {
    width: 30%;
}

.container__main {
    /* Take the remaining width */
    flex: 1;

    /* Make it scrollable */
    overflow: auto;
}
 </style>

 <!-- Main -->
 <main class="container__main">
  <?php include "function.php";
   $db = new db();
   $result = $db->select("*","event","event_name like '%".$_GET['txt_search']."%' AND (status_event='public' OR user_id='$user_id' OR organization_id='$org' OR department_id='$dep' OR department2_id='$dep2')AND event_type='2'");
   ?>
 <div class="body" style="position:absolute; top:15%; left:13%;display: none"  id="body">

   <div class="container" id="body">
     <h3 style="color:#3d4c53;">รายการเลือกตั้ง</h3>

     <div class="row">
     <?php
     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
     ?>
       <div class="card col-3" id="card" onmouseover="setblurCard(<?php echo $row["event_id"]; ?>);" onmouseout="removeblurCard(<?php echo $row["event_id"]; ?>)" style="border-radius:5px;background:#ffffff;height:220px; width:1067px;">
         <label style="filter:blur(px);"><?php echo $row["event_name"]; ?></label>
         <hr style="margin: 1px;">
         <?php $sta = $row["status_event"];
         if($sta=="Public"){
             $sta = "#49915a";
         }
         else {
             $sta = "#da4d5a";
         } ?>
         <label style="background:<?php echo $sta; ?>; border-radius:3px; color:white; padding:0px 7px; position:absolute; right:10px; top:10px;" for=""><?php echo $row["status_event"]; ?></label>
         <?php
           $img = $row["image"];
           if ($img == "") {?>
             <img id="img_bg_vote_<?php echo $row["event_id"]; ?>" class="img_bg_vote" style="filter: blur(5px);border-radius:2px;position:absolute; left:5px; top:66px;width:272px; height:150px;object-fit:cover;" src="images/vote.png; ?>" alt="">

           <?php
           }
           else {?>
             <img id="img_bg_vote_<?php echo $row["event_id"]; ?>" class="img_bg_vote" style="filter: blur(0.7px);border-radius:2px;position:absolute; left:5px; top:66px;width:272px; height:150px;object-fit:cover;" src="images/<?php echo $row["image"]; ?>" alt="">
           <?php
           }
          ?>

         <a style="position:absolute; left:35.5%; color:white; background:#28a745;" id="btn_vote_<?php echo $row["event_id"]; ?>" href="datavote.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $user_id; ?>&date=<?php echo $row['date_time']; ?>" class="btn btn_vote">ลงคะแนน</a>

       </div>
     <?php
         }
     }else{
       echo "<h4>ไม่พบข้อมูล</h4>";
     }
     ?>
     </div>
   </div>

 </div>

 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <label class="form-control" style="width:100%">
       <?php echo $row["event_name"]; ?>
     </label>
     <a href="datavote.php?event_id=<?php echo $row["event_id"]; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-success">โหวต</a>

           <img style="border-radius:; margin-left:40px;" width="200px" height="200px" src="images/<?php echo $row["image"]; ?>" alt="">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header" >
         <h5 class="modal-title">ข้อมูลการเลือกตั้ง</h5>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <?php
         echo $event_id = $_GET["event_id"];
         $db = new db();
         $result = $db->select("*","event","status_event='public' OR user_id='$user_id'"); ?>
         <p>Some text in the modal.</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>
<script type="text/javascript">
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [1, 2, 3, 4, 12];
var barColors = ["#264653", "#2a9d8f","#e9c46a","#f4a261","#e76f51"];

new Chart("myChart", {
 type: "doughnut",
 data: {
   labels: xValues,
   datasets: [{
     backgroundColor: barColors,
     data: yValues
   }]
 },
 options: {
   title: {
     display: true,
     text: "World Wide Wine Production 2018"
   }
 }
});
</script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="script.js"></script>
 </main>
