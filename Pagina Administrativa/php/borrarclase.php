<?php
require_once("../../BD/conexionbd.php");
$IDClase = $_GET['id'];
if($IDClase){
    $sql = "UPDATE clase SET Estado=0 WHERE ID_Clase=$IDClase";
    if(mysqli_query($conexion, $sql) === TRUE){
        echo json_encode([
            "Resultado" => "exitoso",
            "Clase" => "$IDClase"
        ]);
    } else {
        echo json_encode([
            "Resultado" => "error",
            "Clase" => "$IDClase"
        ]);
    }
}
?>