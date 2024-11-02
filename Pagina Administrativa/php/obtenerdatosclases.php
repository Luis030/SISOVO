<?php
    include("../../BD/conexionbd.php");

    $idclase = $_POST['idclase'];

    $datosClase = [];

    $sql = "SELECT C.Nombre, C.ID_Docente, CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, Horario, (SELECT COUNT(*) FROM alumnos_clase WHERE ID_Clase = $idclase AND Estado = 1) AS Cantidad 
            FROM clase C
            JOIN docentes D ON C.ID_Docente = D.ID_Docente 
            WHERE C.ID_Clase = $idclase";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datosClase['ID_Docente'] = $fila['ID_Docente'];
            $datosClase['Docente'] = $fila['Docente'];
            $datosClase['Nombre'] = $fila['Nombre'];
            $datosClase['Dia'] = $fila['Horario'];
            $cantidadAlumnos = $fila['Cantidad'];
        }
    }
    echo json_encode([
        "nombre" => $datosClase['Nombre'],
        "docente" => $datosClase['Docente'],
        "dia" => $datosClase['Dia'],
        "cant" => $cantidadAlumnos
    ]);
?>