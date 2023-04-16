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

    // VALLIDATE THE DATA - IF THE REGISTERED_ID AND OTP IS MATCH 
    $validate = "SELECT * FROM registered_idnumber WHERE UserID ='$userid' && OTP ='$code' && IDnumber = '$idnumber'";
    $result = mysqli_query($conn, $validate);

    // FETCH A ROW FROM THE RESULT SET OF THE SELECT QUERY AND STORE IT AS AN ASSOCIATIVE ARRAY
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    // EXECUTE A SELECT QUERY TO RETIEVE ALL ROWS FROM THE TABLE TBL_EMPLOYEE
    $sql = mysqli_query($conn, "SELECT * FROM tbl_employee");
    while ($getData = mysqli_fetch_array($sql)) 

    // IF STATEMENT IS EQUAL TO ONE 
    if ($count == 1) {
        //  STORE THE DATA IN THE SESSION
        $_SESSION['IDnumber'] = $idnumber;

        
        // WILL GO TO THIS FOLDER EMPLOYEE_SIGNUP
        $_SESSION['validate'] = "successful";
        header("location: .?page=employee_signup");
        exit(); // Stop further PHP execution


       
    } else {

        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=employee_otp");
        exit(); // Stop further PHP execution

    }

}
?>
