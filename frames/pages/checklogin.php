<?php
ini_set('display_errors', "on");
ini_set('display_startup_errors', "on");
error_reporting(E_ALL);
//header('Content-type: text/plain; charset=utf-8');
session_start();
?>
<html>
<head>
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="../../style_body.css">
   <meta charset="utf-8">
</head>
  <body>
    <?php
      if(isset($_POST["submit"])){
         $data_missing = array();

         if (empty($_POST["username"])){
         $data_missing[] = "Username";
         } else {
           $username = trim($_POST["username"]);
         }

         if (empty($_POST["password"])){
           $data_missing[] = "Password";
         } else {
           $password = trim($_POST["password"]);
         }
         if(empty($data_missing)){
           require_once("mysqli_connect.php");
           $stmt = mysqli_stmt_init($dbc);
           if (mysqli_stmt_prepare($stmt,"SELECT password FROM users WHERE username = ?")){
              mysqli_stmt_bind_param($stmt, "s", $username);

              mysqli_stmt_execute($stmt);
              mysqli_stmt_bind_result($stmt, $pass);
              mysqli_stmt_fetch($stmt);

              if ($pass == $password){
                echo "user logged in";
                $_SESSION["user"] = $username;
                header("Location: ../body.php");
              } else {
                echo "wrong username or password";
              }
            }
        } else {
          ?>
            <div class = "errors">

              <style type="text/css">
                .errors{
                  background-color: #FF0000;
                  display: inline-block;
                  opacity: 0.4;
                  position: absolute;
                  left: 850px;
                }
              </style>
              <ul>
                <?php
                  foreach ($data_missing as $error) {
                    echo "<li class = 'errors_text'>$error</li>";
                  }
                ?>
              </ul>
            </div>
          <?php
      }
    }
   ?>
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
       <p class = "signup_head">Sign up</p>

       <p>Username:
         <input type="text" name ="username" size="30" value="" class = 'input' />
       </p>

       <p>Password:
         <input type="password" name ="password" size="30" value="" class = 'input' />
       </p>
<br>
       <p>
         <input type="submit" name = "submit" value = "Sign up" class = 'button_submit' class = 'input' />
       </p>
     </form>
   </div>
 </body>
</html>
