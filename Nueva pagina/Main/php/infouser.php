<?php
include("../../../BD/conexionbd.php");
session_start();


$cedula = $_SESSION['cedula'];
$tipouser = $_SESSION['Privilegio'];
$sql = "";


switch($tipouser){
    case "alumno":
        $sql = "SELECT ID_Alumno, Nombre, Apellido, Cedula, Fecha_Nac, Mail_Padres, Celular_Padres FROM alumnos WHERE Cedula='$cedula'";
        break;
    case "docente":
        $sql = "SELECT ID_Docente, Nombre, Apellido, Cedula, Fecha_Nac FROM docentes WHERE Cedula='$cedula'";
        break;
    default:
        echo json_encode(["error" => "Tipo de usuario no válido."]);
        exit;
}

$resultado = $conexion->query($sql);

if ($resultado) {
    $informacion = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($informacion); 
} else {
    echo json_encode(["error" => "Error en la consulta SQL: " . $conexion->error]);
}
?>
