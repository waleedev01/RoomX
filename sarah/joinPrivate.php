<?php
include '../database_connection/connectDB.php';

$room_id = $conn->real_escape_string($_POST['room_id']);
$password = $conn->real_escape_string($_POST['psw']);
$hashed_login = md5($password);


$query = "SELECT * FROM Room WHERE room_id = '$room_id' and password = '$hashed_login' ";
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
    
}else{
     echo "<script language='javascript'>
                alert('Wrong Room ID or Password. Please try again');
              </script>";
    
}



/* Execute the statement */
$stmt->execute();
$row = $stmt->affected_rows;

if ($row > 0) {
    echo "<script language='javascript'>
                alert('Account Created');
                window.location.href = '../index.html';
              </script>";
} else {
    echo "<script language='javascript'>
                alert('Error. Please retry');
                window.location.href = 'register.html';
              </script>";
}

?>