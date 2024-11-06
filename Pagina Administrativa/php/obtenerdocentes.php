<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
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

    if(isset($_POST['tabla'])){
        $sql = "SELECT D.ID_Docente, CONCAT(D.Nombre, ' ', D.Apellido) AS Nombre, D.Cedula, U.Correo AS Mail, D.Celular, O.Nombre AS Ocupacion
        FROM docentes D 
        JOIN usuarios U ON D.ID_Usuario = U.ID_Usuario 
        JOIN ocupacion O ON D.ID_Ocupacion = O.ID_Ocupacion
        WHERE D.Estado = 1";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $docentes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($docentes);
        }
    }
} else {
    header("Location: ../../");
}
?>