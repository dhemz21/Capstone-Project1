<?php
// DATABASE CONNECTION
require_once('../../database/db_conn.php');

// POSTED DATA
$ID = $_POST['incharge_id'];

$ID = $_SESSION['incharge_id'];

// HASH THE PASSWORD USING ARGON2
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_ARGON2I);

// UPDATING DATA FROM THE TABLE INCHARGE
$query = "UPDATE registered_incharge SET password='$hash' WHERE incharge_id = '$ID' AND department='ENGINEERING' ";

if (mysqli_query($conn, $query)) {
    $_SESSION['validate'] = "update";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&success=1&incharge_id=$ID';</script>";
} else {
    $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&incharge_id=$ID';</script>";
}
?>
