<?php
require_once 'Usuario.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Si us plau, completa tots els camps.';
        header("Location: error.php");
        exit();
    }
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $usuario = new Usuario(); 
    if ($usuario->agregarUsuario($username, $password)) {
        $_SESSION['usuario'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = 'L\'usuari ja existeix.';
        header("Location: error.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Accés no autoritzat.';
    header("Location: error.php");
    exit();
}
?>
