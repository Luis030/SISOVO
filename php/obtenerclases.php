<?php
    require_once("../BD/conexionbd.php");

    $idAlumno = $_GET['id'];
        
    $sql = "SELECT C.Nombre, C.Horario, A.ID_Alumno 
            FROM alumnos_clase AC 
            JOIN alumnos A ON A.ID_Alumno = AC.ID_Alumno
            JOIN clase C ON C.ID_Clase = AC.ID_Clase 
            WHERE A.ID_Alumno = ? AND C.Estado = 1";
        
    $consultasql = mysqli_prepare($conexion, $sql); 
    mysqli_stmt_bind_param($consultasql, "i", $idAlumno);

    if ($consultasql) {
        mysqli_stmt_execute($consultasql);
        $resultado = mysqli_stmt_get_result($consultasql);
        if ($resultado) {
            $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($datos);
        } else {
            echo json_encode(["error" => "Error en la obtención de datos."]);
        }
        mysqli_stmt_close($consultasql);
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    }
?>
