<?php
$conn = mysqli_connect("localhost","root","","db_product");
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

                    $query = "insert into user
                              (name,id_card,number)
                              values('".$name."',
                                     '".$description."',
                                     '".$other."')";
                    $result = mysqli_query($conn, $query);



                    if (! empty($result)) {
                      $type = "success";
                      $message = "Excel Data Imported into the Database";
                      echo "<script>";
                      echo"alert('success Excel Data Imported into the Database');";
                      echo"window.location ='add_xcell.php';";
                      echo "</script>";


                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        echo "<script>";
                        echo"alert('error Problem in Importing Excel Data');";
                        echo"window.location ='add_xcell.php';";
                        echo "</script>";
                    }
                }
             }

         }
  }
  else
  {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        echo "<script>";
        echo"alert('error Invalid File Type. Upload Excel File.');";
        echo"window.location ='add_xcell.php';";
        echo "</script>";
  }
}
?>
