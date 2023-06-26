<?php
session_start();

if(isset($_GET['page']) && $_GET['page'] == 'logout'){

    // UNSET THE SESION VARIABLE
    unset($_SESSION['UserID']);

    // DESTROY THE SESSION DATA
    session_destroy();

    // CLEAR ANY CACHED OUPUT
    ob_clean();

    // ADD A NO-CACHE HEADER
    header("Cache-Control: no-cache, must-revalidate");

    // REDIRECT THE USER TO THE LOGIN PAGE
    header("Location: ../../../");
    exit;
}else{
    echo "ERROR";
}
?>

