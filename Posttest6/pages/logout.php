<?php
    session_start();
    session_unset();
    session_destroy();
    // header("location: dashboard_login.php");
    header("location: ../index.php");
    exit();
?>
