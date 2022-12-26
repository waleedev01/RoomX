<?php

include '../database_connection/connectDB.php';
include '../session/session.php';

?>
<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Create private room </title>
<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
}

.container{
       text-align: center;
        margin: 10px 0px; 
        padding: 100px; 
}
    
 input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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
  
      </style> 
</head>  
<body>  
<form action="processCreatePrivateRoom.php" method = "post">
    <div class="container"> 
    <center> <h2> Create a Private room</h2> </center> <br><br>
      <input type="text"  name="name" placeholder="Room name" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="hidden" name="id" value= <?php echo $row[0] ?> required>

      <br>
      <input type="submit" value="Create">
    </form>
</form> 
    
    
</body>   
</html>