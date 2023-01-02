<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../form.css">
  <title> Register Page </title>
  <?php include '../headerHome.php';?>
</head>
<body>
<center>
  <h1 class="hTitle" style="
    padding-top: 80px;">
    Join RoomX today
  </h1>
</center>

<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="inactive underlineHover" style="font-size:16px; text-align:center; font-weight:600; margin:40px 8px 10px 8px"><a style="text-decoration:none; color:Black" href="../login/login.php"> Sign In </a></h2>
    <h2 class="active" style="font-size:16px; text-align:center; font-weight:900; margin:40px 8px 10px 8px">Sign Up </h2>

    <!-- Login Form -->
    <form action="processRegister.php" method="post">
      <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
      <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
      <input type="text" id="telephone" name="telephone" placeholder="Telephone" required>
      <input type="text" id="email" name="email" placeholder="Email" required>
      <input type="Password" id="psw" name="psw" placeholder="Password" required>
      <input type="submit" class="signupbtn" value="Register">

      <div id="formFooter">
        <input type="checkbox" checked="checked"> <a>Remember me</a>
      </div>
    </form>

  </div>
</div>

</body>
</html>
