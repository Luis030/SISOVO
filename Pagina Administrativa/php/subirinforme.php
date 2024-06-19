<?php
    include("../../BD/conexionbd.php");

    session_start();
    
    $tituloInforme = $_POST["title"];
    $patologiaInforme = $_POST["patologia"];
    $obsInforme = $_POST["obs"];
    $informeCiDocente = $_POST["ciDocente"];
    $informeCiAlumno = $_POST["ciAlumno"];

    $_SESSION["docente"] = $informeCiDocente;
    $_SESSION["alumno"] = $informeCiAlumno;

    $subirInforme = "INSERT INTO informes(ID_Docente, ID_Alumno, Titulo, Patologia, Observaciones) VALUES ('', '', '$tituloInforme', '$patologiaInforme', '$obsInforme');"
    $sqlInforme = $conexion->query($subirInforme);

?>