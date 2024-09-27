<?php
require_once("../../BD/conexionbd.php");
$q = isset($_GET['q']) ? $_GET['q'] : '';
$sql = "SELECT ID_Alumno, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM Alumnos WHERE (CONCAT(Nombre, ' ', Apellido) LIKE '%$q%' OR Cedula LIKE '%$q%') LIMIT 50";
$resultado = mysqli_query($conexion, $sql);
$alumnos = [];

if(mysqli_num_rows($resultado) > 0){
    while($fila = mysqli_fetch_assoc($resultado)){
        $alumnos[] = $fila; 
    }
}

echo json_encode($alumnos); 
?>
