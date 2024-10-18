<?php
include 'conexionbd.php';


$sql = "SELECT P.Nombre, COUNT(PA.ID_Alumno) AS Cantidad
        FROM Patologias P
        JOIN patologia_alumno PA ON P.ID_Patologia = PA.ID_Patologia JOIN alumnos A on A.ID_Alumno=PA.ID_Alumno WHERE A.Estado=1
        GROUP BY P.Nombre";

$result = mysqli_query($conexion, $sql);


$datos = [];
$otras = ['nombre' => 'Otras', 'cantidad' => 0];

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Cantidad'] < 7) {
        $otras['cantidad'] += $row['Cantidad'];
    } else {
        $datos[] = [
            'nombre' => $row['Nombre'],
            'cantidad' => $row['Cantidad']
        ];
    }
}

// Si hay patologías que se agruparon en "Otras", se añaden al array final
if ($otras['cantidad'] > 0) {
    $datos[] = $otras;
}

mysqli_close($conexion);


header('Content-Type: application/json');
echo json_encode($datos);
?>
