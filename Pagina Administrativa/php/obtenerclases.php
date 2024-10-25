<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    session_start();
    $cedula = $_SESSION['cedula'];
    $q = isset($_POST['q']) ? $_POST['q'] : '';


    $sql = "SELECT C.ID_Clase, C.Nombre FROM clase C JOIN docentes D on C.ID_Docente=D.ID_Docente WHERE D.Cedula=$cedula AND C.Nombre LIKE '%$q%'";

    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        $clases = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($clases);    
    }
} else {
    header("Location: ../../");
}
