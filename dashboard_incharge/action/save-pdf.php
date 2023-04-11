<?php
// DATABASE CONNECTION 
require('../database/db_conn.php');

// Posted Data
// POS
$title = $_POST['title'];
$sub = $_POST['subject'];
$con = $_POST['conducted'];
$date = date("Y-m-d");
$description = $_POST['description'];


// FILE UPLOAD
$file = $_FILES['pdf_file'];
$fileName = $_FILES['pdf_file']['name'];
$fileTmpName = $_FILES['pdf_file']['tmp_name'];
$fileSize = $_FILES['pdf_file']['size'];
$fileError = $_FILES['pdf_file']['error'];
$fileType = $_FILES['pdf_file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('pdf');

if (in_array($fileActualExt, $allowed)) {
  if ($fileError === 0) {
     // Check for file size
    if ($fileSize < 9000000) {
    // Generate unique name
      $fileNameNew = uniqid('', true).".".$fileActualExt;
     // Destination folder
      $fileDestination = 'uploads/'.$fileNameNew;
     // Move file to destination
      move_uploaded_file($fileTmpName, $fileDestination);

      // Query
      // INSERTING THE DATA FROM TABLE ADD_POST
      $sql = mysqli_query($conn,"INSERT INTO incharge_history(title, subject, conducted, date, description, pdf_file, pdf_file_name) VALUES('$title', '$sub', '$con', '$date', '$description', '$fileNameNew', '$fileName')");

      if($sql){
        $_SESSION['validate'] = "successful";
        echo "<script>window.location.href='.?/&page=pdf-event&success=1';</script>";
      }
      else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      $_SESSION['validate'] = "large";
      echo "<script>window.location.href='.?folder=pages/&page=add-pdf&error=1';</script>";
    }
  } else {
     $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=add-pdf&error=1';</script>";

  }
} 

mysqli_close($conn);

?>
