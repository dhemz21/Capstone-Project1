<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');

// POSTED DATA
$userID = $_POST['UserID'];
$fname = $_POST['Firstname'];
$lname = $_POST['Lastname'];
$password = $_POST['password'];


  // RETRIEVE THE HASHED PASSWORD FORM THE DATABASE FOR THE USER
  $query = "SELECT password FROM registered_users WHERE UserID = '$userID'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $hashed_password = $row['password'];


// UPDATING DATA FROM THE TABLE REGISTERED_USERS

  // VERIFY THE INPUT PASSWORD WITH THE HASHED PASSWORD FROM THE DATABASE
  if (password_verify($password, $hashed_password)) {
$update_query = "UPDATE registered_users SET Firstname='$fname', Lastname='$lname' WHERE UserID = '$userID'";

$update_result = mysqli_query($conn, $update_query);
if ($update_result) {

  // UPDATE SESSION VARIABLES
  $_SESSION['Firstname'] = $fname;
  $_SESSION['Lastname'] = $lname;

  $_SESSION['validate'] = "update";
  echo "<script>window.location.href='.?folder=pages/&page=employee-info&success=1&UserID=$userID';</script>";
} else{

  $_SESSION['validate'] = "error";
  echo "<script>window.location.href='.?folder=pages/&page=employee-info&error=1&UserID=$userID';</script>";

}

  }else {

    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=edit-employee&error=1&UserID=$userID';</script>";

  }

  


?>
