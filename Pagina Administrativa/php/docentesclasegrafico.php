<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php"); 

    $sql = "SELECT 
    CONCAT(d.Nombre, ' ', d.Apellido) AS Nombre_Completo,
    COUNT(c.ID_Clase) AS Total_Clases
    FROM docentes d
    JOIN clase c ON d.ID_Docente = c.ID_Docente AND c.Estado = 1
    WHERE d.Estado = 1
    GROUP BY d.ID_Docente
    ORDER BY Total_Clases DESC;
    ";

    $result = mysqli_query($conexion, $sql);

    // Inicializar arrays para etiquetas
    $etiquetas = [];
    $valores = [];

    $otras = 0;


    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Total_Clases'] < 1) {
            //Se agrupa en otras si es es menor a cierta cantidad
            $otras += $row['Total_Clases'];
        } else {
            // Añadir el nombre y la cantidad al array
            $etiquetas[] = $row['Nombre_Completo'];
            $valores[] = (int)$row['Total_Clases']; 
        }
    }

    // Si hay patologías agrupadas como "Otras", añadirlas al array final
    if ($otras > 0) {
        $etiquetas[] = 'Otras';
        $valores[] = $otras;
    }

    mysqli_close($conexion);
    $datos = [
        'etiquetas' => $etiquetas,
        'valores' => $valores
    ];
    header('Content-Type: application/json');
    echo json_encode($datos);
}
?>
