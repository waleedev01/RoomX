<?php
    session_start();
    $email = $_SESSION['email'];
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../login/login.php");
        exit;
    }

    $query_id = "SELECT user_id FROM User WHERE email = '$email'";
    $res_id = mysqli_query($conn, $query_id);
    // store the results in $row variable
    $row = mysqli_fetch_row($res_id);
?>