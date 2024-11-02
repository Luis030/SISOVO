<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");

    $IDClase = $_POST['id'];

    if (isset($_POST['eliminar'])) {
        $sql = "SELECT ID_Alumno
                FROM alumnos_clase
                WHERE ID_Clase = $IDClase
                AND Estado = 1";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                echo json_encode([
                    "Resultado" => "exito",
                    "Mensaje" => "contiene"
                ]);
            } else {
                echo json_encode([
                    "Resultado" => "exito",
                    "Mensaje" => "nocontiene"
                ]);
            }
        }

        exit;
    }

    if (isset($_POST['borrar'])) {
        $sql = "UPDATE clase 
                SET Estado = 0
                WHERE ID_Clase = $IDClase";
                
        if(mysqli_query($conexion, $sql) === TRUE){
            echo json_encode([
                "Resultado" => "exito",
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