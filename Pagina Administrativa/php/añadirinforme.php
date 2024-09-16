<?php
    include("../../BD/conexionbd.php");
    session_start();
    $cedulaDocente = $_SESSION['cedula'];
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $titulo = $_POST['informeTitulo'];
        $idAlumno = $_POST['alumnoIngresado'];
        $fecha = $_POST['informeFecha'];
        $grado = $_POST['informeGrado'];
        $observaciones = $_POST['informeObservacion'];
        $sql = "SELECT ID_Docente from docentes WHERE Cedula=$cedulaDocente";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0){
            while($fila = mysqli_fetch_assoc($resultado)){
                $idDocente = $fila['ID_Docente'];
            }
        }
        
        $sql = "INSERT INTO informes(ID_Docente, ID_Alumno, Titulo, Observaciones, Fecha, Grado, Estado) 
        VALUES ('$idDocente', '$idAlumno', '$titulo', '$observaciones', '$fecha', '$grado', 1)";
        if(mysqli_query($conexion, $sql) === TRUE){
            header("Location: ../crearinforme.php?success=true");
        } else {
            header("Location: ../crearinforme.php?error=true");
        }
    }
?>