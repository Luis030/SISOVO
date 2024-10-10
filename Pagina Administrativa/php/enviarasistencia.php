<?php
include("../../BD/conexionbd.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $idClase = $_GET['idclase'];
    $fecha = $_POST['fecha'];
    if($fecha == "Hoy"){
        $actualizando = $_POST['actualizando'];
        if($actualizando == "true"){
            if (isset($_POST['asistencia'])) {
                foreach ($_POST['asistencia'] as $idAlumno => $asistio) {
                    $query = "UPDATE alumnos_clase 
                              SET Asistio = $asistio 
                              WHERE ID_Clase = $idClase AND ID_Alumno = $idAlumno AND Fecha = curdate() AND Asistio IS NOT NULL";
                    mysqli_query($conexion, $query);
                }
                header("Location:../listaclases.php?idclase=$idClase&&success=actualizado");
            }
        } else {
            if (isset($_POST['asistencia'])) {
                foreach ($_POST['asistencia'] as $idAlumno => $asistio) {
                    $query = "INSERT INTO alumnos_clase (ID_Clase, ID_Alumno, Asistio, Fecha, estado)
                              VALUES ($idClase, $idAlumno, $asistio, CURDATE(), 1)";
                    mysqli_query($conexion, $query);
                }
                header("Location:../listaclases.php?idclase=$idClase&&success=ingresado");
            }
        }
    } else {
        if (isset($_POST['asistencia']) && isset($_POST['fecha'])) {
            foreach ($_POST['asistencia'] as $idAlumno => $asistio) {
                $query = "UPDATE alumnos_clase 
                          SET Asistio = $asistio 
                          WHERE ID_Clase = $idClase AND ID_Alumno = $idAlumno AND Fecha = '$fecha' AND Asistio IS NOT NULL";
                mysqli_query($conexion, $query);
            }
            header("Location:../listaclases.php?idclase=$idClase&&success=actualizado");
        }
    }
    
}


?>