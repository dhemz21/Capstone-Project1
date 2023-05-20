<?php

session_start();

// DATABASE CONNECTION
require_once('database/db_conn.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];

    // RETRIEVE THE EMAIL ADDRESS FOR THE GIVEN SPECIFIC EMAIL
    $validate = "SELECT * FROM tbl_guest WHERE email ='$email'";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

     if ($row) {
    // GETTING THE SPECIFIC ROW FROM THE TBL_GUEST WHICH IS THE USER_ID AND INSERT TO TABLE REGISTERED_IDNUMBER

    $reg_id = $row['UserID'];
    $email = $row['email'];

   } else {
       echo "error";
   }
    // IF STATEMENT 
    if ($count == 1) {

        // IT WILL SEND RANDOM INTEGERS ONE-TIME PASSWORD 
        $OTP_code = random_int(111111, 999999);

        // GETTING THE USER INFORMATION BEFORE SENDING THE OTP CODE
        $data = $conn->query("SELECT * FROM tbl_guest WHERE email = '$email'");
        while ($current = $data->fetch_assoc()) {
            // GET THE SPECIFIC ROW FROM THE TABL TBL_GUEST
            $user = $current['firstname'];
            $email = $current['email'];
        }

        // THE DATA FROM TBL_STUDENT WILL STORE TO REGISTERED_IDNUMBER TABLE
        $sql = "INSERT INTO registered_idnumber (Registered_ID, email, OTP, login_type)VALUES ('$reg_id', '$email', '$OTP_code', 'GUEST')";

        //IT WILL PROCESS AND AFTER IT SEND THE OTP 
        include 'pages/guest_send_otp.php';

        // CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_IDNUMBER 
        if (mysqli_query($conn, $sql)) {
            // IT WILL GO TO THIS FOLDER
            $_SESSION['validate'] = "successful";
            header("location: .?folder=pages/&page=guest_otp");
            exit(); // Stop further PHP execution

        } else {
            $_SESSION['validate'] = "unsuccessful";
        }
    } else {


        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=guest_verify");
        exit(); // Stop further PHP execution

    }
}

?>
