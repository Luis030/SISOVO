<?php
require_once("../../BD/conexionbd.php");

header('Content-Type: application/json');  

$sql = "SELECT C.ID_Clase, C.ID_Docente, D.Nombre AS docente, C.Nombre, C.Dia, DATE_FORMAT(C.Inicio, '%H:%i') AS hora_inicio, DATE_FORMAT(C.Final, '%H:%i') AS hora_final, COUNT(AC.ID_Alumno) AS cantidad
        FROM Clase C
        JOIN Docentes D ON C.ID_Docente = D.ID_Docente
        LEFT JOIN alumnos_clase AC ON C.ID_Clase = AC.ID_Clase
        GROUP BY C.ID_Clase;";

$resultado = mysqli_query($conexion, $sql);

$clases = array();
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $clases[] = $fila;
    }
}

// Verificar si hay algún error al convertir a JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Error al convertir a JSON']);
} else {
    echo json_encode($clases);
}

mysqli_close($conexion);  
?>
