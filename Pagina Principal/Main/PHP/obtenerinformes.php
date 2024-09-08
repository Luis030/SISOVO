<?php
    require_once("../../../BD/conexionbd.php");

    $idAlumno = $_GET['id'];
        
    $sql = "SELECT I.Titulo, I.Fecha, A.ID_Alumno, I.ID_Informe, A.Cedula
            FROM informes I
            JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno
            WHERE A.ID_Alumno = ?;";
        
    $consultasql = $conexion->prepare($sql); 
    $consultasql->bind_param("i", $idAlumno);

    if ($consultasql) {
        $consultasql->execute();
        $resultado = $consultasql->get_result();
        if ($resultado) {
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
            echo json_encode($datos);
        } else {
             echo json_encode(["error" => "Error en la obtención de datos."]);
        }
        $consultasql->close();
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    }
?>