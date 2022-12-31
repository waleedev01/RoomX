<?php
include '../database_connection/connectDB.php';
if (isset($_POST['leave'])){
$room_id = $conn->real_escape_string($_POST['leave']);
$user_id = $conn->real_escape_string($_POST['id']);

$query ="DELETE FROM RoomMembers WHERE room_id='$room_id' AND user_id='$user_id'";
$result = $conn->query($query);

    echo "<script language='javascript'>
                alert('You left the room');
                window.location.href = 'openChat.php';
            </script>";
}
else{
    if (!isset($_POST['send'])) {
        $room_id = $conn->real_escape_string($_POST['open']);
        $user_id = $conn->real_escape_string($_POST['id']);
    }
    else{
        $user_id = $conn->real_escape_string($_POST['user_id']);
        $room_id = $conn->real_escape_string($_POST['room_id']);
    }
    $query = "SELECT * FROM Message WHERE user_id= '$user_id' and room_id ='$room_id'";
    $result = mysqli_query($conn, $query);
    
    $query_name = "SELECT name FROM User WHERE user_id = '$user_id'";
    $res_name = mysqli_query($conn, $query_name);
    // store the results in $row variable
    $name = mysqli_fetch_row($res_name);
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Chat</title>
            <meta name="description" content="Tuts+ Chat Application" />
            <link rel="stylesheet" href="style.css" />
        </head>
        
        <body>
            <div id="wrapper">
                <div id="menu">
                    <p class="welcome">Welcome, <?php echo $name[0] ?><b></b></p>
                    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                </div>
    
                <div id="chatbox">            
                    <?php             while( $row = mysqli_fetch_assoc( $result)){
    echo "<div class='msgln'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'>".$name[0]."</b>".$row['message_body']."<br></div>";}?></div>
                <form action="" method="Post">
                <input type="text"  name="message" placeholder="input message" required>
                    <?php echo "<input type='hidden' name='room_id' value='" . $room_id . "'>";?>
                    <?php echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";?>
                    <td><input type='submit' name='send' value='Send'></td>
                </form>
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
                // jQuery Document 
                $(document).ready(function () {});
            </script>
        </body>
    </html>
    
    <?php
    if (isset($_POST['send'])) {
        $user = $conn->real_escape_string($_POST['user_id']);
        $room = $conn->real_escape_string($_POST['room_id']);
        $message = $conn->real_escape_string($_POST['message']);
        $created_time = date('m/d/Y h:i:s a', time());
    
            //insert message record
        $query =
        'INSERT INTO Message (message_body,room_id,user_id,time_sent) VALUES (?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param(
        'siis',
        $message,
        $room,
        $user,
        $created_time
        );
        /* Execute the statement */
        $stmt->execute();
        $row = $stmt->affected_rows;
    
        if ($row > 0) {
            echo '';        }
        else{
            echo "<script language='javascript'>
                            alert('Error. Please retry');
                            window.location.href = 'createPrivateRoom.php';
                        </script>";
            }
    }
    
}


?>
