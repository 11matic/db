<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style_body.css">
	</head>
	<body>
		<div id="menu" style>
			<ul>
				<li><a href="body.php" class="menu_text" id="button_home">home</a></li>
				<li><a class="menu_text" id="button_login" href="pages/login.php">log in</a></li>
				<li><a class="menu_text" id="button_about" href="pages/logout.php">log out</a></li>
				<li><a class="menu_text" id="button_register" href="pages/adduser.php" target="BODY">sign up</a></li>
			</ul>
		</div>
		<div id="logo">
			<img id="logo_img" src="../images/Logo.png" height="80px" width="250px" align="middle">
		</div>
		<p id="under_text">matic t</p>
		<p id="under_text"><?php echo $_SESSION["user"]; ?></p>
	</body>
</html>
