<?php
session_start();
if(!isset($_SESSION['finalizado'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar cuenta</title>
    <link rel="stylesheet" href="Diseño/recuperarpass.css">
</head>
<body>
    <h1>La contraseña ha sido actualizada</h1>
    <br>
    <a href="index.php" id="a-ingresar-login">Ingresar</a>
</body>
</html>