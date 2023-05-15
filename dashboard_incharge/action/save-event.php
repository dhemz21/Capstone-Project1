<?php
// Set the time limit to 300 seconds (5 minutes)
set_time_limit(200);

// DATABASE CONNECTION 
require_once('../database/db_conn.php');
include_once('pages/send-post-email.php');

// Posted Data
$type = $_POST['eventType'];
$to = $_POST['towho'];
$from = $_POST['fromwho'];
$subject = $_POST['eventSubject'];
$venue = $_POST['venue'];
$date = $_POST['date'];
$agenda = mysqli_real_escape_string($conn, $_POST['agenda']); // Escape apostrophes


// Get registered users
if (in_array("EMPLOYEE STUDENT GUEST", $to)) {
    // If "Select All" is chosen, retrieve all types
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE (login_type IN ('EMPLOYEE', 'STUDENT', 'GUEST') AND department='COMPUTER STUDIES') OR (login_type = 'GUEST' AND department = 'none')");
} elseif (in_array("STUDENT AND EMPLOYEE", $to)) {
    // If "STUDENT AND EMPLOYEE" is selected, retrieve both students and employees
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENT', 'EMPLOYEE') AND department='COMPUTER STUDIES'");

}elseif (in_array("STUDENT AND GUEST", $to)) {
    // If "STUDENT AND GUEST" is selected, retrieve both students and guests
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENT', 'GUEST') AND department='COMPUTER STUDIES' OR department='none'");

}elseif (in_array("EMPLOYEE AND GUEST", $to)) {
    // If "EMPLOYEE AND GUEST" is selected, retrieve both employee and guests
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('EMPLOYEE', 'GUEST')AND department='COMPUTER STUDIES' OR department='none'");

}elseif (in_array("GUEST", $to)) {
    // If "GUEST" is selected, retrieve guests
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('GUEST')");

}elseif (in_array("1ST YEAR", $to)) {
    // If "1ST YEAR" is selected, retrieve 1ST YEAR STUDENTS
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENTS') AND department='COMPUTER STUDIES' OR year='1st'");

}elseif (in_array("2ND YEAR", $to)) {
    // If "2ND YEAR" is selected, retrieve 2ND YEAR STUDENTS
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENTS') AND department='COMPUTER STUDIES' OR year='2nd'");

}elseif (in_array("3RD YEAR", $to)) {
    // If "3ND YEAR" is selected, retrieve 3RD YEAR STUDENTS
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENTS') AND department='COMPUTER STUDIES' OR year='3rd'");

}elseif (in_array("4TH YEAR", $to)) {
    // If "4TH YEAR" is selected, retrieve 4TH YEAR STUDENTS
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('STUDENTS') AND department='COMPUTER STUDIES' OR year='4th'");
}else {
    // Otherwise, retrieve the selected types only
    $query = mysqli_query($conn, "SELECT email FROM registered_users WHERE login_type IN ('" . implode("','", $to) . "') AND department='COMPUTER STUDIES'");
}
$emails = mysqli_fetch_all($query, MYSQLI_ASSOC);


// Check if a file was uploaded
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Check if the file size is larger than 10MB
    if ($file_size > 10000000) {
        $_SESSION['validate'] = "large";
        echo "<script>window.location.href='.?folder=pages/&page=add-event&error=1';</script>";
        exit();
    }

    // Allowed file types
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_extensions = array("pdf", "docx", "xls", "xlsx");

    // Check if the file type is not in the allowed types
    if (!in_array($file_ext, $allowed_extensions)) {
        $_SESSION['validate'] = "not-allowed";
        echo "<script>window.location.href='.?folder=pages/&page=add-event&error=1';</script>";
        exit();
    }

    // Generate a unique name for the file
    $file = md5(microtime()) . '.' . $file_ext;

    // Check if the files folder exists, if not create it
    if (!file_exists('files')) {
        mkdir('files', 0777, true);
    }

    // Move the file to the files folder
    move_uploaded_file($file_tmp, "files/".$file);
} else {
    // No file was uploaded
    $file = null;
}

// Query
// INSERTING THE DATA FROM TABLE INCHARGE_ADD_EVENT
$towho = implode(", ", $to);
$sql = mysqli_query($conn,"INSERT INTO incharge_add_event(eventType, towho, fromwho, eventSubject, venue, date, agenda, file) VALUES('$type', '$towho', '$from', '$subject', '$venue', '$date',  '$agenda', '$file')");


// Send email to all registered users
foreach ($emails as $email) {
    $mail->addAddress($email['email']);
    $mail->Subject = $type;
    $mail->Body    = "To: $towho\nFrom: $from\nSubject: $subject\nVenue: $venue\nDate: $date\n\n$agenda";
    if ($file) {
        $mail->addAttachment('files/'.$file);
    }
    $mail->send();
    $mail->clearAddresses();
}

$_SESSION['validate'] = "successful";
echo "<script>window.location.href='.?folder=pages/&page=registered-event&success=1';</script>";

?>


