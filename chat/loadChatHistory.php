<?php
include '../database_connection/connectDB.php';

if (!isset($_POST['send']) && !isset($_POST['image']) ) {
    $room_id = $conn->real_escape_string($_POST['open']);
    $user_id = $conn->real_escape_string($_POST['id']);
}
else {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $room_id = $conn->real_escape_string($_POST['room_id']);
}

$query = "SELECT * FROM Message WHERE room_id ='$room_id'";
$result = mysqli_query($conn, $query);

while( $row = mysqli_fetch_assoc( $result)){
    $query_name = "SELECT name FROM User WHERE user_id = '$row[user_id]'";
    $res_name = mysqli_query($conn, $query_name);
    $name = mysqli_fetch_row($res_name);

    if($row['user_id'] != $user_id){
        if(isset($row['file_path']))
            echo "<div class='msgln'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'> ".$name[0]."</b></div> <div class='chat incoming'><div class='details'><a href=".$row['file_path']."><img style='max-width: 300;'alt=''src='".$row['file_path']."' ></a></div></div>";?>

        <?php if(!isset($row['file_path']))
            echo "<div class='msgln'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'> ".$name[0]."</b></div> <div class='chat incoming'><div class='details'><p>".$row['message_body']."</p></div></div>";}?>
    <?php
    if($row['user_id'] == $user_id){
        if(isset($row['file_path']))
            echo "<div class='msgln' style='margin-left:75%;'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'> ".$name[0]."</b></div> <div class='chat outgoing'><div class='details'><a href=".$row['file_path']."><img style='max-width: 300;'alt=''src='".$row['file_path']."' ></a></div></div>";?>

        <?php if(!isset($row['file_path']))
            echo "<div class='msgln' style='margin-left:75%;'><span class='chat-time'>".$row['time_sent']."</span> <b class='user-name'> ".$name[0]."</b></div> <div class='chat outgoing'><div class='details'><p>".$row['message_body']."</p></div></div>";}}?>

