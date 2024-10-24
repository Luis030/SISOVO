<?php
    include("../../BD/conexionbd.php");
    session_start();
    if(isset($_POST['select'])){
        $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';
        if ($q) {
            $sql = "SELECT ID_Docente, Nombre, Apellido FROM docentes WHERE Nombre LIKE '%$q%' LIMIT 50";
        } else {
            $sql = "SELECT ID_Docente, Nombre, Apellido FROM docentes ORDER BY Nombre ASC LIMIT 50";
        }

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            $docente = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($docente);
        }
    }

    if(isset($_GET['tabla'])){
        $sql = "SELECT ID_Docente, CONCAT(Nombre, ' ', Apellido) AS Nombre, Cedula, Mail, Celular FROM docentes WHERE Estado=1;";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $docentes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($docentes);
        }
    }
    
?>