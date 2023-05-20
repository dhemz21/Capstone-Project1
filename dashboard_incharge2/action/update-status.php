<?php
// update_status.php
// DATABASE CONNECTION
require_once("../database/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the userID and newStatus values from the POST data
  $userID = $_POST['userID'];
  $newStatus = $_POST['status'];

  // Perform the database update based on the received values
  // Replace 'your_table_name' with the actual name of your table
  $sql = "UPDATE incharge_add_event SET eventStatus = '$newStatus' WHERE userID = '$userID'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // The database update was successful
    echo 'Status updated successfully';
  } else {
    // An error occurred during the database update
    echo 'Error updating status';
  }
} else {
  // Invalid request method
  echo 'Invalid request';
}
?>

?>
