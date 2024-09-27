<?php
require_once("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idclase = $_GET['id'];
    $alumnosingresados = $_POST['alumnos'];
    foreach($alumnosingresados as $alumno){
        $sql = "SELECT * FROM alumnos_clase WHERE ID_Alumno=$alumno AND ID_Clase=$idclase";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0){
            header("Location: ../detalle_clases.php?id=$idclase&&error=true");
        } else {
            $sql = "INSERT INTO alumnos_clase(ID_Clase, ID_Alumno) VALUES ('$idclase', '$alumno');";
            if(mysqli_query($conexion, $sql) === TRUE){
                header("Location:../detalle_clases.php?id=$idclase&&success=true");
                exit;
            } else {
                echo "Error.";
            }
        }
    }
}

?>