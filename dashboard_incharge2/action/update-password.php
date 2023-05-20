<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');

// POSTED DATA
$userID = $_POST['UserID'];

$userID = $_SESSION['UserID'];

// HASH THE PASSWORD USING ARGON2
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_ARGON2I);

// UPDATING DATA FROM THE TABLE INCHARGE
$query = "UPDATE registered_incharge SET password='$hash' WHERE UserID = '$userID' AND department='ENGINEERING' ";

if (mysqli_query($conn, $query)) {
    $_SESSION['validate'] = "update";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&success=1&UserID=$userID';</script>";
} else {
    $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&UserID=$userID';</script>";
}
?>
