<?php
include ("config.php");
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