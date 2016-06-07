<?php
   session_start();
   unset($_SESSION["user"]);
   echo "you have logged out";
   header('Location: ../body.php');
?>
