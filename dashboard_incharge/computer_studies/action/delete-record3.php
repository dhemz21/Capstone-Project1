<?php
require_once('../../../database/db_conn.php');

// Set maximum execution time to 300 seconds (5 minutes)
ini_set('max_execution_time', 300);

// Delete all users from the table
$sql = "DELETE FROM online_attendance WHERE eventType='ACTIVITY'";
if ($conn->query($sql) === TRUE) {
//   echo "All users have been deleted successfully";
// echo"<script>alert('Record Deleted!');window.location.href='.?folder=pages/&page=attendance-event';</script>";
} else {
  echo "Error deleting users: " . $conn->error;
}



// Close the database connection
$conn->close();

?>



