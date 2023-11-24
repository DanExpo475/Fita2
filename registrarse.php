<?php
require_once 'database.php';

// Comprueba si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inicia la sesión si aún no se ha iniciado
    session_start();

    // Crea una instancia de la clase DatabaseManager
    $dbManager = new DatabaseManager();

    // Obtiene los datos del formulario
    $nombre = $_POST['nom'];
    $apellido = $_POST['cognom'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $repeatedPassword = $_POST['repeatedPassword'];

    // Validaciones adicionales si es necesario

    // Agrega el usuario si la contraseña coincide
    if ($password === $repeatedPassword) {
        // Agrega el usuario a la base de datos
        if ($dbManager->addUser($nombre, $password)) {
            // Usuario agregado correctamente
            $_SESSION['mensaje'] = '¡Usuario registrado con éxito!';
            header("Location: dashboard.php"); // Redirige a la página de inicio de sesión o dashboard
            exit();
        } else {
            // Error al agregar el usuario
            $_SESSION['error'] = 'Error al registrar el usuario.';
            header("Location: error.php");
            exit();
        }
    } else {
        // Las contraseñas no coinciden
        $_SESSION['error'] = 'Las contraseñas no coinciden.';
        header("Location: error.php");
        exit();
    }
} else {
    // Si no es una solicitud POST, redirige a la página de error
    $_SESSION['error'] = 'Acceso no autorizado.';
    header("Location: error.php");
    exit();
}
?>
