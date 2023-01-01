<?php

include '../database_connection/connectDB.php';
include '../session/session.php';
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../form.css">
  <title> Create a Private Room </title>
  <?php include '../headerBack.php';?>
</head>
<body>
<center>
  <h1 class="hTitle" style="
    padding-top: 80px;">
    Create a Private Room
  </h1>
</center>

<div class="wrapperRoom">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active" style="font-size:16px; text-align:center; font-weight:900; margin:40px 8px 10px 8px"> Join Private </h2>

    <!-- Login Form -->
    <form action="processJoinPrivateRoom.php" method="post">
      <input type="text" id="name" name="roomId" placeholder="Room id" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="hidden" name="id" value= <?php echo $row[0]; ?> required>
      <input type="submit" value="Join">
    </form>

  </div>
</div>

</body>
</html>