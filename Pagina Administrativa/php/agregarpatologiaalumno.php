<?php
    include("../../BD/conexionbd.php");

    $idp = $_POST['idp'];
    $ida = $_POST['ida'];

    foreach ($idp as $pat) {
        $sql = "INSERT INTO patologia_alumno (ID_Patologia, ID_Alumno) VALUES ($pat, $ida)";
        $resultado = mysqli_query($conexion, $sql);
    }
?>