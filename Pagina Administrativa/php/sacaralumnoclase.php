<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once("../../BD/conexionbd.php");

        $idclase = $_POST['clase'];
        $idalumno = $_POST['alumno'];
        $sql = "UPDATE alumnos_clase SET Estado = 0 WHERE ID_Clase = $idclase AND ID_Alumno = $idalumno";
        
        if(mysqli_query($conexion, $sql) === TRUE) {
            echo json_encode([
                "resultado" => "exito"
            ]);
        } else {
            echo json_encode([
                "resultado" => "error"
            ]);
        }
    } else {
        header("Location: ../../");
    }
?>