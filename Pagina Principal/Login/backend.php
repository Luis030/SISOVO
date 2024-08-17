<?php
    session_start();

    include("../../BD/conexionbd.php");

    $password = $_POST['pass'];
    $cedula = $_POST['cedula'];

    $verificarusuario = "SELECT Contraseña, Tipo, Nombre FROM usuarios WHERE Cedula='$cedula'";
    $resultado = $conexion->query($verificarusuario);
    if($resultado->num_rows > 0){
        while($fila = $resultado->fetch_assoc()){
            $contraencriptada = $fila['Contraseña'];
            $_SESSION['Privilegio'] = strtolower($fila['Tipo']);
            $_SESSION['usuario'] = $fila['Nombre'];
        }
        if(password_verify($password, $contraencriptada)){
            $_SESSION['verificacion'] = true;
            header("Location: ../Main/index.php");
        } else {
            $_SESSION['usuario'] = null;
            $_SESSION['Privilegio'] = null;
            echo "<div>";
            echo "Usuario o contraseña invalida";
            echo "</br>";
            echo "<a href='index.php'>Volver</a>";
            echo "</div>";
        }
    }
    
    
    
    
    /*$consultadocente = "SELECT U.Nombre, Tipo FROM usuarios U, docentes D WHERE U.ID_Usuario=D.ID_Usuario AND D.Cedula='$cedula' AND U.Contraseña='$password'";
    $consultaalumno = "SELECT U.Nombre, Tipo FROM usuarios U, alumnos A WHERE U.ID_Usuario=A.ID_Usuario AND A.Cedula='$cedula' AND U.Contraseña='$password'";
    $enviardocente = $conexion->query($consultadocente);
    if($enviardocente->num_rows > 0){
        while($row = $enviardocente->fetch_assoc()){
            $_SESSION['Privilegio'] = strtolower($row["Tipo"]);
            $_SESSION['usuario'] = $row["Nombre"];
            $_SESSION['verificacion'] = true;
        }
        header("Location: ../Main/index.php");
    } else {
        $enviaralumno = $conexion->query($consultaalumno);
        if($enviaralumno->num_rows > 0){
            while($row = $enviaralumno->fetch_assoc()){
                $_SESSION['Privilegio'] = strtolower($row["Tipo"]);
                $_SESSION['usuario'] = $row["Nombre"];
                $_SESSION['verificacion'] = true;
            }
            header("Location: ../Main/index.php");
        } else {
            echo "<div>";
            echo "Usuario o contraseña invalida";
            echo "</br>";
            echo "<a href='index.php'>Volver</a>";
            echo "</div>";
        }
    }
*/
    




    /*$usuario = $_POST['user'];*/


    /*$password = $_POST['pass'];
    $cedula = $_POST['cedula'];
    $corroborrar = "SELECT * FROM usuarios where Cedula='$cedula' and Contraseña='$password';";
    $enviar = $conexion->query($corroborrar);

    if($enviar->num_rows > 0){
        while($row = $enviar->fetch_assoc()){
            $_SESSION['Privilegio'] = strtolower($row["Tipo"]);
            $_SESSION['usuario'] = $row["Nombre"];
            $_SESSION['verificacion'] = true;
        }
        header("Location: ../Main/index.php");
    } else {
        echo "<div>";
        echo "Usuario o contraseña invalida";
        echo "</br>";
        echo "<a href='index.php'>Volver</a>";
        echo "</div>";
    }*/

    
    /*$consultaLogin = "SELECT Nombre FROM usuarios where Nombre='$usuario' and Contraseña='$password';";
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
    }  */
?>