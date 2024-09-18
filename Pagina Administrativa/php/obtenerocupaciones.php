<?php
include("../../BD/conexionbd.php");
session_start();

$q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';


if ($q) {
    // Consulta para buscar coincidencias basadas en el término de búsqueda
    $sql = "SELECT ID_Ocupacion, Nombre 
            FROM ocupacion 
            WHERE Nombre LIKE '%$q%' AND Estado = 1 
            LIMIT 50";
} else {
    // Consulta inicial para cargar 10 elementos por defecto
    $sql = "SELECT ID_Ocupacion, Nombre 
            FROM ocupacion WHERE Estado = 1
            ORDER BY Nombre ASC 
            LIMIT 10";
}

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $ocupaciones = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($ocupaciones);
}
?>
