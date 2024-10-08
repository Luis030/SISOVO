<?php
    include("../../BD/conexionbd.php");
    session_start();

    $q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';

    if ($q) {
        $sql = "SELECT Dia FROM dias WHERE dia LIKE '%$q%' LIMIT 50";
    } else {
        $sql = "SELECT Dia FROM dias ORDER BY Dia ASC LIMIT 10";
    }

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $dias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($dias);
    }
?>