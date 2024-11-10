<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");
        $idocupacion = $_POST['ocupacion'];
        $sql = "SELECT 
            O.ID_Ocupacion,
            O.Nombre AS OcupacionNombre,
            COUNT(E.ID_Especializacion) AS CantidadEspecializaciones
            FROM ocupacion O LEFT JOIN especializaciones E ON O.ID_Ocupacion = E.ID_Ocupacion WHERE O.ID_Ocupacion = '$idocupacion' AND O.Estado = 1
            GROUP BY O.ID_Ocupacion, O.Nombre;";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $cantidad = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($cantidad);
        }
    } else {
        header("Location: ../../");
    }