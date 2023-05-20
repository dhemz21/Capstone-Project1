<?php
require_once('../database/db_conn.php');
// Fetch image file name from the database

$userID = $_SESSION['UserID'];
$query = "SELECT profile_picture FROM registered_incharge WHERE UserID = '$userID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$image = $row['profile_picture'];
?>