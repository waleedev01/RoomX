<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../form.css">
  <title> Log in Page </title>
  <?php include '../headerHome.php';?>
</head>
<body>
<center>
  <h1 class="hTitle" style="
    padding-top: 80px;">
    Sign in to RoomX
  </h1>
</center>

<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active" style="font-size:16px; text-align:center; font-weight:900; margin:40px 8px 10px 8px"> Sign In </h2>
    <h2 class="underlineHover" style="font-size:16px; text-align:center; font-weight:600; margin:40px 8px 10px 8px"><a style="text-decoration:none; color:Black" href="../register/register.php"> Sign Up </a></h2>
    <!-- Login Form -->
    <form action="processLogin.php" method="post">
      <input type="text" id="login" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log In">

      <div id="formFooter">
        <input type="checkbox" checked="checked"> <a>Remember me</a>
      </div>
    </form>

  </div>
</div>

</body>
</html>
