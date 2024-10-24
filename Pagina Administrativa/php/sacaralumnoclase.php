<?php
    require_once("../../BD/conexionbd.php");

    $idclase = $_GET['clase'];
    $idalumno = $_GET['alumno'];
    $sql = "UPDATE alumnos_clase SET Estado=0 WHERE ID_Clase=$idclase AND ID_Alumno=$idalumno";
    if(mysqli_query($conexion, $sql) === TRUE){
        echo json_encode([
            "resultado" => "exito"
        ]);
    } else {
        echo json_encode([
            "resultado" => "error"
        ]);
    }
?>