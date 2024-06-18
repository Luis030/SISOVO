<?php
include("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especializacion = $_POST['especializacion'];

    $subirdocente = "INSERT INTO docente(cedula, nombre, apellido, especializacion) VALUES ('$cedula', '$nombre', '$apellido', '$especializacion');";
    if($conexion->query($subirdocente) === TRUE){
        echo "Docente ingresado.";
    } else {
        echo "Error".$sql."<br>".$conexion->error;
    }
}
?>