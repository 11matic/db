<?php
ini_set('display_errors', "on");
ini_set('display_startup_errors', "on");
error_reporting(E_ALL);
//header('Content-type: text/plain; charset=utf-8');
?>
<html>
<head>
   <title>Add User</title>
   <link rel="stylesheet" type="text/css" href="../../style_body.css">
   <meta charset="utf-8">
</head>
  <body>
  <?php
    if(isset($_POST["submit"])){
       $data_missing = array();
       if (empty($_POST["first_name"])){
         $data_missing[] = "First Name";
       } else {
         $first_name = trim($_POST["first_name"]);
       }

       if (empty($_POST["last_name"])){
         $data_missing[] = "Last Name";
       } else {
         $last_name = trim($_POST["last_name"]);
       }

       if (empty($_POST["email"])){
         $data_missing[] = "Email";
       } else {
         $email = trim($_POST["email"]);
       }
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

       if ($_POST["confirm_password"] != $_POST["password"]){
         $data_missing[] = "Passwords don't match";
       }


       if (empty($data_missing)){
         require_once("mysqli_connect.php");
         $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES
         (?,?,?,?,?)";

         $stmt = mysqli_prepare($dbc,$query);

         mysqli_stmt_bind_param($stmt, "sssss", $first_name,
         $last_name,$email,$username,$password);

         mysqli_stmt_execute($stmt);
         $affected_rows = mysqli_stmt_affected_rows($stmt);
         echo $affected_rows;
         if($affected_rows == 1){
             echo"User entered";

             mysqli_stmt_close($stmt);
             mysqli_close($dbc);
             echo '<script type="text/javascript">alert("You have succesfully signed in!")</script>';
             header("Location: ../body.php");

         } else {
             echo "error<br />";

             echo mysqli_error($dbc);
             mysqli_stmt_close($stmt);
             mysqli_close($dbc);

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
