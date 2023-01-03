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
    'INSERT INTO Room (created_time, type,status,geo_area,user_id,name, password) VALUES (?,?,?,?,?,?,?)';
$stmt = $conn->prepare($query);
$stmt->bind_param(
    'ssssiss',
    $created_time,
    $room_type,
    $status,
    $country,
    $user_id,
    $room_name,
    $password
);
/* Execute the statement */
$stmt->execute();
$row = $stmt->affected_rows;

if ($row > 0) {
    $room_id_inserted= mysqli_insert_id($conn);
    $query ='INSERT INTO RoomMembers (room_id,user_id, time_joined) VALUES (?,?,?)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        'iis',
        $room_id_inserted,
        $user_id,
        $created_time
    );
    /* Execute the statement */
    $stmt->execute();
    $row = $stmt->affected_rows;
    if ($row > 0) {
        echo "<script language='javascript'>
                    alert('Room Created<br> Room id: $room_id_inserted');
                    window.location.href = '../login/loggedInHomepage.php';
                </script>";
    } else {
        echo "<script language='javascript'>
                    alert('Error. Please retry');
                    window.location.href = 'createPrivateRoom.php';
                </script>";
    }

} else {
    echo "<script language='javascript'>
                alert('Error. Please retry');
                window.location.href = 'createPrivateRoom.php';
              </script>";
}

?>
