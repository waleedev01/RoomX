<?php
include '../database_connection/connectDB.php';

$room_id = $conn->real_escape_string($_POST['roomId']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_login = md5($password);
$user_id = $conn->real_escape_string($_POST['id']);
$created_time = date('m/d/Y h:i:s a', time());

$query_room_id = "SELECT room_id FROM Room WHERE room_id = '$room_id'";
$res_room_id = mysqli_query($conn, $query_room_id);
$query = "SELECT room_id,password FROM Room WHERE room_id = '$room_id' AND password = '$hashed_login'";
// execute the query
$result = $conn->query($query);
// store the results in $row variable
$row = mysqli_fetch_row($result);
if (!isset($row[0]) || !isset($row[1])) {
    if (mysqli_num_rows($res_room_id) > 0) {
        //code  to check if the room exists
        echo "<script language='javascript'>
                        alert('Incorrect Password');
                        window.location.href = 'joinPrivateRoom.php';
                    </script>";
    } else {
        echo "<script language='javascript'>
                        alert('Please enter a valid room.');
                        window.location.href = 'joinPrivateRoom.php';
                    </script>";
    }
} else {
    
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
}
?>
