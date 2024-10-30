<?php
    require_once("../BD/conexionbd.php");
    $idAlumno = $_GET['id'];
        
    $sql = "SELECT I.Titulo, I.Fecha, I.Observaciones, A.ID_Alumno, I.ID_Informe
            FROM informes I
            JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno
            WHERE A.ID_Alumno = ? AND I.Estado = 1";
        
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
