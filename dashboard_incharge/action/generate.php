<?php
// Fetch data from your MySQL table
// Replace with your database connection and query
require_once('../database/db_conn.php');

// Retrieve the event_id from the URL parameter
$event_id = $_GET['userID'];
$query = "SELECT eventType, eventSubject, venue, date FROM incharge_add_event WHERE userID='$event_id'" ; // Replace 'id' with the name of your primary key column
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>