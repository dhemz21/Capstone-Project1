<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');

// POSTED DATA
$userID = $_POST['UserID'];

// HASH THE PASSWORD USING ARGON2
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_ARGON2I);

// UPDATING DATA FROM THE TABLE REGISTERED_USERS
$userID = $_SESSION['UserID'] ;
$query = "UPDATE registered_users SET password='$hash' WHERE UserID = '$userID'";

if (mysqli_query($conn, $query)) {
    $_SESSION['validate'] = "update";
    echo "<script>window.location.href='.?folder=pages/&page=edit-student&success=1&UserID=$userID';</script>";
} else {
    $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-student&error=1&UserID=$userID';</script>";
}
?>
