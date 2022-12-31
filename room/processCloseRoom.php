<?php
include '../database_connection/connectDB.php';

$room_id = $conn->real_escape_string($_POST['close']);
 
$query ="UPDATE Room SET status = 'closed' WHERE room_id = '$room_id'";
$result = $conn->query($query);

    echo "<script language='javascript'>
                alert('Room closed');
                window.location.href = 'manageRoom.php';
            </script>";

?>
