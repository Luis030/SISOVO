<?php
   ini_set('session.cookie_httponly', 1);
   if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
       ini_set('session.cookie_secure', 1);
   }
   ini_set('session.use_strict_mode', 1);
   
   session_start();

   include("../BD/conexionbd.php");
   
   $password = $_POST['pass'];
   $cedula = $_POST['cedula'];
   
   $stmt = mysqli_prepare($conexion, "SELECT Contraseña, Tipo, Nombre FROM usuarios WHERE Cedula = ? AND Estado = 1");
   mysqli_stmt_bind_param($stmt, "s", $cedula); // "s" indica que el parámetro es una cadena
   mysqli_stmt_execute($stmt);
   $resultado = mysqli_stmt_get_result($stmt);
   
   if(mysqli_num_rows($resultado) > 0){
       $fila = mysqli_fetch_assoc($resultado);
       $contraencriptada = $fila['Contraseña'];
       
       if(password_verify($password, $contraencriptada)){
           session_regenerate_id(true);
           $_SESSION['verificacion'] = true;
           $_SESSION['cedula'] = $cedula;
           $_SESSION['Privilegio'] = strtolower($fila['Tipo']);
           $_SESSION['usuario'] = $fila['Nombre'];
           header("Location: ../index");
           exit();
       } else {
           session_unset();
           session_destroy();
           header("Location: index?errorid=3");
           exit();
       }
   } else {
       session_unset();
       session_destroy();
       header("Location: index?errorid=3");
       exit();
   }
   
   mysqli_stmt_close($stmt);
?>
