<?php
session_start();
// DATABASE CONNECTION
require_once('database/db_conn.php');

if (isset($_POST['submit'])) {

    $idnumber = $_POST['IDnumber'];

    // RETRIEVE THE EMAIL ADDRESS FOR THE GIVEN SPECIFIC EMAIL
    $validate = "SELECT * FROM registered_users WHERE IDnumber = '$idnumber'";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($row) {
    // GETTING THE SPECIFIC ROW FROM THE REGISTERED_USERS WHICH IS THE USER_ID AND INSERT TO TABLE RESET_PASSWORD_TOKEN
     $email_ad = $row['email'];

    //  STORE THE DATA IN THE SESSION
    $_SESSION['IDnumber'] = $idnumber;
       
    } else {
        echo "error";
    }

    // IF STATEMENT 
    if ($count == 1) {

        // IT WILL SEND RANDOM INTEGERS ONE-TIME PASSWORD 
        $OTP_code = random_int(111111, 999999);

        // GETTING THE USER INFORMATION BEFORE SENDING THE OTP CODE
        $data = $conn->query("SELECT * FROM registered_users WHERE IDnumber = '$idnumber'");
        while ($current = $data->fetch_assoc()) {
            // GET THE SPECIFIC ROW FROM THE TABLE REGISTERED USERS
            $user = $current['fname'];
            $email = $current['email'];
        }

        // THE DATA FROM TBL_STUDENT WILL STORE TO RESET_PASSWORD_TOKEN TABLE
        $sql = "INSERT INTO reset_password_token (IDnumber, email, OTP)VALUES ('$idnumber', '$email_ad', '$OTP_code')";

        //IT WILL PROCESS AND AFTER IT SEND THE OTP 
        include 'pages/student_send_otp_token.php';

        // CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_IDNUMBER 
        if (mysqli_query($conn, $sql)) {
            // IT WILL GO TO THIS FOLDER
            $_SESSION['validate'] = "successful";
            header("location: .?folder=pages/&page=student_token");
        } else {
            $_SESSION['validate'] = "unsuccessful";
        }
    } else {


        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=student_forgot");
    }
}
?>
