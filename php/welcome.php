<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Välkommen </title>
   </head>
   
   <body>
      <h1>Välkommen <?php echo $login_session; ?></h1> 
      <h2><a href = "logoutpage.php">Logga ut</a></h2>
   </body>
   
</html>