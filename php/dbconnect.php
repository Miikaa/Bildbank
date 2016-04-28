<?php
$servername = "bildbank";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("You goofed up: " . mysqli_connect_error());
}
echo "Wel done";
?>