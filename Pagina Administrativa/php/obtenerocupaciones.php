<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    session_start();
    if(isset($_POST['tabla'])){
        if($_POST['tabla'] == "true"){
            $sql = "SELECT o.Nombre AS Ocupacion, COUNT(DISTINCT ed.ID_Docente) AS Total_Docentes, o.ID_Ocupacion 
            FROM ocupacion o
            LEFT JOIN especializaciones e ON o.ID_Ocupacion = e.ID_Ocupacion
            LEFT JOIN especializacion_docente ed ON e.ID_Especializacion = ed.ID_Especializacion AND ed.Estado = 1
            WHERE o.Estado = 1 AND e.Estado=1 
            GROUP BY o.Nombre;
            ";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                $ocupaciones = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                echo json_encode($ocupaciones);
                exit;
            } else {
                echo json_encode([]);
                exit;
            }
        }
    }
    $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';


    if ($q) {
        $sql = "SELECT ID_Ocupacion, Nombre 
                FROM ocupacion 
                WHERE Nombre LIKE '%$q%' AND Estado = 1 
                LIMIT 50";
    } else {
        $sql = "SELECT ID_Ocupacion, Nombre 
                FROM ocupacion WHERE Estado = 1
                ORDER BY Nombre ASC 
                LIMIT 10";
    }

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $ocupaciones = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($ocupaciones);
    } else {
        echo json_encode([]);
    }
}
?>
