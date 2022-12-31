<?php
include '../database_connection/connectDB.php';

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['psw']);
$hashed_login = md5($password);
$first_name = $conn->real_escape_string($_POST['firstname']);
$last_name = $conn->real_escape_string($_POST['lastname']);
$telephone = $conn->real_escape_string($_POST['telephone']);

$query = "SELECT email FROM User where email = '$email'";
$result = $conn->query($query);
if (mysqli_num_rows($result) > 0) {
    //check if the user already exists
    echo "<script language='javascript'>
                alert('Email is already in the database');
                window.location.href = 'register.html';

            </script>";
}

//inset user record
$query =
    'INSERT INTO User (name,surname,email,password,telephone) VALUES (?,?,?,?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'sssss',
    $first_name,
    $last_name,
    $email,
    $hashed_login,
    $telephone
);
/* Execute the statement */
$stmt->execute();
$row = $stmt->affected_rows;

if ($row > 0) {
    echo "<script language='javascript'>
                alert('Account Created');
                window.location.href = '../login/login.html';
              </script>";
} else {
    echo "<script language='javascript'>
                alert('Error. Please retry');
                window.location.href = 'register.html';
              </script>";
}

?>
