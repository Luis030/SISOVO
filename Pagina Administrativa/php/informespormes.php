<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php"); 
        if(isset($_POST['primermes']) && isset($_POST['segundomes'])) {
            $primermes = $_POST['primermes'];
            $segundomes = $_POST['segundomes'];
            $sql = "SELECT 
                        UPPER(MONTHNAME(Fecha)) AS nombre_mes,
                        COUNT(*) AS cantidad_informes
                    FROM 
                        informes
                    WHERE 
                        DATE_FORMAT(Fecha, '%Y-%m') BETWEEN '$primermes' AND '$segundomes'
                    GROUP BY 
                        nombre_mes
                    ORDER BY 
                        MONTH(Fecha)";
        } else if (isset($_GET['nmes'])) {
            $meses = $_GET['nmes'];
            $numero = (int)$meses;
            $sql = "SELECT 
                UPPER(MONTHNAME(Fecha)) AS nombre_mes,
                COUNT(*) AS cantidad_informes
            FROM 
                informes
            WHERE 
                Fecha >= DATE_SUB(CURDATE(), INTERVAL $numero MONTH)
            GROUP BY 
                nombre_mes
            ORDER BY 
                Fecha;";
        } else {
            $sql = "SELECT 
                    UPPER(MONTHNAME(Fecha)) AS nombre_mes,
                    COUNT(*) AS cantidad_informes
                FROM 
                    informes
                WHERE 
                    Fecha >= DATE_SUB(CURDATE(), INTERVAL 9 MONTH)
                GROUP BY 
                    nombre_mes
                ORDER BY 
                    Fecha;";
        }
        mysqli_query($conexion, "SET lc_time_names = 'es_ES'");
        $result = mysqli_query($conexion, $sql);

        $etiquetas = [];
        $valores = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $etiquetas[] = $row['nombre_mes'];
            $valores[] = (int)$row['cantidad_informes'];
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
