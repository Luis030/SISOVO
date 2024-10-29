<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    session_start();
    if(isset($_POST['datospagina'])){
        $sql = "SELECT 
    (SELECT COUNT(*) FROM ocupacion O WHERE O.Estado = 1) AS Total_Ocupaciones,
    
    (SELECT COUNT(*) 
     FROM ocupacion O 
     LEFT JOIN docentes D ON O.ID_Ocupacion = D.ID_Ocupacion 
     WHERE O.Estado = 1 AND D.ID_Docente IS NULL) AS Ocupaciones_Sin_Docentes;
    ";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($fila = mysqli_fetch_assoc($resultado)){
            $cantidadocupaciones = $fila['Total_Ocupaciones'];
            $ocupacionessindoc = $fila['Ocupaciones_Sin_Docentes'];
        }
    }
    echo json_encode([
        "totalocu" => $cantidadocupaciones,
        "ocusindoc" => $ocupacionessindoc
    ]);
    exit;
    }
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
