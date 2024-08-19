<?php
include("../../BD/conexionbd.php");
session_start();
$sql = "SELECT ID_Patologia, Nombre FROM patologias";
$resultado = $conexion->query($sql);

if($resultado){
    $patologias = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($patologias);
}