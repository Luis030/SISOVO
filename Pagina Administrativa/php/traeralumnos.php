<?php
    include("../../BD/conexionbd.php");

    session_start();

    if (isset($_SESSION["alumno"])) {
        $alumno = $_SESSION["alumno"];
        $sql = "SELECT ID_Alumno FROM alumnos where Cedula = '$alumno';";
        $sqlAlumnos = $conexion->query($sql);

        if ($sqlAlumnos) {
            $alumnosEncontrados = $sqlAlumnos->fetch_all(); 
            echo json_encode($alumnosEncontrados);
        }
    }
?>