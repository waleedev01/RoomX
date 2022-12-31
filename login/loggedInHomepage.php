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
<title> 
            Homepage 
        </title>
      <?php include '../header.php';?>
    <section>
      <div class="row">
        <?php echo "<h1> Welcome '$row[0]'  </h1>"; ?>
      </div>
      <div class="row">
        <!-- Column One -->
        <div class="column">
        <a href="../room/createRoom.php">
          <div class="card">
            <div class="icon">
              <i class="fa-solid fa-user"></i>
            </div>
            <h3>Create Public Room</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
        <!-- Column Two -->
        <div class="column">
        <a href="../room/createPrivateRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3>Create Private Room</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
        <!-- Column Three -->
        <div class="column">
        <a href="../room/joinPrivateRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fa-solid fa-headset"></i>
            </div>
            <h3>Join Private Room</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <!-- Column One -->
        <div class="column">
          <a href="../room/joinPublicRoom.php">
          <div class="card">
            <div class="icon">
              <i class="fa-solid fa-user"></i>
            </div>
            <h3>Join Public Room</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
        <!-- Column Two -->
        <div class="column">
        <a href="../chat/openChat.php">
          <div class="card">

            <div class="icon">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3>Access Rooms that you joined</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
        <!-- Column Three -->
        <div class="column">
        <a href="../room/manageRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fa-solid fa-headset"></i>
            </div>
            <h3>Manage Rooms that you created</h3>
            <p>
              please write a description please write a description please write a description please write a description
            </p>
          </div>
          </a>
        </div>
      </div>
    </section>
    </body>
    </html>
</html>



 