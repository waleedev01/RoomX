<?php
include '../database_connection/connectDB.php';

$room_id = $conn->real_escape_string($_POST['room_id']);


$query = "SELECT * FROM Room  WHERE room_id = '$room_id' and type = 'public' ";
$result = $conn->query($query);
if (mysqli_num_rows($result) > 0) {
 
 //inset user record
$query =
    'INSERT INTO RoomMembers VALUES (room_id , user_id, time_joined)' ;
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'sssss',
    $room_id
    $user_id,
    $time_joined,
    
);
    
} else{
     echo "<script language='javascript'>
                alert('No Room available. Please try again later');
              </script>";
    
}





?>