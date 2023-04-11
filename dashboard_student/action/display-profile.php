<?php
require_once('../database/db_conn.php');

// FETCH IMAGE FILE NAME FROM THE DATABASE
$userid = $_SESSION['UserID'];

// append user ID to session key
$session_key = 'UserID_'.$userid.'_ProfilePicture';

$userID = $_SESSION['UserID'] ;
$query = "SELECT profile_picture FROM registered_users WHERE UserID = '$userID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && isset($row['profile_picture'])) {
  // store the profile picture filename with the user's ID as the session key
  $_SESSION[$session_key] = $row['profile_picture'];
  $image = $_SESSION[$session_key];
} else {
  // handle the error or set a default value
  $image = '../images/user.jpg';
}


?>