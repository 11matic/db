<?php
//header('Content-type: text/plain; charset=utf-8');
?>
<html>
  <head>
    <title>Add user</title>
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
      <form action = "http://localhost/matic/frames/pages/useradded.php" method="post">
        <p class = "signup_head">Sign up</p>

        <p>First Name:
          <input type="text" name ="first_name" size="30" value="" class = 'input' />
        </p>

        <p>Last Name:
          <input type="text" name ="last_name" size="30" value="" class = 'input' />
        </p>

        <p>Email:
          <input type="text" name ="email" size="30" value="" class = 'input' />
        </p>

        <p>Username:
          <input type="text" name ="username" size="30" value="" class = 'input' />
        </p>

        <p>Password:
          <input type="password" name ="password" size="30" value="" class = 'input' />
        </p>

        <p>Confirm password:
          <input type="password" name ="confirm_password" size="30" value="" class = 'input' />
        </p>

        <p>
          <input type="submit" name = "submit" value = "Sign up" class = 'button_submit' class = 'input' />
        </p>
      </form>
    </div>
  </body>
</html>
