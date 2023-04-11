<?php

session_start();

// DATABASE CONNECTION 
require('database/db_conn.php');

// LIBRARY CONNECTION
include_once('vendors/phpqrcode/qrlib.php');


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
	$username = $_POST['username'];
	$email = $_POST['email'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
		// HASH THE PASSWORD USING ARGON2
		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_ARGON2I);
	

	// RETRIEVE THE USERNAME FROM THIS TABLE FOR THE GIVEN SPECIFIC USERNAME
	$query = "SELECT * FROM tbl_guest WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	//   CHECK IF THE GIVEN IDNUMBER EXISTS IN TBL_GUEST
	if (!$row) {
		$_SESSION['validate'] = "unsuccessful";
        header("location: .?page=guest_signup");
		exit;
	}


	// GETTING THE SPECIFIC ROW FROM THE TBL_GUEST WHICH IS THE USER_ID AND INSERT TO TABLE REGISTERED_USERS
	$registered_id = $row['UserID'];
	$reg_fname = $row['firstname'];
	$reg_lname = $row['lastname'];
	$mail = $row['email'];

	// CHECK THE USER THAT IS ALREADY EXISTED ON THE DATABASE FROM TABLE REGISTERED_USERS
	$checkUser = "SELECT * FROM registered_users WHERE username ='$username' or email='$mail'";
	$result = mysqli_query($conn, $checkUser);

	$count = mysqli_num_rows($result);
	if ($count > 0) {

		$_SESSION['validate'] = "existed";
        header("location: .?page=guest_signup");

	} else {
				// IT WILL GENERATE YOUR QR CODE AFTER SIGNING UP 
				$path = 'qrcodes-images/';
				$username_encrypt = md5($_POST['username']) . md5($_POST['password']);
				$qrIDText = "$username" . "-" . "$username_encrypt";
		
				$file = $path . $qrIDText . ".png";
		
				$text  = "$qrIDText";
		
				QRcode::png($text, $file, 'L', 7, 2);
		
				//INSERTING THE DATA TO THE TABLE REGISTERED_USERS 
				$sql = "INSERT INTO registered_users (Registered_ID, IDnumber, email, username, Firstname, Lastname, password, qrID, Department, login_type)
			VALUES ('$registered_id ', 'none', '$mail', '$username','$reg_fname','$reg_lname','$hash','$qrIDText', 'none',  'GUEST')";
	
	}

	//CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_USERS
	if (mysqli_query($conn, $sql)) {

		$_SESSION['status'] = $qrIDText;
		$_SESSION['userID'] = $totalID;

		header("Location: .?page=guest_login");
	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}



	//close connection
	mysqli_close($conn);
}

?>
