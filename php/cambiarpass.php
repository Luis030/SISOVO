<?php
require_once("../BD/conexionbd.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_SESSION['cedula']; 
    $contrasena_antigua = $_POST['viejapass'];
    $contrasena_nueva = $_POST['nuevapass'];
    $contrasena_nueva_confirmacion = $_POST['nuevapassconfirm'];

    // Validaciones
    if (strlen($contrasena_nueva) < 8 || strlen($contrasena_nueva) > 20) {
        header("Location:../ajustes?errorid=4");
        exit;
    }

    if (preg_match('/[\'"<>\\\\]/', $contrasena_nueva)) {
        header("Location:../ajustes?errorid=5"); 
        exit;
    }

    if ($contrasena_nueva !== $contrasena_nueva_confirmacion) {
        header("Location:../ajustes?errorid=1"); 
        exit;
    }

    $query = "SELECT Contraseña FROM usuarios WHERE Cedula = ?";
    if ($consulta = mysqli_prepare($conexion, $query)) {
        mysqli_stmt_bind_param($consulta, "s", $cedula);
        mysqli_stmt_execute($consulta);
        mysqli_stmt_store_result($consulta);

        if (mysqli_stmt_num_rows($consulta) > 0) {
            mysqli_stmt_bind_result($consulta, $db_contraseña);
            mysqli_stmt_fetch($consulta);
            if (password_verify($contrasena_antigua, $db_contraseña)) {
                $contrasena_nueva_hash = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
                $query_update = "UPDATE usuarios SET Contraseña = ? WHERE Cedula = ?";
                if ($consulta_update = mysqli_prepare($conexion, $query_update)) {
                    mysqli_stmt_bind_param($consulta_update, "ss", $contrasena_nueva_hash, $cedula);
                    if (mysqli_stmt_execute($consulta_update)) {
                        header("Location:../ajustes?successp=true"); 
                        exit;
                    } else {
                        header("Location:../ajustes?errorid=2"); 
                        exit;
                    }
                } else {
                    header("Location:../ajustes?errorid=2"); 
                    exit;
                }
            } else {
                header("Location:../ajustes?errorid=3"); 
                exit;
            }
        } else {
            echo "Usuario no encontrado.";
        }

        mysqli_stmt_close($consulta); 
    } else {
        header("Location:../ajustes?errorid=2"); 
        exit;
    }
}

mysqli_close($conexion);
?>
