<?php

class DatabaseManager {
    private $conn; 
    private const DB_HOST = 'localhost';
    private const DB_USER = 'usuario_db';
    private const DB_PASSWORD = 'contraseña_db';
    private const DB_NAME = 'nombre_db';
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

    public function addUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$hashedPassword')";

        if ($this->conn->query($sql) === TRUE) {
            return true; 
        } else {
            return false; 
        }
    }
    public function getUserPasswd($username) {
        $sql = "SELECT password FROM usuarios WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['password'];
        } else {
            return null; 
        }
    }
    public function getUserByUsername($username) {
        
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }
    public function updatePassword($username, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET password = '$hashedPassword' WHERE username = '$username'";

        return $this->conn->query($sql);
    }
    public function deleteUser($username) {
        $sql = "DELETE FROM usuarios WHERE username = '$username'";

        return $this->conn->query($sql);
    }
}

?>
