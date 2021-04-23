<?php
$hostname     = "localhost"; // Enter Your Host Name
$username     = "Presh";      // Enter Your Table username
$password     = "Legendpresh88!!";          // Enter Your Table Password
$databasename = "admin_panel"; // Enter Your database Name


$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

