<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");
        session_start();
        $cedulaDocente = $_SESSION['cedula'];
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $titulo = $_POST['informeTitulo'];
            $idAlumno = $_POST['alumnoIngresado'];
            $observaciones = $_POST['informeObservacion'];
            $grado = $_POST['informeGrado'];
            $sql = "SELECT ID_Docente from docentes WHERE Cedula = $cedulaDocente AND Estado = 1";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                while($fila = mysqli_fetch_assoc($resultado)){
                    $idDocente = $fila['ID_Docente'];
                }
            }
            
            $sql = "INSERT INTO informes(ID_Docente, ID_Alumno, Titulo, Observaciones, Estado, Grado) 
            VALUES ('$idDocente', '$idAlumno', '$titulo', '$observaciones', 1, '$grado')";
            if(mysqli_query($conexion, $sql) === TRUE) {
                $idInforme = mysqli_insert_id($conexion);
                $_SESSION['idInforme'] = $idInforme;
                echo $idInforme;
                $sql2 = "SELECT Cedula
                FROM alumnos
                WHERE ID_Alumno = '$idAlumno' AND Estado = 1;";
                $resultado2 = mysqli_query($conexion, $sql2);
                if($resultado2) {
                    while($fila = mysqli_fetch_assoc($resultado2)){
                        echo "hola";
                        $cedulaAlumno = $fila['Cedula'];
                    }
                    $_SESSION['cedulaAlumno'] = $cedulaAlumno;
                    header("Location: ../crearinforme.php?success=true");
                }
            } else {
                header("Location: ../crearinforme.php?error=true");
            }
        }
    } else {
        header("Location: ../../");
    }    
?>