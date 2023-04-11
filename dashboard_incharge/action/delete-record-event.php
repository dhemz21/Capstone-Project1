<?php
require_once('../../database/db_conn.php');

// Set maximum execution time to 300 seconds (5 minutes)
ini_set('max_execution_time', 300);

// Delete all events from the table
$sql = "SELECT * FROM admin_add_event";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

while($row = mysqli_fetch_assoc($result)) {
    // IMAGES FILE PATH
    $img_file = "images/" . $row['image'];
    echo "Image file path: $img_file<br>";

    // DELETING THE IMAGE FILE FROM LOCAL STORAGE IF THE IMAGE FILE EXISTS
    if (!empty($row['image'])) {
        if (file_exists($img_file)) {
            echo "Deleting image file: $img_file<br>";
            if (unlink($img_file)) {
                echo "Image file deleted successfully<br>";
            } else {
                echo "Error deleting image file: " . error_get_last()['message'] . "<br>";
            }
        } else {
            echo "Image file does not exist<br>";
        }
    }
}

// Delete all events from the table
$sql = "DELETE FROM admin_add_event";
if ($conn->query($sql) === TRUE) {
    echo "All events deleted successfully";
} else {
  echo "Error deleting events: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
