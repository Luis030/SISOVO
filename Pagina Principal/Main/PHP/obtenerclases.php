<?php
    require_once("../../../BD/conexionbd.php");

    $idAlumno = $_GET['id'];
        
    $sql = "SELECT C.Nombre, C.Dia, C.Inicio, C.Final, A.ID_Alumno 
            FROM alumnos_clase AC 
            JOIN alumnos A ON A.ID_Alumno = AC.ID_Alumno
            JOIN Clase C ON C.ID_Clase = AC.ID_Clase 
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
