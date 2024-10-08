<?php
require_once("../../BD/conexionbd.php");

header('Content-Type: application/json');  
if(isset($_GET['docente'])){
    $ceduladoc = $_GET['docente'];
    $sql = "SELECT C.ID_Clase, D.ID_Docente, CONCAT(D.Nombre,' ', D.Apellido) AS Docente, C.Nombre AS Nombre, Horario AS Horarios, COUNT(DISTINCT AC.ID_Alumno) AS Cantidad_Alumnos FROM docentes D JOIN clase C on D.ID_Docente=C.ID_Docente JOIN alumnos_clase AC ON AC.ID_Clase=C.ID_Clase WHERE C.Estado=1 AND D.Cedula=56777350 GROUP BY C.ID_Clase;
";
} else {
    $sql = "SELECT c.ID_Clase, c.ID_Docente, CONCAT(d.Nombre, ' ', d.Apellido) AS Docente, c.Nombre, c.Horario AS Horarios, COUNT(DISTINCT ac.ID_Alumno) AS Cantidad_Alumnos FROM clase c LEFT JOIN docentes d ON c.ID_Docente = d.ID_Docente LEFT JOIN alumnos_clase ac ON c.ID_Clase = ac.ID_Clase GROUP BY c.ID_Clase ORDER BY c.ID_Clase;
";
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
