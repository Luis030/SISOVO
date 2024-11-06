<?php
    $error_code = isset($_GET['error']) ? intval($_GET['error']) : 0;
    $error_messages = [
        404 => "Página no encontrada",
        500 => "Error interno del servidor",
        403 => "Acceso prohibido",
        400 => "Solicitud incorrecta",
        401 => "No autorizado",
    ];

    $message = isset($error_messages[$error_code]) ? $error_messages[$error_code] : "Error desconocido";
?>
<!DOCTYPE html>
<html lang="es">
<link rel="shortcut icon" href="Diseño/IMG/logocer.jpg" type="image/x-icon">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error <?php echo $error_code; ?></title>
</head>
<body>
    <h1>Error <?php echo $error_code; ?></h1>
    <p><?php echo $message; ?></p>
    <a href="index.php">Volver a la página de inicio</a>
</body>
</html>
