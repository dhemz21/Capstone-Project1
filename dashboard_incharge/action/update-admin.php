<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
// Posted Data
$userID = $_POST['UserID'];
$user = $_POST['user'];
$password = $_POST['password'];


  // Retrieve the hashed password from the database for the user
  $query = "SELECT password FROM registered_incharge WHERE UserID = '$userID'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $hashed_password = $row['password'];


// UPDATING DATA FROM THE TABLE INCHARGE
  // Verify the input password with the hashed password from the database
  if (password_verify($password, $hashed_password)) {
$update_query = "UPDATE school_admin SET user='$user' ";

$update_result = mysqli_query($conn, $update_query);
if ($update_result) {
 
  // UPDATE SESSION VARIABLES
  $_SESSION['user'] = $user;
  $_SESSION['validate'] = "update";
  echo "<script>window.location.href='.?folder=pages/&page=admin-info&success=1&UserID=$userID';</script>";
} else{

  $_SESSION['validate'] = "error";
  echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&UserID=$userID';</script>";

}

  }else {

    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&UserID=$userID';</script>";

  }

?>


