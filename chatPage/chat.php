<?php 
include '../database_connection/connectDB.php';
if (!isset($_SESSION)) {
    session_start();
}

if( $_SESSION['loggedin'] == true ){
	$user_id = $_SESSION['user_id'];
	$query = "INSERT INTO `message` (`message_id`,`time_sent`,`message_body`,`file_key`,`Useruser_id`,'Roomroom_id') VALUES ('".$_POST['message_id']."','".time()."','".$_POST['message_body']."','".$_POST['file_key']."','".$_SESSION['user_id']."','".$_POST['room_id']."')";
	mysqli_query($conn, $query);
	$result = $conn->query($query);
}else{
	echo 'Not Authorized!';
}


$sql = sql_query("SELECT * FROM Room");
$output = "";

if(sql_rows($sql) == 0){
    $output .= "No rooms available"
}elseif(sql_rows($sql) > 0){
    while($row = sql_room($sql)){
        $output .= '<li class="clearfix">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
                        <div class="about">
                            <div class="name">'. $row['gName'] .'</div>
                         </div>
                    </li>';
    }
}
echo $output
?>