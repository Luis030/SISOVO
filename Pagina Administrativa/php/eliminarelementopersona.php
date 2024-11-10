<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once("../../BD/conexionbd.php");

        $tipo = $_POST['tipo'];
        $ide = $_POST['ide'];
        $idp = $_POST['idp'];

        if ($tipo == "alumno") {
            $sql = "UPDATE patologia_alumno
                    SET Estado = 0
                    WHERE ID_Patologia = $ide AND ID_Alumno = $idp";
            if (mysqli_query($conexion, $sql) === TRUE) {
                echo json_encode([
                    "resultado" => "exito"
                ]);
            } else {
                echo json_encode([
                    "resultado" => "error"
                ]);
            } 
        }

        if ($tipo == "docente") {
            $sql = "DELETE FROM especializacion_docente
            WHERE ID_Especializacion = $ide AND ID_Docente = $idp";
            if (mysqli_query($conexion, $sql) === TRUE) {
                echo json_encode([
                    "resultado" => "exito"
                ]);
            } else {
                echo json_encode([
                    "resultado" => "error"
                ]); 
            } 
        }
    } else {
        header("Location: ../../");
    }
?>
