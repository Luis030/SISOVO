<?php
require_once("../../BD/conexionbd.php");
$q = isset($_GET['q']) ? $_GET['q'] : '';

$sql = "SELECT ID_Alumno, Nombre, Apellido FROM Alumnos AND ((Nombre LIKE %'$q%) OR Apellido LIKE %'$q'%)";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) > 0){
    $todo = mysqli_fetch_all($resultado);
    echo json_encode($todo);
}
?>