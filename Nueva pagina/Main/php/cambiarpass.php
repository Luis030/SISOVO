<?php
require_once("../../../BD/conexionbd.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_SESSION['cedula']; 
    $contrasena_antigua = $_POST['viejapass'];
    $contrasena_nueva = $_POST['nuevapass'];
    $contrasena_nueva_confirmacion = $_POST['nuevapassconfirm'];

    if (strlen($contrasena_nueva) < 8 || strlen($contrasena_nueva) > 20) {
        header("Location:../ajustes.php?errorid=4");
        exit;
    }

    if (preg_match('/[\'"<>\\\\]/', $contrasena_nueva)) {
        header("Location:../ajustes.php?errorid=5"); 
        exit;
    }

    if ($contrasena_nueva !== $contrasena_nueva_confirmacion) {
        header("Location:../ajustes.php?errorid=1"); 
        exit;
    }

    $query = "SELECT contraseña FROM usuarios WHERE cedula = ?";
    if ($consulta = $conexion->prepare($query)) {
        $consulta->bind_param("s", $cedula);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($contrasena_antigua, $usuario['contraseña'])) {
                $contrasena_nueva_hash = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
                $query_update = "UPDATE usuarios SET contraseña = ? WHERE cedula = ?";
                if ($consulta_update = $conexion->prepare($query_update)) {
                    $consulta_update->bind_param("ss", $contrasena_nueva_hash, $cedula);
                    if ($consulta_update->execute()) {
                        header("Location:../ajustes.php?success=true"); 
                        exit;
                    } else {
                        header("Location:../ajustes.php?errorid=2"); 
                        exit;
                    }
                } else {
                    header("Location:../ajustes.php?errorid=2"); 
                    exit;
                }
            } else {
                header("Location:../ajustes.php?errorid=3"); 
                exit;
            }
        } else {
            echo "Usuario no encontrado.";
        }

        $consulta->close(); 
    } else {
        header("Location:../ajustes.php?errorid=2"); 
        exit;
    }
}

mysqli_close($conexion);
?>
