<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cerbd";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die ("Conexión perdida/no encontrada");
    }
?>