<?php
    header('Content-Type: application/json');

    require_once("../../BD/conexionbd.php");
    include("funciones.php");

    $nombre = $_POST['nom'];
    $apellido = $_POST['ape'];
    $cedula = $_POST['ced'];
    $tipo = $_POST['tipo'];

    if ($tipo == "docente") {
        $contraseña = generarPassDoc($cedula, $nombre, $apellido);
    }

    if ($tipo == "alumno") {
        $contraseña = generarPass($cedula);
    }
    
    $sql = "UPDATE usuarios 
            SET Contraseña = '$contraseña'
            WHERE Cedula = $cedula";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo json_encode([
            "restaurada" => "si"
        ]);
    }

    exit();
?>