<?php
session_start();

if(isset($_POST['submit'])){

    // DATABASE CONNECTION
    include_once('database/db_conn.php');

    // POSTED INFORMATION
    $idnumber = $_POST['IDnumber'];
    $password = $_POST['password'];

    // MYSQLI QUERY
    // PREPARE A STATEMENT TO SELECT THE DATA FROM THE REGISTERED_INCHARGE TABLE
    $stmt = $conn->prepare("SELECT * FROM registered_incharge WHERE IDnumber=?");

    // BIND THE PARAMETER "s" TO THE VARIABLE $idnumber
    // "s" INDICATES THAT THE PARAMETER IS A STRING
    $stmt->bind_param("s", $idnumber);
    // EXECUTE THE PREPARED STATEMENT
    $stmt->execute();
    // GET THE RESULT OF THE EXECUTED STATEMENT
    $result = $stmt->get_result();

    // CHECK IF THE QUERY RETURNED ANY ROWS
    if($result->num_rows >= 1){
        // IF THERE ARE ONE OR MORE ROWS RETURNED, ENTER THE WHILE LOOP
        while($getData = $result->fetch_array()){

            // Check if the password is correct
            if (password_verify($password, $getData['password'])) {
                // generate new session ID for the user
                session_regenerate_id();
                // ASSIGN THE VALUES OF EACH COLUMN IN THE RETURNED ROW TO DIFFERENT SESSION VARIABLES
                $_SESSION['UserID'] = $getData['UserID'];
                $_SESSION['IDnumber'] = $getData['IDnumber'];
                $_SESSION['firstname'] = $getData['firstname'];
                $_SESSION['lastname'] = $getData['lastname'];
                $_SESSION['email'] = $getData['email'];
                $_SESSION['department'] = $getData['department'];
                $_SESSION['type'] = $getData['type'];
                
                // Get the department of the user
                $department = $getData['department'];
                if($department == "COMPUTER STUDIES"){
                 // Redirect to Computer Studies dashboard
                    header("location: dashboard_incharge/");
                }elseif($department == "ENGINEERING"){
                    // Redirect to Engineering dashboard
                    header("location: dashboard_incharge2/");
                }
                exit(); // Stop further PHP execution
            } else {
                $_SESSION['validate'] = "unsuccessful";
                header("location: .?page=incharge_login");
                exit(); // Stop further PHP execution
            }      
        }
    }else{
        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=incharge_login");
        exit(); // Stop further PHP execution
    }
}

?>
