<?php
    include("../../BD/conexionbd.php");

    $id = $_GET['id'];
    $atributo = $_GET['atributo'];
    $txt = $_GET['txt'];

    switch($atributo) {
        case "nombre":
            $sql = "UPDATE alumnos SET Nombre = '$txt' WHERE ID_Alumno = $id";
            break;
        case "apellido":
            $sql = "UPDATE alumnos SET Apellido = '$txt' WHERE ID_Alumno = $id";
            break;
        case "fecha":
            $sql = "UPDATE alumnos SET Fecha_Nac = '$txt' WHERE ID_Alumno = $id";
            break;
        case "mail":
            $sql = "UPDATE alumnos SET Mail_Padres = '$txt' WHERE ID_Alumno = $id";
            break;
        case "celular":
            $sql = "UPDATE alumnos SET Celular_Padres = '$txt' WHERE ID_Alumno = $id";
            break;
        default:
            echo json_encode(['mensaje' => 'atributo no válido']);
            exit;
    }

    /*if ($atributo == "nombre") {
        $nombre = $_GET['txt'];
        $sql = "UPDATE alumnos
        SET Nombre = '$nombre'
        WHERE ID_Alumno = $id";
    }

    if ($atributo == "apellido") {
        $apellido = $_GET['txt'];
        $sql = "UPDATE alumnos
        SET Apellido = $apellido
        WHERE ID_Alumno = $id";
    }

    if ($atributo == "fecha") {
        $fecha = $_GET['txt'];
        $sql = "UPDATE alumnos
        SET Fecha_Nac = $fecha
        WHERE ID_Alumno = $id";
    }

    if($atributo == "mail") {
        $mail = $_GET['txt'];
        $sql = "UPDATE alumnos
        SET Mail_Padres = $mail
        WHERE ID_Alumno = $id";
    }

    if($atributo == "celular") {
        $celular = $_GET['txt'];
        $sql = "UPDATE alumnos
        SET Celular_Padres = $celular
        WHERE ID_Alumno = $id";
    }*/

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado == TRUE) {
        echo json_encode(['mensaje' => 'si']);
    }
?>