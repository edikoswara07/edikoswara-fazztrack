<?php
$servername = "localhost";
$username = "your username";
$password = "your password";
$database = "your database";

// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Info database : Connected successfully";

?>