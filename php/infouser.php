<?php
    require_once("../BD/conexionbd.php");
    session_start();

    $cedula = $_SESSION['cedula'];
    $tipouser = $_SESSION['Privilegio'];
    $sql = "";
    $stmt = null;

    switch ($tipouser) {
        case "alumno":
            $sql = "SELECT A.ID_Alumno, A.Nombre, A.Apellido, A.Cedula, A.Fecha_Nac, U.Correo AS Mail_Padres, A.Celular_Padres FROM alumnos A JOIN usuarios U ON A.ID_Usuario = U.ID_Usuario WHERE A.Cedula = ? AND A.Estado = 1";
            $stmt = mysqli_prepare($conexion, $sql); 
            mysqli_stmt_bind_param($stmt, "s", $cedula);  
            break;
        case "docente":
            $sql = "SELECT D.ID_Docente, D.Nombre, D.Apellido, D.Cedula, D.Fecha_Nac, U.Correo AS Mail FROM docentes D JOIN usuarios U ON D.ID_Usuario = U.ID_Usuario WHERE D.Cedula = ? AND D.Estado = 1";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "s", $cedula); 
            break;
        case "admin":
            $sql = "SELECT Nombre, Correo AS Mail, Tipo FROM usuarios WHERE Cedula = ? AND Estado = 1";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "s", $cedula); 
            break;
        default:
            echo json_encode(["error" => "Tipo de usuario no válido."]);
            exit;
    }

    if ($stmt) {
        mysqli_stmt_execute($stmt);  
        $resultado = mysqli_stmt_get_result($stmt);
        
        if ($resultado) {
            $informacion = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($informacion);
        } else {
            echo json_encode(["error" => "Error en la consulta SQL: " . mysqli_error($conexion)]);
        }

        mysqli_stmt_close($stmt); 
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    }
?>
