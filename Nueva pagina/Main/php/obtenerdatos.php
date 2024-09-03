<?php
require_once("../../../BD/conexionbd.php");

$tipouser = $_GET['tipo'];
$id = $_GET['id'];

if ($tipouser && $id) {
    $consulta = null;

    if ($tipouser === "alumno") {
        $sql = "SELECT P.Nombre 
                FROM patologia_alumno PA 
                JOIN alumnos A ON PA.ID_Alumno = A.ID_Alumno 
                JOIN patologias P ON P.ID_Patologia = PA.ID_Patologia 
                WHERE A.ID_Alumno = ?";
        $consulta = $conexion->prepare($sql); 
        $consulta->bind_param("i", $id); // i significa entero
    } else if ($tipouser === "docente") {
        $sql = "SELECT E.Nombre 
                FROM especializaciones E 
                JOIN especializacion_docente ED ON E.ID_Especializacion = ED.ID_Especializacion 
                JOIN docentes D ON ED.ID_Docente = D.ID_Docente 
                WHERE D.ID_Docente = ?";
        $consulta = $conexion->prepare($sql); 
        $consulta->bind_param("i", $id); 
    } else {
        echo json_encode(["error" => "Tipo de usuario no válido."]);
        exit;
    }

    if ($consulta) {
        $consulta->execute();
        $resultado = $consulta->get_result();
        
        if ($resultado) {
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
            echo json_encode($datos);
        } else {
            echo json_encode(["error" => "Error en la obtención de datos."]);
        }

        $consulta->close();
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    }
} else {
    echo json_encode(["error" => "Falta información de tipo de usuario o ID."]);
}
?>
