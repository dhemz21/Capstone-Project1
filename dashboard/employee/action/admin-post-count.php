
<?php

require_once('../../database/db_conn.php');

// FETCH THE COUNT OF UNREAD ADMIN POSTS FROM THE DATABASE
$query = "SELECT COUNT(*) FROM incharge_add_event";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_fetch_row($result)[0];

?>
