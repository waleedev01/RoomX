<?php
include '../database_connection/connectDB.php';

$room_id = $conn->real_escape_string($_POST['join']);
$user_id = $conn->real_escape_string($_POST['id']);
$created_time = date('m/d/Y h:i:s a', time());
 
$query ='INSERT INTO RoomMembers (room_id,user_id, time_joined) VALUES (?,?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'iis',
    $room_id,
    $user_id,
    $created_time
);
/* Execute the statement */
$stmt->execute();
$row = $stmt->affected_rows;

if ($row > 0) {
    echo "<script language='javascript'>
                alert('Room joined');
                window.location.href = '../login/loggedInHomepage.php';
            </script>";
} else {
    echo "<script language='javascript'>
                alert('Error. Please retry');
                window.location.href = 'joinPrivateRoom.php';
            </script>";
}

?>
