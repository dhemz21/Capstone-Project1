<?php

session_start();
// DATABASE CONNECTION
require_once('database/db_conn.php');

// GET THE POSTED PASSWORD AND ID NUMBER
$password = $_POST['password'];
$idnumber = $_POST['IDnumber'];

// CHECK IF THE ID NUMBER EXISTS IN THE REGISTERED_INCHARGE TABLE
$query = "SELECT COUNT(*) FROM registered_incharge WHERE IDnumber = '$idnumber' AND type = 'INCHARGE'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = $row[0];

if ($count == 0) {
    // ID NUMBER DOES NOT EXIST, SHOW ERROR
    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=incharge_reset&error=2';</script>";
} else {
    // ID NUMBER EXISTS, HASH THE PASSWORD AND UPDATE THE REGISTERED_INCHARGE TABLE
    $hash = password_hash($password, PASSWORD_ARGON2I);
    $query = "UPDATE registered_incharge SET password='$hash' WHERE IDnumber = '$idnumber' AND type = 'INCHARGE'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['validate'] = "successful";
        echo "<script>window.location.href='.?folder=pages/&page=incharge_login&success=1';</script>"; 
    } else {
        $_SESSION['validate'] = "error";
        echo "<script>window.location.href='.?folder=pages/&page=incharge_reset&error=1';</script>";
    }
}

?>
