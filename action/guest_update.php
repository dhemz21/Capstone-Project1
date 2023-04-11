<?php

session_start();
// DATABASE CONNECTION
require_once('database/db_conn.php');

// GET THE POSTED PASSWORD AND EMAIL
$password = $_POST['password'];
$mail = $_POST['email'];

// CHECK IF THE ID NUMBER EXISTS IN THE REGISTERED_USERS TABLE
$query = "SELECT COUNT(*) FROM registered_users WHERE email = '$mail' AND login_type = 'GUEST'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = $row[0];

if ($count == 0) {
    // ID NUMBER DOES NOT EXIST, SHOW ERROR
    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=guest_reset&error=2';</script>";
} else {
    // ID NUMBER EXISTS, HASH THE PASSWORD AND UPDATE THE REGISTERED_USERS TABLE
    $hash = password_hash($password, PASSWORD_ARGON2I);
    $query = "UPDATE registered_users SET password='$hash' WHERE email = '$mail' AND login_type = 'GUEST'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['validate'] = "successful";
        echo "<script>window.location.href='.?folder=pages/&page=guest_login&success=1';</script>"; 
    } else {
        $_SESSION['validate'] = "error";
        echo "<script>window.location.href='.?folder=pages/&page=guest_reset&error=1';</script>";
    }
}

?>
