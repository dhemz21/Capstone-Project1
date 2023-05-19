<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');

// CHECK INTERNET CONNECTIVITY
$host = 'www.google.com';
$port = 80;
$timeout = 5;
$connected = @fsockopen($host, $port, $errno, $errstr, $timeout);
if (!$connected) {
    die('No internet connection, Please try again later!');
}

// READ DATA FROM JSON FILE
$data = json_decode(file_get_contents('scanned_data.json'), true);

// CHECK IF JSON FILE IS EMPTY
if (empty($data)) {
    die('No data to be synchronized!');
}

// INSERT DATA INTO DATABASE
$success_count = 0;
foreach ($data as $row) {
    $reg_id = $row['Registered_ID'];
    $event_id =$row['Event_ID'];
    $fname = $row['firstname'];
    $mname = $row['middlename'];
    $lname = $row['lastname'];
    $mail = $row['email'];
    $time = $row['time_in'];
    $type = $row['login_type'];
    $event = $row['eventType'];

    $sql = "INSERT INTO online_attendance (Registered_ID, Event_ID, firstname, middlename, lastname, email, time_in, login_type, eventType) VALUES ('$reg_id', $event_id, '$fname', '$mname', '$lname', '$mail',  '$time', '$type', '$event')";

    if (mysqli_query($conn, $sql)) {
        // Remove the data from the JSON file after successful insertion
        $data = array_filter($data, function ($item) use ($reg_id, $mail) {
            return ($item['Registered_ID'] !== $reg_id || $item['email'] !== $mail);
        });
        // file_put_contents('scanned_data.json', json_encode($data));
        // Write the empty array to the file
        file_put_contents('scanned_data.json', json_encode([]));

        $success_count++;
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
}

// CHECK IF ANY DATA WAS SYNCHRONIZED
if ($success_count > 0) {
    
    echo "Data synchronized successfully";

}
?>
