<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cerbd";

    $conexion = new mysqli($servername, $username, $password, $dbname);
    $conexion->set_charset("utf8mb4");

    if ($conexion->connect_error) {
        die ("Conexión perdida/no encontrada");
    }
    echo "Conexion exitosa";
?>