<?php
require_once("../BD/conexionbd.php");
session_start();

$cedula = $_SESSION['cedula'];
$tipouser = $_SESSION['Privilegio'];
$sql = "";
$stmt = null;

switch ($tipouser) {
    case "alumno":
        $sql = "SELECT a.ID_Alumno, a.Nombre, a.Apellido, a.Cedula, a.Fecha_Nac, u.Correo AS Mail_Padres, a.Celular_Padres FROM alumnos a JOIN usuarios u ON a.ID_Usuario=u.ID_Usuario WHERE a.Cedula = ? AND a.Estado = 1";
        $stmt = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($stmt, "s", $cedula);  
        break;
    case "docente":
        $sql = "SELECT d.ID_Docente, d.Nombre, d.Apellido, d.Cedula, d.Fecha_Nac, u.Correo AS Mail FROM docentes d JOIN usuarios u ON d.ID_Usuario=u.ID_Usuario WHERE d.Cedula = ? AND d.Estado = 1";
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
