<?php


require_once('php-excel-reader/excel_reader2.php');
require_once('SpreadsheetReader.php');

if (isset($_POST["import"]))
{

  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {

                $name = "";//ฟิว 1
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }//ฟิว 1

                $description = "";//ฟิว 2
                if(isset($Row[1])) {
                    $description = mysqli_real_escape_string($conn,$Row[1]);
                }//ฟิว 2

                $other = "";//ฟิว 3
                if(isset($Row[2])) {
                    $other = mysqli_real_escape_string($conn,$Row[2]);
                }//ฟิว 3





                if (!empty($name) ||
                    !empty($description) ||
                    !empty($other)) {
                     $name ;
                      $sql = "SELECT * FROM `user` WHERE `id_card`=$name";
                      $result = $conn->query($sql);
                   
                      $row = $result -> fetch_assoc();
                      echo $row["user_id"];


                    ?>
                    <br>
                    <?php
                    }
                }
}
  }
}

?>
