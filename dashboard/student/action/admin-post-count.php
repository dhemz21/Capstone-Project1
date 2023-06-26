
<?php

require_once('../../database/db_conn.php');

// Fetch the count of unread Admin posts from the database
$query = "SELECT COUNT(*) FROM incharge_add_event";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_fetch_row($result)[0];

// Return the count value as a string

?>
