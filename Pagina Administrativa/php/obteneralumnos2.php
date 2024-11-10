<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");
        session_start();

        $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';

        if ($q) {
            $sql = "SELECT ID_Alumno, Nombre, Apellido FROM alumnos WHERE Nombre LIKE '%$q%' LIMIT 50";
        } else {
            $sql = "SELECT ID_Alumno, Nombre, Apellido FROM alumnos ORDER BY Nombre ASC LIMIT 10";
        }

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            $alumnos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($alumnos);
        }
    } else {
        header("Location: ../../");
    }
?>