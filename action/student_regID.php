<?php
session_start();
// DATABASE CONNECTION
require_once('database/db_conn.php');

if (isset($_POST['submit'])) {

    $idnumber = $_POST['IDnumber'];

    // RETRIEVE THE EMAIL ADDRESS FOR THE GIVEN SPECIFIC IDNUMBER
    $validate = "SELECT * FROM tbl_student WHERE IDnumber ='$idnumber'";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($row) {
    // GETTING THE SPECIFIC ROW FROM THE TBL_STUDENT WHICH IS THE USER_ID AND INSERT TO TABLE REGISTERED_IDNUMBER
     $reg_id = $row['UserID'];
     $email_ad = $row['email'];

    } else {
        echo "error";
    }


    // IF STATEMENT 
    if ($count == 1) {

        // IT WILL SEND RANDOM INTEGERS ONE-TIME PASSWORD 
        $OTP_code = random_int(111111, 999999);

        // GETTING THE USER INFORMATION BEFORE SENDING THE OTP CODE
        $data = $conn->query("SELECT * FROM tbl_student WHERE IDnumber = '$idnumber'");
        while ($current = $data->fetch_assoc()) {
            // GET THE SPECIFIC ROW FROM THE TABLE TBL_STUDENT
            $user = $current['firstname'];
            $email = $current['email'];
        }

        // THE DATA FROM TBL_STUDENT WILL STORE TO REGISTERED_IDNUMBER TABLE
        $sql = "INSERT INTO registered_idnumber (Registered_ID, IDnumber, email, OTP, login_type)VALUES ('$reg_id', '$idnumber', '$email_ad', '$OTP_code', 'STUDENT')";

        //IT WILL PROCESS AND AFTER IT SEND THE OTP 
        include 'pages/student_send_otp.php';

        // CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_IDNUMBER 
        if (mysqli_query($conn, $sql)) {
            // IT WILL GO TO THIS FOLDER
            header("location: .?folder=pages/&page=student_otp");
        } else {
            $_SESSION['validate'] = "unsuccessful";
        }
    } else {


        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=student_register");
    }
}

?>
