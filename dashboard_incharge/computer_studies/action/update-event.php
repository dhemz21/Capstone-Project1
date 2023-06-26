<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');
// Posted Data
$userId = $_POST['userID'];
$event = $_POST['eventType'];
$tow = implode(', ', $_POST['towho']);
$fromw = $_POST['fromwho'];
$subject = $_POST['eventSubject'];
$venue = $_POST['venue'];
$date = $_POST['date'];
$agenda = $_POST['agenda'];

// UPDATING DATA FROM THE TABLE INCHARGE_ADD_POST
$query = "UPDATE incharge_add_event SET eventType='$event', towho='$tow', fromwho ='$fromw', eventSubject='$subject', venue ='$venue', date='$date', agenda='$agenda' WHERE userID = '$userId'";

if(mysqli_query($conn, $query)){

   $_SESSION['validate'] = "update";
     echo "<script>window.location.href='.?folder=pages/&page=edit-event&success=1&userID=$userId';</script>";
 }else{
   $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-event&error=1&userID=$userId';</script>";
 }

//}
?>

