<?php
session_start();

if(isset($_GET['page']) && $_GET['page'] == 'logout'){
    // unset the session variable
    unset($_SESSION['user']);
    // destroy the session data
    session_destroy();
    // clear any cached output
    ob_clean();
    // add a no-cache header
    header("Cache-Control: no-cache, must-revalidate");
    // redirect the user to the login page
    header("Location: ../../");
    exit;
}else{
    echo "ERROR";
}
?>

