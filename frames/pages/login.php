<?php
ini_set('display_errors', "on");
ini_set('display_startup_errors', "on");
error_reporting(E_ALL);
//header('Content-type: text/plain; charset=utf-8');
?>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../style_body.css">
    <meta charset="utf-8">
  </head>
  <body>
    <div id="menu" style>
    	<ul>
        <li><a href="../body.php" class="menu_text" id="button_home">home</a></li>
        <li><a class="menu_text" id="button_login" href="login.php">log in</a></li>
        <li><a class="menu_text" id="button_about" href="logout.php">log out</a></li>
        <li><a class="menu_text" id="button_register" href="adduser.php" target="BODY">sign up</a></li>
    	</ul>
    </div>
    <div class = 'form'>
      <form action = "http://localhost/matic/frames/pages/checklogin.php" method="post">
        <p class = "signup_head">Log in</p>

        <p>Username:
          <input type="text" name ="username" size="30" value="" class = 'input' />
        </p>

        <p>Password:
          <input type="password" name ="password" size="30" value="" class = 'input' />
        </p>
<br>
        <p>
          <input type="submit" name = "submit" value = "Log in" class = 'button_submit' class = 'input' />
        </p>
      </form>
    </div>
  </body>
</html>
