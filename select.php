<?php
$servername = "mysql-carlaaramirez.alwaysdata.net";
$username = "carlaaramirez_todoapp";
$password = "Danielcarla12345*";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom, cognoms FROM usuaris";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["nom"]. " " . $row["cognoms"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>