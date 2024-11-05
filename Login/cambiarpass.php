<?php
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['cambiarpass'])){
    header("Location: index.php");
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nuevacon = $_POST['nuevapass'];
    $nuevapassconf = $_POST['nuevapassconfirm'];

    if($nuevacon !== $nuevapassconf){
        header("Location: cambiarpass.php?errorid=1");
        exit;
    }

    if (strlen($nuevacon) < 8 || strlen($nuevacon) > 20) {
        header("Location: cambiarpass.php?errorid=2");
        exit;
    }

    if (preg_match('/[\'"<>\\\\]/', $nuevacon)) {
        header("Location:../ajustes?errorid=3"); 
        exit;
    }
    include("../BD/conexionbd.php");
    $usuario = $_SESSION['userid'];
    $nuevacontraseña = password_hash($nuevacon, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET Contraseña = ? WHERE ID_Usuario = ?";
    $consulta = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($consulta, "si", $nuevacontraseña, $usuario);
    if(mysqli_stmt_execute($consulta)){
        session_unset();
        $_SESSION['finalizado'] = true;
        header("Location: finalizado.php");
        exit;
    } else {
        header("Location: cambiarpass.php?errorid=4");
        exit;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="Diseño/recuperarpass.css">
</head>
<body>
    <div class="contenedor-cambiar-contrasena">
        <div class="contenedor-formulario-cambiar-contrasena">
            <form action="cambiarpass.php" method="post">
                <p>Nueva contraseña</p>
                <input type="password" name="nuevapass" required>
                <p>Confirmar contraseña</p>
                <input type="password" name="nuevapassconfirm" required>
                <button id="boton-confirmar-cambiar-pass">Confirmar</button>
            </form>
            <?php
            if(isset($_GET['errorid'])){
                $error = $_GET['errorid'];
                switch($error){
                    case '1':
                        echo "<span>Las contraseñas no coinciden</span>";
                        break;
                    case '2':
                        echo "<span>La contraseña debe tener entre 8 y 20 caracteres</span>";
                        break;
                    case '3':
                        echo "<span>La nueva contraseña contiene caracteres no permitidos (', \", <, >, \\).</span>";
                        break;
                    case '4':
                        echo "<span>Error en el servidor, intente mas tarde</span>";
                        break;
                }
            }
            ?>
        </div>
    </div>
</body>
</html>