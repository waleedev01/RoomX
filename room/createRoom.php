<?php

include '../database_connection/connectDB.php';
include '../session/session.php';

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../form.css">
  <title> Create a Public Room </title>
  <?php include '../headerBack.php';?>
</head>
<body>
<center>
  <h1 class="hTitle" style="
    padding-top: 80px;">
    Create a Public Room
  </h1>
</center>

<div class="wrapperRoom">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Create Public </h2>
    <h2 class="underlineHover" ><a style="text-decoration:none; color:Black" href="createPrivateRoom.php"> Create Private </a></h2>
    <!-- Form -->
    <form action="processCreateRoom.php" method="post">
      <input type="text" id="name" name="name" placeholder="Room name" required>
      <input type="text" name="country" placeholder="Country" required>
      <input type="hidden" name="id" value= <?php echo $row[0] ?> required>
      <input type="submit" value="Create">
    </form>

  </div>
</div>

</body>
</html>