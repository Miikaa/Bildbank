<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'bildbank');
   define('DB_PASSWORD', 'bildbank');
   define('DB_DATABASE', 'bildbank');
   define('DB_TABLE', 'login');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>