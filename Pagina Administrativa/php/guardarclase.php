<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        $nombre = $_POST['nombre'];
        $docente = $_POST['docenteID'];
        $alumnoID = $_POST['alumnoID'] ?? [];
        $diasVisibles = $_POST['diasVisibles'] ?? [];

        $sql = "INSERT INTO clase (ID_Docente, Nombre)
                VALUES ($docente, '$nombre')";
        
        if ($resultado = mysqli_query($conexion, $sql)) {
            $claseID = mysqli_insert_id($conexion);
            foreach ($diasVisibles as $dia) {
                $horarioDia = $dia['dia'];
                $horarioInicio = $dia['inicio'];
                $horarioFinal = $dia['final'];
                $horario .= substr($horarioDia, 0, 3) . '(' . $horarioInicio . '-' . $horarioFinal . '), ';
            }
            $horario = substr($horario, 0, -2);
            $sql = "UPDATE clase
                    SET horario = '$horario'
                    WHERE ID_Clase = $claseID";
            $resultado = mysqli_query($conexion, $sql);
            echo json_encode(["message" => "si"]);
        }

        if (!empty($alumnoID)) {
            foreach ($alumnoID as $id) {
                $sql = "INSERT INTO alumnos_clase (ID_Clase, ID_Alumno) VALUES ($claseID, $id)";
                $resultado = mysqli_query($conexion, $sql);
            }
        }
    } else {
        header("Location: ../../");
    }
?>