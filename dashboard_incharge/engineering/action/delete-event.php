<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');
//  Get User ID
$userId = $_GET['userID'];

// Query
// SELECTING THE DATA FROM TABLE INCHARGE_ADD_EVENT
$query = "SELECT * FROM incharge_add_event WHERE userID = '$userId'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

// FILES FILE PATH
$doc_file = "../../src/private/files/" . $row['file'];

// DELETING THE IMAGE FILE FROM LOCAL STORAGE IF THE IMAGE FILE EXISTS
if (!empty($row['file'])) {
    if (file_exists($doc_file)) {
        unlink($doc_file);
    }
}

// DELETING THE DATA FROM TABLE ADD_POST
$query = "DELETE FROM incharge_add_event WHERE userID = '$userId'";
if(mysqli_query($conn,$query)){

    $_SESSION['validate'] = "delete";
    echo "<script>window.location.href='.?folder=pages/&page=registered-event&successrem=1';</script>"; 

}else{
    
    $_SESSION['validate'] = "error-delete";
    echo "<script>window.location.href='.?folder=pages/&page=registered-event&errorrem=1';</script>";
}
?>