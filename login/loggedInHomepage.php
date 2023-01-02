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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                <i class="far fa-comments"></i>
            </div>
            <h3>Create Public Room</h3>
            <p>
              Create a room that is open for the public. You can name the room and add a country!
            </p>
          </div>
          </a>
        </div>
        <!-- Column Two -->
        <div class="column">
        <a href="../room/createPrivateRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fas fa-lock"></i>
            </div>
            <h3>Create Private Room</h3>
            <p>
              Create a private room now! Private rooms require passwords to join.
            </p>
          </div>
          </a>
        </div>
        <!-- Column Three -->
        <div class="column">
        <a href="../room/joinPrivateRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fas fa-user-shield"></i>
            </div>
            <h3>Join Private Room</h3>
            <p>
              Click here to join a private room, you will need the room ID and password!
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
              <i class="fas fa-search-location"></i>
            </div>
            <h3>Join Public Room</h3>
            <p>
                Click here to join a public room. Public rooms are location based!
            </p>
          </div>
          </a>
        </div>
        <!-- Column Two -->
        <div class="column">
        <a href="../chat/openChat.php">
          <div class="card">

            <div class="icon">
              <i class="far fa-id-card"></i>
            </div>
            <h3>Access Rooms that you joined</h3>
            <p>
              Here you can access all the rooms you are apart of!
            </p>
          </div>
          </a>
        </div>
        <!-- Column Three -->
        <div class="column">
        <a href="../room/manageRoom.php">
          <div class="card">

            <div class="icon">
              <i class="fas fa-cog"></i>
            </div>
            <h3>Manage Rooms that you created</h3>
            <p>
              Manage rooms that you have created. You can close rooms you own or see their passwords.
            </p>
          </div>
          </a>
        </div>
      </div>
    </section>
    </body>
    </html>
</html>



 