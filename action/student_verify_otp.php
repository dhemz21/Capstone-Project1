<?php

session_start();
// DATABASE CONNECTION
require_once('database/db_conn.php');


if (isset($_POST['submit'])) {

    $idnumber = $_POST['IDnumber'];
    $code = $_POST['otp'];

   
    // GETTING THE LAST REGISTERED_ID FROM TABLE REGISTERED_IDNUMBER
    $query = 'SELECT * FROM registered_idnumber ORDER BY UserID DESC LIMIT 1';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        $userid = $row['UserID'];
        $idnumber = $row['IDnumber'];
    }

    // VALLIDATE THE DATA - IF THE USERID AND OTP IS MATCH 
    $validate = "SELECT * FROM registered_idnumber WHERE UserID ='$userid' && OTP ='$code' && IDnumber = '$idnumber'";
    $result = mysqli_query($conn, $validate);

    // FETCH A ROW FROM THE RESULT SET OF THE SELECT QUERY AND STORE IT AS AN ASSOCIATIVE ARRAY
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    // EXECUTE A SELECT QUERY TO RETIEVE ALL ROWS FROM THE TABLE TBL_STUDENT
    $sql = mysqli_query($conn, "SELECT * FROM tbl_student");
    while ($getData = mysqli_fetch_array($sql)) 

    // IF STATEMENT IS EQUAL TO ONE 
    if ($count == 1) {
        $_SESSION['IDnumber'] = $idnumber;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['course'] = $course;
        $_SESSION['department'] = $depart;

        // WILL GO TO THIS FOLDER STUDENT_SIGNUP
        $_SESSION['validate'] = "successful";
        header("location: .?page=student_signup");

       
    } else {

        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=student_otp");
    }

}

?>
