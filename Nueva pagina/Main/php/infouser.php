<?php
include("../../../BD/conexionbd.php");
session_start();

$cedula = $_SESSION['cedula'];
$tipouser = $_SESSION['Privilegio'];
$sql = "";
$stmt = null;

switch ($tipouser) {
    case "alumno":
        $sql = "SELECT ID_Alumno, Nombre, Apellido, Cedula, Fecha_Nac, Mail_Padres, Celular_Padres FROM alumnos WHERE Cedula = ?";
        $stmt = $conexion->prepare($sql); 
        $stmt->bind_param("s", $cedula);  
        break;
    case "docente":
        $sql = "SELECT ID_Docente, Nombre, Apellido, Cedula, Fecha_Nac, Mail FROM docentes WHERE Cedula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $cedula); 
        break;
    default:
        echo json_encode(["error" => "Tipo de usuario no válido."]);
        exit;
}

if ($stmt) {
    $stmt->execute();  
    $resultado = $stmt->get_result();
    
    if ($resultado) {
        $informacion = $resultado->fetch_all(MYSQLI_ASSOC);
        echo json_encode($informacion);
    } else {
        echo json_encode(["error" => "Error en la consulta SQL: " . $conexion->error]);
    }

    $stmt->close(); 
} else {
    echo json_encode(["error" => "Error al preparar la consulta SQL."]);
}
?>
