<?php 
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


$developmentMode = false;
$mail = new PHPMailer($developmentMode);

$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                   // Enable SMTP authentication
$mail->Username = 'evsu.system23@gmail.com';          // SMTP username
$mail->Password = 'mjohnoudzsbaufxc'; // SMTP password
// $mail->Debug = 1;
// Enable TLS encryption, ssl also accepted

//$mail->addCC('kramcortes7@gmail.com');

//SENDING OTP CODE WITH THIS PRESET INFORMATION
$mail->SMTPSecure = 'tls';
$mail->Port = 587;                        // TCP port to connect t					
$mail->setFrom('evsu.system23@gmail.com', 'Evsu System');
$mail->From = 'evsu.system23@gmail.com';
$mail->FromName = 'EVSU SYSTEM';
$mail->addAddress('evsu.system23@gmail.com');   // Add a recipient
$mail->AddCC($email, $user);


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<!DOCTYPE html>";
$bodyContent .= "<html>";
$bodyContent .= "<head>";
$bodyContent .= "<meta charset='utf-8'>";
$bodyContent .= "</head>";
$bodyContent .= "<body>";
$bodyContent .= "<br>";
$bodyContent .= "<p>This is your One time password <span style='color: red'><b> $OTP_code </b> </span> </p>";
$bodyContent .= "<h4>For your protection, do not share this code with anyone</h4>";
$bodyContent .= "</body>";
$bodyContent .= "</html>";

$mail->Subject = 'OTP CODE';
$mail->Body    = $bodyContent;
$mail->AltBody = "This is the plain text version of the email content";

if (!$mail->send()) {
	header('location: ./employee_login.php');
}

