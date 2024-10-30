<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");
    $id = $_POST['id'];
    $sql = "UPDATE informes SET Estado=0 WHERE ID_Informe=$id";
    if(mysqli_query($conexion, $sql) == TRUE){
        echo json_encode([
            "resultado" => "exito"
        ]);
    }
}
?>