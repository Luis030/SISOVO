<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php"); 
        $cantidad = isset($_POST['filtro']) ? $_POST['filtro'] : 1;
        $sql = "SELECT 
        CONCAT(D.Nombre, ' ', D.Apellido) AS Nombre_Completo,
        COUNT(I.ID_Informe) AS Total_Informes
        FROM docentes D
        LEFT JOIN informes I ON D.ID_Docente = I.ID_Docente AND I.Estado = 1
        WHERE D.Estado = 1
        GROUP BY D.ID_Docente
        ORDER BY Total_Informes DESC";

        $result = mysqli_query($conexion, $sql);

        // Inicializar arrays para etiquetas
        $etiquetas = [];
        $valores = [];

        $otras = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Total_Informes'] < $cantidad) {
                //Se agrupa en otras si es es menor a cierta cantidad
                $otras += $row['Total_Informes'];
            } else {
                // Añadir el nombre y la cantidad al array
                $etiquetas[] = $row['Nombre_Completo'];
                $valores[] = (int)$row['Total_Informes']; 
            }
        }

        // Si hay patologías agrupadas como "Otras", añadirlas al array final
        if ($otras > 0) {
            $etiquetas[] = 'Otros';
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
