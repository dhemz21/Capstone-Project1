<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
// Posted Data
$userId = $_POST['userID'];
$title = $_POST['title'];
$tow = $_POST['towho'];
$fromw = $_POST['fromwho'];
$subject = $_POST['subject'];
$venue = $_POST['venue'];
$description = $_POST['description'];

// UPDATING DATA FROM THE TABLE INCHARGE_ADD_POST
$query = "UPDATE incharge_add_event SET title='$title', towho='$tow', fromwho = '$fromw', subject = '$subject', venue = '$venue', description='$description' WHERE userID = '$userId'";

if(mysqli_query($conn, $query)){

   $_SESSION['validate'] = "update";
     echo "<script>window.location.href='.?folder=pages/&page=edit-event&success=1&userID=$userId';</script>";
 }else{
   $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-event&error=1&userID=$userId';</script>";
 }

//}
?>

