<?php
$servername = "mysql.comp.polyu.edu.hk";
$username = "<your sutudentID>";
$password = "<password provided by comp>";
$dbname = "<your sutudentID>";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
#uncomment the next line to test it
#echo "Connected successfully<br>";
?>