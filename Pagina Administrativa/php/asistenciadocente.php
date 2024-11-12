<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        $cedula = $_POST['cedula'];
        $tipo = $_POST['tipo'];

        $sql = "SELECT ID_Docente, Cedula 
                FROM docentes
                WHERE Cedula = '$cedula' AND Estado = 1;";

        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $idDocente = $fila['ID_Docente'];
            }
            $sql = "INSERT INTO lista_docente (ID_Docente, Fecha, Hora, Tipo)
                    VALUES ($idDocente, CURDATE(), CURTIME(), '$tipo')";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado == TRUE) {
                echo json_encode(['mensaje' => 'si']);
            }
        } else {
            echo json_encode(['mensaje' => 'no']);
        }
    } else {
        header("Location: ../../");
    }
?>