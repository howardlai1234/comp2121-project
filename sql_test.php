<?php
$servername = "localhost";
$username = "admin";
$password = "comp2121";
$dbname = "comp2121";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
$sql = "select * from productorigin";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo $row['locationID'];
echo "<br>";
echo $row['locationName'];
echo "<br>";
$row = mysqli_fetch_array($result);
echo $row['locationID'];
echo "<br>";
echo $row['locationName'];
echo "<br>";
echo "above are list of origin";


$data = "comp2121";
echo "plaintext";
echo $data;
echo "<br>";
$hashed = hash("sha256", $data); 
echo $hashed;
?>