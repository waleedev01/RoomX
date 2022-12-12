<?php
include '../database_connection/connectDB.php';

$room_name = $conn->real_escape_string($_POST['name']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_psw = md5($password);
$room_type = "private";
$created_time = date('m/d/Y h:i:s a', time());
$status = "open";
$user_id = $conn->real_escape_string($_POST['id']);

//inset user record
$query =
    'INSERT INTO Room (created_time,password, type,status,geo_area,user_id,name) VALUES (?,?,?,?,?,?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'sssssis',
    $created_time,
    $hashed_psw,
    $room_type,
    $status,
    $country,
    $user_id,
    $room_name
);
/* Execute the statement */
$stmt->execute();
$row = $stmt->affected_rows;

if ($row > 0) {
    echo "<script language='javascript'>
                alert('Room Created');
                window.location.href = '../login/loggedInHomepage.php';
              </script>";
} else {
    echo "<script language='javascript'>
                alert('Error. Please retry');
                window.location.href = 'createPrivateRoom.php';
              </script>";
}

?>
