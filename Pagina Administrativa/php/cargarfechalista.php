<?php
include("../../BD/conexionbd.php");
$q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';

$idclase = $_GET['idclase'];
$query = "SELECT DISTINCT Fecha FROM alumnos_clase WHERE ID_Clase =$idclase AND DATE_FORMAT(Fecha, '%d/%m/%Y') LIKE '%$q%' AND Fecha!=curdate() AND Asistio IS NOT NULL";
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) > 0) {
    $fechas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($fechas);
}
?>
