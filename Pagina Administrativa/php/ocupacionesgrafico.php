<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("../../BD/conexionbd.php"); 

        $sql = "SELECT O.Nombre, COUNT(*) AS Cantidad FROM ocupacion O JOIN especializaciones E on E.ID_Ocupacion=O.ID_Ocupacion JOIN especializacion_docente ED on E.ID_Especializacion=ED.ID_Especializacion WHERE ED.Estado=1 AND O.Estado=1 AND E.Estado=1 GROUP by 1;";

        $result = mysqli_query($conexion, $sql);

        // Inicializar arrays para etiquetas
        $etiquetas = [];
        $valores = [];

        $otras = 0;


        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Cantidad'] < 1) {
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
