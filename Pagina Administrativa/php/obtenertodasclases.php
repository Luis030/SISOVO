<?php
require_once("../../BD/conexionbd.php");

header('Content-Type: application/json');  
if(isset($_GET['docente'])){
    $ceduladoc = $_GET['docente'];
    $sql = "SELECT c.ID_Clase, d.ID_Docente, CONCAT(d.Nombre, ' ', d.Apellido) AS Docente, c.Nombre AS Nombre, 
GROUP_CONCAT(DISTINCT CONCAT( SUBSTRING(dc.Dia, 1, 3), ' (', LPAD(dc.Inicio, 5, '0'), ' - ', LPAD(dc.Final, 5, '0'), ')' ) SEPARATOR ', ') AS Horarios, 
COUNT(DISTINCT ac.ID_Alumno) AS Cantidad_Alumnos 
FROM clase c JOIN docentes d ON c.ID_Docente = d.ID_Docente 
JOIN dias_clase dc ON c.ID_Clase = dc.ID_Clase 
LEFT JOIN alumnos_clase ac ON c.ID_Clase = ac.ID_Clase WHERE c.Estado=1 AND d.Cedula=$ceduladoc GROUP BY c.ID_Clase, d.ID_Docente;";
} else {
    $sql = "SELECT c.ID_Clase, d.ID_Docente, CONCAT(d.Nombre, ' ', d.Apellido) AS Docente, c.Nombre AS Nombre, 
GROUP_CONCAT(DISTINCT CONCAT( SUBSTRING(dc.Dia, 1, 3), ' (', LPAD(dc.Inicio, 5, '0'), ' - ', LPAD(dc.Final, 5, '0'), ')' ) SEPARATOR ', ') AS Horarios, 
COUNT(DISTINCT ac.ID_Alumno) AS Cantidad_Alumnos 
FROM clase c JOIN docentes d ON c.ID_Docente = d.ID_Docente 
JOIN dias_clase dc ON c.ID_Clase = dc.ID_Clase 
LEFT JOIN alumnos_clase ac ON c.ID_Clase = ac.ID_Clase WHERE c.Estado=1 AND ac.Estado=1 GROUP BY c.ID_Clase, d.ID_Docente;";
}

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
