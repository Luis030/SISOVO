<?php
    require_once("../../BD/conexionbd.php");

    $idPatologia = $_GET['idp'];
    $idAlumno = $_GET['ida'];

    $sql = "DELETE FROM patologia_alumno
            WHERE ID_Patologia = $idPatologia AND ID_Alumno = $idAlumno";

    if (mysqli_query($conexion, $sql) === TRUE) {
        echo json_encode([
            "resultado" => "exito"
        ]);
    } else {
        echo json_encode([
            "resultado" => "error"
        ]);
    }
?>
