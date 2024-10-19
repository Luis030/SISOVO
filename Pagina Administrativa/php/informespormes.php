<?php
    include("../../BD/conexionbd.php"); 

    mysqli_query($conexion, "SET lc_time_names = 'es_ES'");

    $sql = "SELECT 
                DATE_FORMAT(Fecha, '%Y-%m') AS Mes_Numero, 
                CONCAT(UPPER(SUBSTRING(DATE_FORMAT(Fecha, '%M'), 1, 1)), LOWER(SUBSTRING(DATE_FORMAT(Fecha, '%M'), 2))) AS Mes, 
                COUNT(*) AS Cantidad_Informes 
            FROM 
                informes 
            GROUP BY 
                DATE_FORMAT(Fecha, '%Y-%m') 
            ORDER BY 
                Mes_Numero";

    $result = mysqli_query($conexion, $sql);

    $etiquetas = [];
    $valores = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $etiquetas[] = $row['Mes'];               
        $valores[] = (int)$row['Cantidad_Informes'];  
    }

    mysqli_close($conexion);
    $datos = [
        'etiquetas' => $etiquetas,
        'valores' => $valores
    ];

    header('Content-Type: application/json');
    echo json_encode($datos);
?>
