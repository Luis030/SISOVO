<?php
    include("../../BD/conexionbd.php");

    $sql = "SELECT (SELECT COUNT(*) FROM alumnos WHERE Estado = 1) AS totalAlumnos,
                   (SELECT COUNT(*) FROM clase WHERE Estado = 1) AS totalClases,
                   (SELECT COUNT(*) FROM docentes WHERE Estado = 1) AS totalDocentes";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $cantA = $fila['totalAlumnos'];
            $cantD = $fila['totalDocentes'];
            $cantC = $fila['totalClases'];
        }
    }
    
    $cantidades = [
        'cantA' => $cantA,
        'cantD' => $cantD,
        'cantC' => $cantC
    ];

    echo json_encode($cantidades)
?>