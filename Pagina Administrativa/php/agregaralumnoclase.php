<?php
require_once("../../BD/conexionbd.php");
$error = 0;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idclase = $_GET['id'];
    $alumnosingresados = $_POST['alumnos'];
    foreach($alumnosingresados as $alumno){
        $sql = "SELECT * FROM alumnos_clase WHERE ID_Alumno=$alumno AND ID_Clase=$idclase";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0){
            $error = $error+1;
        } else {
            $sql = "INSERT INTO alumnos_clase(ID_Clase, ID_Alumno) VALUES ('$idclase', '$alumno');";
            if(mysqli_query($conexion, $sql) === TRUE){
                echo "Correcto";
            } else {
                echo "Error.";
            }
        }
    }
    if($error > 0){
        header("Location: ../detalle_clases.php?id=$idclase&&error=true");
    } else {
        header("Location:../detalle_clases.php?id=$idclase&&success=true");
    }
}

?>