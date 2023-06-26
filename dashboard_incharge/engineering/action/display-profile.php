<?php
require_once('../../database/db_conn.php');
// Fetch image file name from the database

$ID = $_SESSION['incharge_id'];
$query = "SELECT profile_picture FROM registered_incharge WHERE incharge_id = '$ID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$image = $row['profile_picture'];
?>