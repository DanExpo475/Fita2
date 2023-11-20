<?php
require_once 'Usuario.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Por favor, completa todos los campos.';
        header("Location: error.php");
        exit();
    }

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $userManager = new Usuario(); 
    
    if ($userManager->esContrasenaValida($username, $password)) {
        $_SESSION['usuario'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = 'Nombre de usuario o contraseña incorrectos.';
        header("Location: error.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Acceso no autorizado.';
    header("Location: error.php");
    exit();
}
?>
