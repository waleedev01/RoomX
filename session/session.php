<?php
    session_start();
    $email = $_SESSION['email'];
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../login/login.html");
        exit;
    }
?>