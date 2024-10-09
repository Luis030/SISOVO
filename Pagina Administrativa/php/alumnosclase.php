<?php
require_once("../../BD/conexionbd.php");
$idclase = $_GET['id'];
if($idclase){
    $sql = "SELECT A.ID_Alumno, A.Nombre, A.Apellido, A.Cedula, A.Fecha_nac, A.Mail_Padres, Celular_Padres FROM Alumnos A, alumnos_clase AC, Clase C WHERE A.ID_Alumno=AC.ID_Alumno AND AC.ID_Clase=C.ID_Clase AND C.ID_Clase=$idclase AND AC.Estado=1";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        $envio = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($envio);
    }
}
