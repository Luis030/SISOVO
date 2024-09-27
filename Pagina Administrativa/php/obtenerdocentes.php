<?php
    include("../../BD/conexionbd.php");
    session_start();

    $q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';

    if ($q) {
        $sql = "SELECT ID_Docente, Nombre, Apellido FROM docentes WHERE Nombre LIKE '%$q%' LIMIT 50";
    } else {
        $sql = "SELECT ID_Docente, Nombre, Apellido FROM docentes ORDER BY Nombre ASC LIMIT 10";
    }

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $patologias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($patologias);
    }
?>