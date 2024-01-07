<?php

$servername = "mysql-danexpo.alwaysdata.net";
$username = "danexpo";
$password = "daniel_carla";
$dbname = "danexpo_475";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>