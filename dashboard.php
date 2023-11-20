<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: error.php?mensaje=Acceso%20no%20autorizado");
    exit();
}
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    $_SESSION['errors'][] = "¡Se produjo un error en la tarea!";
}

$usuario = $_SESSION['usuario'];

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritorio de la aplicación</title>
</head>
<body>

    <header>
        <h1>Bienvenido, <?php echo $usuario; ?></h1>
        <a href="logout.php">Cerrar sesión</a>
    </header>
    <main>
        <h2>Lista de tareas</h2>
        <div class="tarea">
        <input type="checkbox" id="tarea1" name="tarea1">
        <label for="tarea1">Hacer la compra</label>
    </div>
    <div class="tarea">
        <input type="checkbox" id="tarea2" name="tarea2">
        <label for="tarea2">Estudiar para el examen</label>
    </div>
    </main>

</body>
</html>


