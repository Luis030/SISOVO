<?php
$servername = "localhost";
$username = "cer";
$password = "clinicacer";
$dbname = "cerbd";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("Conexión perdida/no encontrada: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");
mysqli_query($conexion, "SET time_zone = '-03:00'");
?>
