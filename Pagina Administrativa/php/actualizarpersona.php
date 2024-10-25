<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){


    include("../../BD/conexionbd.php");

    $id = $_POST['id'];
    $atributo = $_POST['atributo'];
    $txt = $_POST['txt'];
    $tipo = $_POST['tipo'];

    if ($tipo == "alumno") {
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
    }

    if ($tipo == "docente") {
        switch($atributo) {
            case "nombre":
                $sql = "UPDATE docentes SET Nombre = '$txt' WHERE ID_Docente = $id";
                break;
            case "apellido":
                $sql = "UPDATE docentes SET Apellido = '$txt' WHERE ID_Docente = $id";
                break;
            case "fecha":
                $sql = "UPDATE docentes SET Fecha_Nac = '$txt' WHERE ID_Docente = $id";
                break;
            case "mail":
                $sql = "UPDATE docentes SET Mail = '$txt' WHERE ID_Docente = $id";
                break;
            case "celular":
                $sql = "UPDATE docentes SET Celular = '$txt' WHERE ID_Docente = $id";
                break;
            default:
                echo json_encode(['mensaje' => 'atributo no válido']);
                exit;
        }
    }

    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado == TRUE) {
        echo json_encode(['mensaje' => 'si']);
    }
} else {
    header("Location: ../../");
}
?>