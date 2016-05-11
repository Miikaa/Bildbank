<?php
   session_start();
   unset($_SESSION["user"]);
   
   header("Location: ../index.php");
   echo 'You have logged out.';
   die();

?>