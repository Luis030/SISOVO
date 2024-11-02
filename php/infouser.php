<?php
require_once("../BD/conexionbd.php");
session_start();

$cedula = $_SESSION['cedula'];
$tipouser = $_SESSION['Privilegio'];
$sql = "";
$stmt = null;

switch ($tipouser) {
    case "alumno":
        $sql = "SELECT ID_Alumno, Nombre, Apellido, Cedula, Fecha_Nac, Mail_Padres, Celular_Padres FROM alumnos WHERE Cedula = ? AND Estado = 1";
        $stmt = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($stmt, "s", $cedula);  
        break;
    case "docente":
        $sql = "SELECT ID_Docente, Nombre, Apellido, Cedula, Fecha_Nac, Mail FROM docentes WHERE Cedula = ? AND Estado = 1";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $cedula); 
        break;
    case "admin":
        $sql = "SELECT Tipo FROM usuarios WHERE Cedula = ? AND Estado = 1";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $cedula); 
        break;
    default:
        echo json_encode(["error" => "Tipo de usuario no válido."]);
        exit;
}

if ($stmt) {
    mysqli_stmt_execute($stmt);  
    $resultado = mysqli_stmt_get_result($stmt);
    
    if ($resultado) {
        $informacion = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($informacion);
    } else {
        echo json_encode(["error" => "Error en la consulta SQL: " . mysqli_error($conexion)]);
    }

    mysqli_stmt_close($stmt); 
} else {
    echo json_encode(["error" => "Error al preparar la consulta SQL."]);
}
?>
