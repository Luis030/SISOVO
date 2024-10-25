<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");

    $IDClase = $_POST['id'];

    if ($IDClase) {
        $sql = "UPDATE clase 
                SET Estado=0
                WHERE ID_Clase = $IDClase";
                
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
} else {
    header("Location: ../../");
}
?>