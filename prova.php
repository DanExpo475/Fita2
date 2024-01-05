<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
        <?php

    $servername = "mysql-carlaaramirez.alwaysdata.net";
    $username = "carlaaramirez_todoapp";
    $password = "Danielcarla12345*";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    // Taking all 5 values from the form data(input)
    $email = $_REQUEST['email'];
    $password = $_REQUEST['passwd'];

    
    // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO usuaris (email, passwd) VALUES ('$email', 
        '$password')";
    
    if(mysqli_query($conn, $sql)){
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>"; 

        echo nl2br("\n$email\n $password");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
    ?>
</body>

</html>
