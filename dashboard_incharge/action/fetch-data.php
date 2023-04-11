<?php

// DATABASE CONNECTION
require_once('../database/db_conn.php');

// Retrieve data from incharge_add_event table
$sql = "SELECT title, venue, subject FROM incharge_add_event";
$result = $conn->query($sql);

$data = array();

// Add retrieved data to array
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

// Output data in JSON format
echo json_encode($data);

?>