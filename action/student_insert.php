<?php

session_start();
// DATABASE CONNECTION 
require_once('database/db_conn.php');
// LIBRARY CONNECTION
include_once('src/phpqrcode/qrlib.php');


$query_lastID = 'SELECT * FROM 	registered_users ORDER BY UserID DESC LIMIT 1';
$result_lastID = mysqli_query($conn, $query_lastID) or die(mysqli_error($conn));
$totalID = 0;

// GETTING THE LAST ID BEFORE INSERTING THE NEW ID
while ($row = mysqli_fetch_assoc($result_lastID)) {
	$totalID = $row['UserID'];
}

// LAST ID PLUS 1 FOR THE INSERTED ID
$totalID = $totalID + 1;


if (isset($_POST['submit'])) {
	// CREATE VARIABLE TO CATCH THE DATA FROM THE FORM
	$idnumber = $_POST['IDnumber'];
	$fname = $_POST['firstname'];
	$mname = $_POST['middlename'];
	$lname = $_POST['lastname'];
	$mail = $_POST['email'];
	$course = $_POST['course'];
	$depart = $_POST['department'];
	// HASH THE PASSWORD USING ARGON2
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_ARGON2I);


		// IT WILL GENERATE YOUR QR CODE AFTER SIGNING UP 
		$path = 'qrcodes-images/';
		// $idnumber_encrypt = md5($_POST['IDnumber']) . md5($_POST['password']);
		$idnumber_encrypt = substr(md5($_POST['IDnumber']) . md5($_POST['password']), 0, 20);
		$qrIDText = "$idnumber" . "-" . "$idnumber_encrypt";

		$file = $path . $qrIDText . ".png";

		$text  = "$qrIDText";

		QRcode::png($text, $file, 'L', 7, 2);


	// RETRIEVE THE USERID FROM THIS TABLE FOR THE GIVEN SPECIFIC IDNUMBER
	$query = "SELECT * FROM tbl_student WHERE IDnumber = '$idnumber'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	//   CHECK IF THE GIVEN IDNUMBER EXISTS IN TBL_STUDENT
	if (!$row) {

        $_SESSION['validate'] = "unsuccessful";
        header("location: .?page=student_signup");
		exit(); // Stop further PHP execution

		exit;
	}

	// GETTING THE SPECIFIC ROW FROM THE TBL_STUDENT WHICH IS THE USER_ID AND INSERT TO TABLE REGISTERED_USERS
	$registered_id = $row['UserID'];
	$reg_fname = $row['firstname'];
	$reg_mname = $row['middlename'];
	$reg_lname = $row['lastname'];
	$mail = $row['email'];
	$year = $row['year'];
	$depart = $row['department'];
	$log_type = $row['type'];
	

	// CHECK THE USER THAT IS ALREADY EXISTED ON THE DATABASE FROM TABLE REGISTERED_USERS
	$checkUser = "SELECT * FROM registered_users WHERE IDnumber ='$idnumber'";
	$result = mysqli_query($conn, $checkUser);

	$count = mysqli_num_rows($result);
	if ($count > 0) {
		
		$_SESSION['validate'] = "existed";
        header("location: .?page=student_signup");
		exit(); // Stop further PHP execution

	} else {
			
		
				//INSERTING THE DATA TO THE TABLE REGISTERED_USERS 
				$sql = "INSERT INTO registered_users (Registered_ID, IDnumber, email, Firstname, Middlename, Lastname, password, year, Department, login_type, qrID)
			VALUES ('$registered_id ', '$idnumber', '$mail', '$reg_fname','$reg_mname','$reg_lname','$hash', '$year', '$depart', '$log_type', '$qrIDText')";
	
	}

	//CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_USERS
	if (mysqli_query($conn, $sql)) {

		$_SESSION['status'] = $qrIDText;
		$_SESSION['UserID'] = $totalID;


		header("Location: .?page=student_login");
		exit(); // Stop further PHP execution

	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}

?>
