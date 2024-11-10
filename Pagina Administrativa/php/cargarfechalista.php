<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';
        $idclase = isset($_POST['idclase']) ? mysqli_real_escape_string($conexion, $_POST['idclase']) : '';

        $query = "SELECT DISTINCT Fecha FROM alumnos_clase 
                WHERE ID_Clase = $idclase 
                AND DATE_FORMAT(Fecha, '%d/%m/%Y') LIKE '%$q%' 
                AND Fecha != curdate() 
                AND Asistio IS NOT NULL";

        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            $fechas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($fechas);
        }
    } else {
        header("Location: ../../");
    }
?>
