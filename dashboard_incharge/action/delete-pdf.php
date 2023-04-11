<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
//  Get User ID
$userid = $_GET['userid'];

// Query
// SELECTING THE DATA FROM TABLE ADMIN_PDF
$query = "SELECT * FROM incharge_history WHERE userid = '$userid'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

// PDF FILE PATH
$pdf_file = "uploads/" . $row['pdf_file'];

// DELETING THE IMAGE FILE FROM LOCAL STORAGE IF THE IMAGE FILE EXISTS
if (!empty($row['pdf_file'])) {
    if (file_exists($pdf_file)) {
        unlink($pdf_file);
    }
}

// DELETING THE DATA FROM TABLE ADMIN_PDF
$query = "DELETE FROM incharge_history WHERE userid = '$userid'";
if(mysqli_query($conn,$query)){

    $_SESSION['validate'] = "delete";
    echo "<script>window.location.href='.?folder=pages/&page=pdf-event&successrem=1';</script>"; 

}else{
    
    $_SESSION['validate'] = "error-delete";
    echo "<script>window.location.href='.?folder=pages/&page=pdf-event&errorrem=1';</script>";
}
?>
