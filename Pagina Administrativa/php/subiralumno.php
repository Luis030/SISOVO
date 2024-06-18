<?php
include("../../BD/conexionbd.php");
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechanac = $_POST['fecha'];
$patologias = $_POST['patologias'];

$subiralumno = "INSERT INTO alumnos(cedula, nombre, apellido, fecha_nac, patologias) values ('$cedula', '$nombre', '$apellido', '$fechanac', '$patologias');";
if($conexion->query($subiralumno) === TRUE) {
    $_SESSION['Exito'] = true;
    header("Location:../añadiralumno.php");
} else {
    echo "Error".$sql."<br>".$conexion->error;
}
?>