<?php
// Fetch data from your MySQL table
// Replace with your database connection and query
require_once('../database/db_conn.php');

$query = "SELECT eventType, eventSubject, venue FROM incharge_add_event ORDER BY userID DESC"; // Replace 'id' with the name of your primary key column
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>