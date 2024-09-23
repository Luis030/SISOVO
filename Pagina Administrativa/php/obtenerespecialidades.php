<?php
include("../../BD/conexionbd.php");
session_start();

$q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';
$ocupacion = isset($_GET['ocupacion']) ? mysqli_real_escape_string($conexion, $_GET['ocupacion']) : '';



if ($q) {
    // Consulta para buscar coincidencias basadas en el término de búsqueda
    $sql = "SELECT ID_Especializacion, Nombre 
            FROM especializaciones 
            WHERE Nombre LIKE '%$q%' AND ID_Ocupacion='$ocupacion'
            LIMIT 50";
} else {
    // Consulta inicial para cargar 10 elementos por defecto
    $sql = "SELECT ID_Especializacion, Nombre 
            FROM especializaciones WHERE ID_Ocupacion='$ocupacion'
            ORDER BY Nombre ASC 
            LIMIT 10";
}

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($especialidades);
}
?>
