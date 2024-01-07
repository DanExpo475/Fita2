<?php

$servername = "mysql-danexpo.alwaysdata.net";
$username = "danexpo";
$password = "daniel_carla";
$dbname = "danexpo_475";

session_start();


    echo $_POST["email"];
    echo $_POST["password"];
    echo $_POST["nombre"];
    echo $_POST["apellido"];

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuaris (nombre, apellido, email, alies, password)
    VALUES ( '" . $_POST["nombre"] ."', ' ". $_POST["apellido"] ."', '". $_POST["email"]. "','" . $_POST["password"] . "')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
$conn->close();
 

$_SESSION["actiu"]="ok";

// header('Location: ');

?>