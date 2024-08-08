<?php
    session_start();

    include("../../BD/conexionbd.php");

    $usuario = $_POST['user'];
    $password = $_POST['pass'];
    $consultaLogin = "SELECT Nombre FROM usuarios where Nombre='$usuario' and Contraseña='$password';";
    $enviarConsulta = $conexion->query($consultaLogin);

    if ($enviarConsulta->num_rows > 0) {
        $privilegio = "SELECT Nombre FROM usuarios where Nombre='$usuario' and Tipo='admin'";
        $enviarconsulta2 = $conexion->query($privilegio);
        if($enviarconsulta2->num_rows > 0){
            $_SESSION['Privilegio'] = "Admin";
        } else {
            $_SESSION['Privilegio'] = "Alumno";
        }
        $ver = true;
        $_SESSION["verificacion"] = $ver;
        $_SESSION["usuario"] = $usuario;
        header("Location: ../Main/index.php");
    } else {
        echo "<div>";
        echo "Usuario o contraseña invalida";
        echo "</br>";
        echo "<a href='index.php'>Volver</a>";
        echo "</div>";
    }  
?>