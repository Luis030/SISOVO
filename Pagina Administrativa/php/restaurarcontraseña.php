<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        header('Content-Type: application/json');
        $con = $_POST['con'];
        $contraseña = '$2y$10$yBmjdWiQWAStb2MUykot5uvTvCjqRIsBKd6zLqgYqhYGCPNNc7r7y';
        if(password_verify($con, $contraseña)) {
            require_once("../../BD/conexionbd.php");
            include("funciones.php");
    
            $nombre = $_POST['nom'];
            $apellido = $_POST['ape'];
            $cedula = $_POST['ced'];
            $tipo = $_POST['tipo'];
            if(validarCedula($cedula)){
                if ($tipo == "docente") {
                    $contraseña = generarPassDoc($cedula, $nombre, $apellido);
                }
        
                if ($tipo == "alumno") {
                    $contraseña = generarPass($cedula);
                }
            } else {
                if ($tipo == "docente") {
                    $contraseña = generarPassDoc($cedula, $nombre, $apellido);
                }
        
                if ($tipo == "alumno") {
                    $contraseña = generarPass($cedula, true);
                }
            }
            
            
            $sql = "UPDATE usuarios 
                    SET Contraseña = '$contraseña'
                    WHERE Cedula = $cedula";
            $resultado = mysqli_query($conexion, $sql);
    
            if ($resultado) {
                echo json_encode([
                    "estado" => "restaurada"
                ]);
            }
    
            exit;
        } else {
            echo json_encode([
                "estado" => "incorrecta"
            ]);
            exit;
        }
    } else {
        header("Location: ../../");
    }
?>