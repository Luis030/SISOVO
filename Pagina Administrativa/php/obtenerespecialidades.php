<?php
include("../../BD/conexionbd.php");
session_start();
$sql = "SELECT ID_Especializacion, Nombre FROM especializaciones";
$resultado = $conexion->query($sql);

if($resultado){
    $patologias = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($patologias);
}