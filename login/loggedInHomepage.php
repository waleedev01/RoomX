<?php

include '../database_connection/connectDB.php';
include '../session/session.php';

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
        <?php echo "<center> <h1> Welcome $email  </h1> </center> "; ?>
        <form> <center>
            <div class="container"> 
                <a href="../room/createRoom.php">Create Public Room</a> 
                <a href="../room/createPrivateRoom.php">Create Private Room</a> 

                <button type="text">Join Room</button>
                <button type="text">Access Open Chats</button>
                <button type="text">Access Open Rooms</button>
            </div> 
        </form>   
    </body>   
</html>



 