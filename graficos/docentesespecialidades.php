<?php
include 'conexionbd.php';

$sql = "SELECT E.Nombre, COUNT(ED.ID_Docente) AS Cantidad
        FROM Especializaciones E
        JOIN especializacion_docente ED ON E.ID_Especializacion = ED.ID_Especializacion 
        JOIN Docentes D on D.ID_Docente = ED.ID_Docente 
        WHERE D.Estado = 1
        GROUP BY E.Nombre";

$result = mysqli_query($conexion, $sql);

$datos = [];
$otrasCantidad = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Cantidad'] < 1) {
        $otrasCantidad += $row['Cantidad'];
    } else {
        $datos['etiquetas'][] = $row['Nombre'];
        $datos['valores'][] = $row['Cantidad'];
    }
}

if ($otrasCantidad > 0) {
    $datos['etiquetas'][] = 'Otras';
    $datos['valores'][] = $otrasCantidad;
}

mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($datos);
?>
