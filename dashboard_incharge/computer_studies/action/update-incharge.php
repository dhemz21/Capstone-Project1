<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');
// Posted Data
$ID = $_POST['incharge_id'];
$idnumber = $_POST['IDnumber'];
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$depart = $_POST['department'];
$password = $_POST['password'];


  // Retrieve the hashed password from the database for the user
  $query = "SELECT password FROM registered_incharge WHERE incharge_id = '$ID'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $hashed_password = $row['password'];


// UPDATING DATA FROM THE TABLE INCHARGE
  // Verify the input password with the hashed password from the database
  if (password_verify($password, $hashed_password)) {
$update_query = "UPDATE registered_incharge SET IDnumber='$idnumber', firstname='$fname', middlename='$mname', lastname='$lname', email='$email', department='$depart' WHERE incharge_id='$ID'";

$update_result = mysqli_query($conn, $update_query);
if ($update_result) {
 
    // UPDATE SESSION VARIABLES
    $_SESSION['incharge_id'] = $ID;
    $_SESSION['firstname'] = $fname;
    $_SESSION['lastname'] = $lname;

  $_SESSION['validate'] = "update";
  echo "<script>window.location.href='.?folder=pages/&page=admin-info&success=1&incharge_id=$ID';</script>";
} else{

  $_SESSION['validate'] = "error";
  echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&incharge_id=$ID';</script>";

}

  }else {

    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&incharge_id=$ID';</script>";

  }

?>


