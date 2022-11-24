<?php
include '../database_connection/connectDB.php';
if (!isset($_SESSION)) {
    session_start();
}

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_login = md5($password);

$query_email = "SELECT email FROM User WHERE email = '$email'";
$res_email = mysqli_query($conn, $query_email);
$query = "SELECT email,password FROM User WHERE email = '$email' AND password = '$hashed_login'";
// execute the query
$result = $conn->query($query);
// store the results in $row variable
$row = mysqli_fetch_row($result);
echo $row;
if (!isset($row[0]) || !isset($row[1])) {
    if (mysqli_num_rows($res_email) > 0) {
        //code  to check if the email exists
        echo "<script language='javascript'>
                        alert('Incorrect Password');
                        window.location.href = 'login.html';
                    </script>";
    } else {
        echo "<script language='javascript'>
                        alert('Please enter valid credentials.');
                        window.location.href = 'login.html';
                    </script>";
    }
} else {
    $_SESSION['email'] = $email; //store session values
    $_SESSION['loggedin'] = true;
    $location = 'loggedInHomepage.php'; // If role is admin this will be admin.php, if receptionist this will be receptionist.php and more.
    header("location: $location");
}
?>
