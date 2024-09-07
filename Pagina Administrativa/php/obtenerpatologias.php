<?php
include("../../BD/conexionbd.php");
session_start();

// Obtener el término de búsqueda desde la solicitud AJAX (si existe)
$q = isset($_GET['q']) ? $conexion->real_escape_string($_GET['q']) : '';

// Verificar si hay un término de búsqueda
if ($q) {
    // Consulta para buscar coincidencias basadas en el término de búsqueda
    $sql = "SELECT ID_Patologia, Nombre FROM patologias WHERE Nombre LIKE '%$q%' LIMIT 50";
} else {
    // Consulta inicial para cargar 10 elementos por defecto
    $sql = "SELECT ID_Patologia, Nombre FROM patologias ORDER BY Nombre ASC LIMIT 10";
}

$resultado = $conexion->query($sql);

if($resultado){
    $patologias = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($patologias);
}
?>
