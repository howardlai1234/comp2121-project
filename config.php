<?php
$servername = "localhost";
$username = "admin";
$password = "comp2121";
$dbname = "fushiony";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
#echo "Connected successfully<br>";
?>