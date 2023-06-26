<?php

// DATABASE CONNECTION
require_once('../../database/db_conn.php');

// FUNCTION TO CHECK INTERNET CONNECTION
function check_internet_connection()
{
    $connected = @fsockopen("www.google.com", 80);
    if ($connected) {
        fclose($connected);
        return true;
    } else {
        return false;
    }
}

// GETTING THE INFORMATION OF THE QRID FROM THE TABLE
if (isset($_POST['text'])) {

    $event_id = $_POST['userID'];
    $qrID = $_POST['text'];
    $date = date("Y-m-d");
    $time = date("h:i A");

        // RETRIEVING THE USERID FROM THE INCHARGE_ADD_EVENT TABLE
        $eventQuery = "SELECT userID FROM incharge_add_event WHERE userID='$event_id'";
        $eventResult = mysqli_query($conn, $eventQuery);
        $eventRow = mysqli_fetch_assoc($eventResult);
        $event_id = $eventRow['userID'];

        $validate = "SELECT * FROM registered_users WHERE qrID = '$qrID' AND (Department = 'COMPUTER STUDIES' OR Department = 'none')";
        $result = mysqli_query($conn, $validate);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);


    if ($count == 1) {
        // GETTING THE ROW OF TABLE WHERE THE TABLE IS LOCATED ON registered_users
        $reg_id = $row['Registered_ID'];
        $fname = $row['Firstname'];
        $mname = $row['Middlename'];
        $lname = $row['Lastname'];
        $type = $row['login_type'];
        $mail = $row['email'];

        // CHECK IF USER ALREADY EXISTS IN THE DATABASE
        $checkUser = "SELECT * FROM online_attendance WHERE email='$mail' AND Event_ID='$event_id'";
        $result = mysqli_query($conn, $checkUser);
        $count = mysqli_num_rows($result);
        
        if($count > 0){
            $_SESSION['validate'] = "existed";
            echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>"; 
        } else {
            $scanned_data = array(
                'Registered_ID' => $reg_id,
                'Event_ID' => $event_id,
                'firstname' => $fname,
                'middlename' => $mname,
                'lastname' => $lname,
                'email' => $mail,
                'time_in' => $time,
                'login_type' => $type,
                'eventType' => 'ACTIVITY'
            );
            // CHECK INTERNET CONNECTION
            if (check_internet_connection()) {
                // INSERT THE DATA INTO THE online_attendance TABLE
                $sql = "INSERT INTO online_attendance (Registered_ID, Event_ID, firstname, middlename, lastname, email, time_in, login_type, eventType) VALUES ('$reg_id', '$event_id', '$fname', '$mname', '$lname', '$mail', '$time','$type', 'ACTIVITY')";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['validate'] = "successful";
                    echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>"; 
                } else {
                    echo "Error: " . $sql . "" . mysqli_error($conn);
                }
            } else {
    // IF THERE IS NO INTERNET CONNECTION, SAVE THE DATA TO A TEMPORARY JSON FILE
    $data = json_decode(file_get_contents('action/scanned_data.json'), true);

    if (is_array($data) && !empty($data)) {
        
        // CHECK IF DATA ALREADY EXISTS IN JSON FILE
        $already_saved = false;
        foreach ($data as $item) {
            if ($item['mail'] == $mail) {
                $already_saved = true;
                break;
            }
        }
        if ($already_saved) {
            $_SESSION['validate'] = "offline-existed";
            echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>"; 
        } else {
            $data[] = $scanned_data;
            $count = count($data);
            file_put_contents('action/scanned_data.json', json_encode($data));
            $_SESSION['validate'] = "offline-successful";
            echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>"; 
        }
    } else {
        $data = array($scanned_data);
        file_put_contents('action/scanned_data.json', json_encode($data));
        $_SESSION['validate'] = "offline-successful";
        echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>";
    }
}
        }
    } else {
        $_SESSION['validate'] = "unsuccessful";
        echo "<script>window.location.href='.?folder=pages/&page=event-scan3&userID=$event_id';</script>"; 
    }
    
}
?>
