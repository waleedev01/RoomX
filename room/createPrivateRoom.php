<?php

include '../database_connection/connectDB.php';
include '../session/session.php';

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../form.css">
  <title> Create a Private Room </title>
</head>
<body>
<center>
  <h1 class="hTitle">
    Create a Private Room
  </h1>
</center>

<div class="wrapperRoom">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="underlineHover" ><a style="text-decoration:none; color:Black" href="createRoom.php"> Create Public </a></h2>
    <h2 class="active"> Create Private </h2>

    <!-- Login Form -->
    <form action="processCreatePrivateRoom.php" method="post">
      <input type="text" id="name" name="name" placeholder="Room name" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="hidden" name="id" value= <?php echo $row[0] ?> required>
      <input type="submit" value="Create">
    </form>

  </div>
</div>

</body>
</html>