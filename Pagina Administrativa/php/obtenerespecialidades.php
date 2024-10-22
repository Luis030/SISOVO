<?php
include("../../BD/conexionbd.php");
session_start();

if(isset($_GET['tabla'])){
    if($_GET['tabla'] == "true"){
        $sql = "SELECT e.Nombre AS Especializacion, o.Nombre AS Ocupacion, COUNT(DISTINCT ed.ID_Docente) AS Total_Docentes
        FROM especializaciones e
        LEFT JOIN ocupacion o ON e.ID_Ocupacion = o.ID_Ocupacion
        LEFT JOIN especializacion_docente ed ON e.ID_Especializacion = ed.ID_Especializacion AND ed.Estado = 1
        WHERE e.Estado = 1
        GROUP BY e.Nombre, o.Nombre;
        ";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($especialidades);
            exit;
        } else {
            echo json_encode([]);
            exit;
        }
    }
}
$q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';
$ocupacion = isset($_GET['ocupacion']) ? mysqli_real_escape_string($conexion, $_GET['ocupacion']) : '';



if ($q) {
    $sql = "SELECT ID_Especializacion, Nombre 
            FROM especializaciones 
            WHERE Nombre LIKE '%$q%' AND ID_Ocupacion='$ocupacion'
            LIMIT 50";
} else {
    $sql = "SELECT ID_Especializacion, Nombre 
            FROM especializaciones WHERE ID_Ocupacion='$ocupacion'
            ORDER BY Nombre ASC 
            LIMIT 10";
}

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($especialidades);
}
?>
