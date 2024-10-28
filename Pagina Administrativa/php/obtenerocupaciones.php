<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    session_start();
    if(isset($_POST['tabla'])){
        if($_POST['tabla'] == "true"){
            $sql = "SELECT 
                        O.Nombre AS Ocupacion, 
                        COUNT(D.ID_Docente) AS Total_Docentes, 
                        O.ID_Ocupacion 
                    FROM 
                        ocupacion O 
                    LEFT JOIN 
                        docentes D ON D.ID_Ocupacion = O.ID_Ocupacion AND D.Estado = 1 
                    WHERE 
                        O.Estado = 1 
                    GROUP BY 
                        O.Nombre, O.ID_Ocupacion;
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
