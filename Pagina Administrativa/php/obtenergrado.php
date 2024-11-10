<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once("../../BD/conexionbd.php");

        $id = $_POST['id'];

        $sql = "SELECT Grado
                FROM alumnos
                WHERE ID_Alumno = $id";
        $resultado = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultado) > 0){
            while($fila = mysqli_fetch_assoc($resultado)){
                $grado = $fila['Grado'];
            }
            echo json_encode(intval($grado));
        }
    } else {
        header("Location: ../../");
    }
?>