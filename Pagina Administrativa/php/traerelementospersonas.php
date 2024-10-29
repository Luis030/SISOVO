<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require_once("../../BD/conexionbd.php");

        $id = $_POST['id'];

        if (isset($_POST['alumno'])) {
            $sql = "SELECT P.Nombre, PA.ID_Patologia
            FROM patologias P, patologia_alumno PA
            WHERE P.ID_Patologia = PA.ID_Patologia AND PA.ID_Alumno = $id AND PA.Estado = 1";
            $resultado = mysqli_query($conexion, $sql);
        }
        
        if (isset($_POST['docente'])) {
            $sql = "SELECT E.Nombre, ED.ID_Especializacion
            FROM especializaciones E, especializacion_docente ED
            WHERE E.ID_Especializacion = ED.ID_Especializacion AND ED.ID_Docente = $id AND ED.Estado = 1";
            $resultado = mysqli_query($conexion, $sql);
        }

        if ($resultado) {
            $quedio = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($quedio);
        }
    } else {
        header("Location: ../../");
    }
?>