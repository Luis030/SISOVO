<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        $id = $_POST['id'];
        $atributo = $_POST['atributo'];
        $txt = $_POST['txt'];
        $tipo = $_POST['tipo'];

        if ($tipo == "alumno") {
            switch($atributo) { 
                case "nombre":
                    $con = "SELECT Apellido, ID_Usuario FROM alumnos WHERE ID_Alumno = $id";
                    $conEnviada = mysqli_query($conexion, $con);
                    $filas = mysqli_fetch_assoc($conEnviada);
                    $apellidoA = $filas["Apellido"];
                    $idU = $filas['ID_Usuario'];
                    $sql = "UPDATE alumnos SET Nombre = '$txt' WHERE ID_Alumno = $id";
                    break;
                case "apellido":
                    $con = "SELECT Nombre, ID_Usuario FROM alumnos WHERE ID_Alumno = $id";
                    $conEnviada = mysqli_query($conexion, $con);
                    $filas = mysqli_fetch_assoc($conEnviada);
                    $nombreA = $filas["Nombre"];
                    $idU = $filas['ID_Usuario'];
                    $sql = "UPDATE alumnos SET Apellido = '$txt' WHERE ID_Alumno = $id";
                    break;
                case "fecha":
                    $sql = "UPDATE alumnos SET Fecha_Nac = '$txt' WHERE ID_Alumno = $id";
                    break;
                case "mail":
                    $sql = "SELECT ID_Usuario FROM alumnos WHERE ID_Alumno = $id";
                    $resultado = mysqli_query($conexion, $sql);
                    $filas = mysqli_fetch_assoc($resultado);
                    $iduser = $filas['ID_Usuario'];
                    $sql = "UPDATE usuarios SET Correo = '$txt' WHERE ID_Usuario = $iduser";
                    break;
                case "celular":
                    $sql = "UPDATE alumnos SET Celular_Padres = '$txt' WHERE ID_Alumno = $id";
                    break;
                case "grado":
                    $sql = "UPDATE alumnos SET Grado = '$txt' WHERE ID_Alumno = $id";
                    break;
                default:
                    echo json_encode(['mensaje' => 'atributo no válido']);
                    exit;
            }
        }

        if ($tipo == "docente") {
            switch($atributo) {
                case "nombre":
                    $con = "SELECT Apellido, ID_Usuario FROM docentes WHERE ID_Docente = $id";
                    $conEnviada = mysqli_query($conexion, $con);
                    $filas = mysqli_fetch_assoc($conEnviada);
                    $apellidoD = $filas["Apellido"];
                    $idU = $filas['ID_Usuario'];
                    $sql = "UPDATE docentes SET Nombre = '$txt' WHERE ID_Docente = $id";
                    break;
                case "apellido":
                    $con = "SELECT Nombre, ID_Usuario FROM docentes WHERE ID_Docente = $id";
                    $conEnviada = mysqli_query($conexion, $con);
                    $filas = mysqli_fetch_assoc($conEnviada);
                    $nombreD = $filas["Nombre"];
                    $idU = $filas['ID_Usuario'];
                    $sql = "UPDATE docentes SET Apellido = '$txt' WHERE ID_Docente = $id";
                    break;
                case "fecha":
                    $sql = "UPDATE docentes SET Fecha_Nac = '$txt' WHERE ID_Docente = $id";
                    break;
                case "mail":
                    $sql = "SELECT ID_Usuario FROM docentes WHERE ID_Docente=$id";
                    $resultado = mysqli_query($conexion, $sql);
                    $filas = mysqli_fetch_assoc($resultado);
                    $iduser = $filas['ID_Usuario'];
                    $sql = "UPDATE usuarios SET Correo = '$txt' WHERE ID_Usuario = $iduser";
                    break;
                case "celular":
                    $sql = "UPDATE docentes SET Celular = '$txt' WHERE ID_Docente = $id";
                    break;
                case "ocupacion":
                    $sql = "SELECT Nombre FROM ocupacion WHERE ID_Ocupacion = '$txt'";
                    $resultado2 = mysqli_query($conexion, $sql);
                    while($columna = mysqli_fetch_assoc($resultado2)) {
                        $nombreOcu = $columna['Nombre'];
                    }
                    break;
                default:
                    echo json_encode(['mensaje' => 'atributo no válido']);
                    exit;
            }
        }

        $resultado = mysqli_query($conexion, $sql);

        if (isset($apellidoA)) {
            $todoNombre = $txt . " " . $apellidoA;
            $sql = "UPDATE usuarios SET Nombre = '$todoNombre' WHERE ID_Usuario = $idU";
            $resultado = mysqli_query($conexion, $sql);  
        }

        if (isset($nombreA)) {
            $todoNombre = $nombreA . " " . $txt;
            $sql = "UPDATE usuarios SET Nombre = '$todoNombre' WHERE ID_Usuario = $idU";
            $resultado = mysqli_query($conexion, $sql); 
        }

        if (isset($apellidoD)) {
            $todoNombre = $txt . " " . $apellidoD;
            $sql = "UPDATE usuarios SET Nombre = '$todoNombre' WHERE ID_Usuario = $idU";
            $resultado = mysqli_query($conexion, $sql);  
        }

        if (isset($nombreD)) {
            $todoNombre = $nombreD . " " . $txt;
            $sql = "UPDATE usuarios SET Nombre = '$todoNombre' WHERE ID_Usuario = $idU";
            $resultado = mysqli_query($conexion, $sql); 
        }

        if (isset($nombreOcu)) {
            $sql3 = "SELECT ID_Especializacion FROM especializacion_docente WHERE ID_Docente = $id AND Estado = 1";
            $resultado3 = mysqli_query($conexion, $sql3);
            if (mysqli_num_rows($resultado3) > 0) {
                echo json_encode(['mensaje' => 'no', 'invalido' => "Elimine las especialidades del docente antes de cambiar su ocupación."]);
                exit;
            } else {
                $sql4 = "UPDATE docentes SET ID_Ocupacion = '$txt' WHERE ID_Docente = $id";
                $resultado4 = mysqli_query($conexion, $sql4);
                echo json_encode(['mensaje' => 'si', 'nombre' => $nombreOcu]);
                exit;
            }
        } else {
            echo json_encode(['mensaje' => 'si']);
        }
    } else {
        header("Location: ../../");
    }
?>