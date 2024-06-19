<?php
    include("../../BD/conexionbd.php");

    session_start();

    if (isset($_SESSION["docente"])) {
        $docente = $_SESSION["docente"];
        $sql = "SELECT ID_Docente FROM docentes where Cedula = '$docente';";
        $sqlDocentes = $conexion->query($sql);

        if ($sqlDocentes) {
            $docentesEncontrados = $sqlDocentes->fetch_all(); 
            echo json_encode($docentesEncontrados);
        }
    }
?>
