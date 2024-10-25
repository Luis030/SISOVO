<?php
include("../../BD/conexionbd.php");
session_start();
if(isset($_POST['tabla'])){
    if($_POST['tabla'] == "true"){
        $sql = "SELECT P.Nombre, COUNT(PA.ID_Alumno) AS Cantidad, P.ID_Patologia
        FROM patologias P
        LEFT JOIN patologia_alumno PA ON P.ID_Patologia = PA.ID_Patologia AND PA.Estado = 1
        LEFT JOIN alumnos A ON A.ID_Alumno = PA.ID_Alumno AND A.Estado = 1
        GROUP BY P.Nombre, P.ID_Patologia;
        ";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $patologias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($patologias);
        } else {
            echo json_encode([]);
        }
        exit;
    }
}

if (isset($_POST['editaralumno'])){
    $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';
    $id = $_POST['id'];
    $sql = "SELECT P.ID_Patologia, P.Nombre FROM patologias p
            WHERE P.Nombre LIKE '%$q%' AND P.Estado = 1 AND P.ID_Patologia NOT IN 
            (SELECT ID_Patologia 
            FROM patologia_alumno 
            WHERE ID_Alumno = $id AND Estado = 1);";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        $patologias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($patologias);
    }
    exit;
}

// Obtener el término de búsqueda desde la solicitud AJAX (si existe)
$q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';


if ($q) {
    $sql = "SELECT ID_Patologia, Nombre FROM patologias WHERE Nombre LIKE '%$q%' LIMIT 50";
} else {
    $sql = "SELECT ID_Patologia, Nombre FROM patologias ORDER BY Nombre ASC LIMIT 10";
}

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    $patologias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($patologias);
}
?>
