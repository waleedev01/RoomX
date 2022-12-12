<?php
include '../database_connection/connectDB.php';

$room_name = $conn->real_escape_string($_POST['name']);
$country = $conn->real_escape_string($_POST['country']);
$room_type = "public";
$created_time = date('m/d/Y h:i:s a', time());
$status = "open";
$user_id = $conn->real_escape_string($_POST['id']);

//inset user record
$query =
    'INSERT INTO Room (created_time,type,status,geo_area,user_id,name) VALUES (?,?,?,?,?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'ssssis',
    $created_time,
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
                window.location.href = 'createRoom.php';
              </script>";
}

?>
