<?php
require_once('../../database/db_conn.php');

// FETCH IMAGE FILE NAME FROM THE DATABASE
$userid = $_SESSION['UserID'];

// APPEND THE USER ID SESSION KEY
$session_key = 'UserID_'.$userid.'_ProfilePicture';
$userID = $_SESSION['UserID'];
$query = "SELECT profile_picture FROM registered_users WHERE UserID = '$userID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && isset($row['profile_picture'])) {

  // STORE THE PROFILE PICTURE FILENAME WITH THE USERS ID AS THE SESION KEY
  $_SESSION[$session_key] = $row['profile_picture'];
  $image = $_SESSION[$session_key];
} else {
  
  // HANDE THE ERROR OR SET A DEAFAULT VALUE
  $image = '../../assets/images/user.jpg';
}


?>