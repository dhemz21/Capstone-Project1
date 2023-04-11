<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
// Posted Data
$userid = $_POST['userid'];
$title = $_POST['title'];
$sub = $_POST['subject'];
$con = $_POST['conducted'];
$description = $_POST['description'];

// UPDATING DATA FROM THE TABLE POST
$query = "UPDATE incharge_history SET title='$title', subject = '$sub', conducted = '$con', description='$description' WHERE userid = '$userid'";

if(mysqli_query($conn, $query)){

   $_SESSION['validate'] = "update";
     echo "<script>window.location.href='.?folder=pages/&page=edit-pdf&success=1&userid=$userid';</script>";
 }else{
   $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-pdf&error=1&userid=$userid';</script>";
 }

//}
?>

