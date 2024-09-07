<?php
include("../../BD/conexionbd.php");
session_start();


$q = isset($_GET['q']) ? $conexion->real_escape_string($_GET['q']) : '';

// Verificar si hay un término de búsqueda
if ($q) {
    // Consulta para buscar coincidencias basadas en el término de búsqueda
    $sql = "SELECT ID_Especializacion, Nombre FROM especializaciones WHERE Nombre LIKE '%$q%' LIMIT 50";
} else {
    // Consulta inicial para cargar 10 elementos por defecto
    $sql = "SELECT ID_Especializacion, Nombre FROM especializaciones ORDER BY Nombre ASC LIMIT 10";
}

$resultado = $conexion->query($sql);

if($resultado){
    $especialidades = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($especialidades);
}
?>
