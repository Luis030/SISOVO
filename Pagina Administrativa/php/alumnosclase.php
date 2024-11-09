<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require_once("../../BD/conexionbd.php");

        $idclase = $_POST['id'];

        if($idclase){
            $sql = "SELECT A.ID_Alumno, A.Nombre, A.Apellido, A.Cedula, A.Fecha_nac, U.Correo AS Mail_Padres, Celular_Padres 
            FROM alumnos A, alumnos_clase AC, clase C, usuarios U 
            WHERE A.ID_Alumno = AC.ID_Alumno AND AC.ID_Clase = C.ID_Clase AND C.ID_Clase = $idclase AND AC.Estado = 1 AND A.ID_Usuario = U.ID_Usuario AND AC.Asistio IS NULL AND A.Estado = 1";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                $envio = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                echo json_encode($envio);
            } else {
                $data = [];
                echo json_encode($data);
            }
        }
    } else {
        header("Location: ../../");
    }