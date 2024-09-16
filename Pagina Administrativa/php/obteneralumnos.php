<?php
include("../../BD/conexionbd.php");
session_start();
$cedula = $_SESSION['cedula'];
$q = isset($_GET['q']) ? $_GET['q'] : '';
$clase = isset($_GET['clase']) ? $_GET['clase'] : '';

$sql = "SELECT A.ID_Alumno, A.Nombre FROM 
alumnos A JOIN alumnos_clase AC ON A.ID_Alumno=AC.ID_Alumno 
JOIN clase C ON AC.ID_Clase=C.ID_Clase 
JOIN docentes D on C.ID_Docente=D.ID_Docente 
WHERE D.Cedula=$cedula AND (A.Nombre LIKE '%$q%' OR A.Cedula LIKE '%$q%')";

if ($clase !== '') {
    $sql .= " AND C.ID_Clase = $clase";
}




$resultado = mysqli_query($conexion, $sql);
if($resultado){
    $alumnos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($alumnos);    
}

?>