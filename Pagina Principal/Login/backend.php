<?php
   session_start();
   include("../../BD/conexionbd.php");
   
   $password = $_POST['pass'];
   $cedula = $_POST['cedula'];
   
   $stmt = mysqli_prepare($conexion, "SELECT Contraseña, Tipo, Nombre FROM usuarios WHERE Cedula = ?");
   mysqli_stmt_bind_param($stmt, "s", $cedula); // "s" indica que el parámetro es una cadena
   mysqli_stmt_execute($stmt);
   $resultado = mysqli_stmt_get_result($stmt);
   
   if(mysqli_num_rows($resultado) > 0){
       while($fila = mysqli_fetch_assoc($resultado)){
           $contraencriptada = $fila['Contraseña'];
           $_SESSION['Privilegio'] = strtolower($fila['Tipo']);
           $_SESSION['usuario'] = $fila['Nombre'];
       }
       if(password_verify($password, $contraencriptada)){
           $_SESSION['verificacion'] = true;
           $_SESSION['cedula'] = $cedula;
           header("Location: ../Main/index");
       } else {
           $_SESSION['usuario'] = null;
           $_SESSION['Privilegio'] = null;
           header("Location:index?errorid=3");
       }
   } else {
       header("Location:index?errorid=3");
   }
   
   mysqli_stmt_close($stmt);
?>
