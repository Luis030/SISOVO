<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
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

        if (isset($_POST['borrarigual'])) {
            $sql1 = "UPDATE clase
                    SET Estado = 0
                    WHERE ID_Clase = $IDClase";
            $resultado1 = mysqli_query($conexion, $sql1);

            $sql2 = "UPDATE alumnos_clase
                    SET Estado = 0
                    WHERE ID_Clase = $IDClase";
            $resultado2 = mysqli_query($conexion, $sql2);

            if ($resultado1 == TRUE && $resultado2 == TRUE) {
                echo json_encode([
                    "Resultado" => "si",
                    "Clase" => $IDClase
                ]);
            } else {
                echo json_encode([
                    "Resultado" => "no",
                    "Clase" => $IDClase
                ]);
            }
        }
    } else {
        header("Location: ../../");
    }
?>