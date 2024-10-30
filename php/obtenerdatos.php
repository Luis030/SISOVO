<?php
require_once("../BD/conexionbd.php");

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
        $consulta = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($consulta, "i", $id); // i significa entero
    } else if ($tipouser === "docente") {
        $sql = "SELECT E.Nombre 
                FROM especializaciones E 
                JOIN especializacion_docente ED ON E.ID_Especializacion = ED.ID_Especializacion 
                JOIN docentes D ON ED.ID_Docente = D.ID_Docente 
                WHERE D.ID_Docente = ?";
        $consulta = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($consulta, "i", $id); 
    } else {
        echo json_encode(["error" => "Tipo de usuario no válido."]);
        exit;
    }

    if ($consulta) {
        mysqli_stmt_execute($consulta);
        $resultado = mysqli_stmt_get_result($consulta);
        
        if ($resultado) {
            $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($datos);
        } else {
            echo json_encode(["error" => "Error en la obtención de datos."]);
        }

        mysqli_stmt_close($consulta);
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    }
} else {
    echo json_encode(["error" => "Falta información de tipo de usuario o ID."]);
}
?>
