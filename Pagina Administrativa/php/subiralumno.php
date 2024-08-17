<?php
include("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    

    $subiralumno = "INSERT INTO alumnos(cedula, nombre, apellido, fecha_nac, patologias) values ('$cedula', '$nombre', '$apellido', '$fechanac', '$patologias');";
    if($conexion->query($subiralumno) === TRUE) {
        $_SESSION['Exito'] = true;
        header("Location:../añadiralumno.php");
    } else {
        echo "Error".$sql."<br>".$conexion->error;
    }
}

?>