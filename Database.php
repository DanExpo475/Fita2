<?php

class DatabaseManager {
    private $conn; 
    private const DB_HOST = 'mysql-carlaaramirez.alwaysdata.net';
    private const DB_USER = '333404';
    private const DB_PASSWORD = 'Danielcarla12345*';
    private const DB_NAME = 'carlaaramirez_todoapp';
    private const DB_CHARSET = 'utf8mb4';

    public function __construct() {
        $this->conn = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
        $this->conn->set_charset(self::DB_CHARSET);
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function addUser($nombre, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuaris (nom, passwd) VALUES ('$nombre', '$hashedPassword')";

        if ($this->conn->query($sql) === TRUE) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getUserPasswd($nombre) {
        $sql = "SELECT passwd FROM usuaris WHERE nom = '$nombre'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['passwd'];
        } else {
            return null; 
        }
    }

    public function getUserByUsername($nombre) {
        $sql = "SELECT * FROM usuaris WHERE nom = '$nombre'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM usuaris WHERE email = '$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }

    public function updatePassword($nombre, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE usuaris SET passwd = '$hashedPassword' WHERE nom = '$nombre'";

        return $this->conn->query($sql);
    }

    public function deleteUser($nombre) {
        $sql = "DELETE FROM usuaris WHERE nom = '$nombre'";

        return $this->conn->query($sql);
    }
}

?>
