<?php
session_start();
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
} else {
    $errors = []; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de errores</title>
</head>
<body>
    <header>
        <h1>Errores en la aplicación</h1>
    </header>
    <main>
        <?php if (!empty($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay errores que mostrar.</p>
        <?php endif; ?>
    </main>

</body>
</html>




