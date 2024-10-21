<?php
    require_once("../../BD/conexionbd.php");

    $idAlumno = $_GET['id'];; 
    
    $sql = "SELECT P.Nombre, PA.ID_Patologia
            FROM patologias P, patologia_alumno PA
            WHERE P.ID_Patologia = PA.ID_Patologia AND PA.ID_Alumno = $idAlumno";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $pats = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($pats);
    }
?>