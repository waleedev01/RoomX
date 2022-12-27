<?php

include '../database_connection/connectDB.php';
include '../session/session.php';
$query_id = "SELECT name FROM User WHERE email = '$email'";
$res_id = mysqli_query($conn, $query_id);
// store the results in $row variable
$row = mysqli_fetch_row($res_id);
?>
<!DOCTYPE html> 
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> 
            Homepage 
        </title>
        <style> 
            Body {
            font-family: Calibri, Helvetica, sans-serif;
            }

            button { 
                    background-color: blue; 
                    width: 50%;
                    color: white; 
                    padding: 15px; 
                    margin: 10px 0px; 
                    border: none; 
                    cursor: pointer; 
                    } 

            button:hover { 
                    opacity: 0.7; 
                } 

            
            
            .container { 
                    padding: 50px; 
                }   
        </style> 
    </head>  
    <body>  
        <?php echo "<center> <h1> Welcome $row[0]  </h1> </center> "; ?>
        <form> <center>
            <div class="container"> 
                <a href="../room/createRoom.php">Create Public Room</a> 
                <a href="../room/createPrivateRoom.php">Create Private Room</a> 
                <a href="../room/joinPrivateRoom.php">Join Private Room</a> 
                <a href="../room/joinPublicRoom.php">Join Public Room</a> 
                <a href="../chat/Openchat.php">Access Rooms that you joined</a> 
                <a href="../room/manageRoom.php">Manage Rooms that you created</a> 
            </div> 
        </form>   
    </body>   
</html>



 