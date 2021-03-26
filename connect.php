<?php
$servername = "localhost";
$dbname="route";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  $connection->set_charset("utf8");
}


?>