<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cantidadA = isset($_POST['cantidadA']) ? $_POST['cantidadA'] : 1;
    include("../../BD/conexionbd.php"); 

    $sql = "SELECT P.Nombre, COUNT(PA.ID_Alumno) AS Cantidad 
    FROM patologias P 
    JOIN patologia_alumno PA ON P.ID_Patologia = PA.ID_Patologia AND PA.Estado = 1 
    GROUP BY P.Nombre";

    $result = mysqli_query($conexion, $sql);

    // Inicializar arrays para etiquetas
    $etiquetas = [];
    $valores = [];

    $otras = 0;


    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Cantidad'] < $cantidadA) {
            //Se agrupa en otras si es es menor a cierta cantidad
            $otras += $row['Cantidad'];
        } else {
            // Añadir el nombre y la cantidad al array
            $etiquetas[] = $row['Nombre'];
            $valores[] = (int)$row['Cantidad']; 
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
} else {
    header("Location: ../../");
}
?>
