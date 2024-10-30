<?php
    include("../../BD/conexionbd.php");

    $idclase = $_POST['idclase'];

    $sql = "SELECT C.ID_Clase, D.ID_Docente, C.Nombre, CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, C.Horario AS Horarios, COUNT(AC.ID_Alumno) AS Cantidad_Alumnos 
            FROM clase C JOIN docentes D ON C.ID_Docente = D.ID_Docente 
            LEFT JOIN alumnos_clase AC ON C.ID_Clase = AC.ID_Clase AND AC.Estado = 1 AND AC.Asistio IS NULL 
            WHERE C.Estado = 1 AND C.ID_Clase = $idclase GROUP BY C.ID_Clase";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datosClase['ID_Docente'] = $fila['ID_Docente'];
            $datosClase['Docente'] = $fila['Docente'];
            $datosClase['Nombre'] = $fila['Nombre'];
            $datosClase['Dia'] = $fila['Horarios'];
            $cantidadAlumnos = $fila['Cantidad_Alumnos'];
        }
    }
    echo json_encode([
        "nombre" => $datosClase['Nombre'],
        "docente" => $datosClase['Docente'],
        "dia" => $datosClase['Dia'],
        "cant" => $cantidadAlumnos
    ]);
?>