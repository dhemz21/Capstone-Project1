<?php

session_start();

// DATABASE CONNECTION 
require('database/db_conn.php');

$query_lastID = 'SELECT * FROM 	registered_incharge ORDER BY incharge_id DESC LIMIT 1';
$result_lastID = mysqli_query($conn, $query_lastID) or die(mysqli_error($conn));
$totalID = 0;

// GETTING THE LAST ID BEFORE INSERTING THE NEW ID
while ($row = mysqli_fetch_assoc($result_lastID)) {
	$totalID = $row['incharge_id'];
}

// LAST ID PLUS 1 FOR THE INSERTED ID
$totalID = $totalID + 1;

if (isset($_POST['submit'])) {
	// CREATE VARIABLE TO CATCH THE DATA FROM THE FORM
	$idnumber = $_POST['IDnumber'];
	// HASH THE PASSWORD USING ARGON2
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_ARGON2I);
	
	// RETRIEVE THE IDNUMBER FROM THIS TABLE FOR THE GIVEN SPECIFIC IDNUMBER
	$query = "SELECT * FROM tbl_incharge WHERE IDnumber = '$idnumber'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	//   CHECK IF THE GIVEN IDNUMBER EXISTS IN TBL_INCHARGE
	if (!$row) {
		$_SESSION['validate'] = "unsuccessful";
        header("location: .?page=incharge_signup");
		exit;
	}

	// GETTING THE SPECIFIC ROW FROM THE TBL_INCHARGE WHICH IS THE USER_ID AND INSERT TO TABLE REGISTERED_INCHARGE
	$registered_id = $row['UserID'];
	$idnumber = $row['IDnumber'];
	$fname = $row['firstname'];
	$mname = $row['middlename'];
	$lname = $row['lastname'];
    $email = $row['email'];
	$depart = $row['department'];

	// CHECK THE USER THAT IS ALREADY EXISTED ON THE DATABASE FROM TABLE REGISTERED_INCHARGE
	$checkUser = "SELECT * FROM registered_incharge WHERE IDnumber ='$idnumber' or email='$email'";
	$result = mysqli_query($conn, $checkUser);

	$count = mysqli_num_rows($result);
	if ($count > 0) {

		$_SESSION['validate'] = "existed";
        header("location: .?page=incharge_signup");
		exit(); // Stop further PHP execution


	} else {

		//INSERTING THE DATA TO THE TABLE REGISTERED_INCHARGE
		$sql = "INSERT INTO registered_incharge (Registered_ID, IDnumber, firstname, middlename, lastname, email, department, password, type)
		VALUES ('$registered_id ', '$idnumber', '$fname', '$mname', '$lname', '$email','$depart','$hash', 'INCHARGE')";
	
	}

	//CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_INCHARGE
	if (mysqli_query($conn, $sql)) {

        $_SESSION['validate'] = "inserted";
		header("Location: .?page=incharge_login");
		exit(); // Stop further PHP execution

	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}

?>
