<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");

    header('Content-Type: application/json');

    // Leer los datos JSON enviados en la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['items'])) {
        $ocupaciones = $data['items'];
        $errores = [];
        $ocupacionesAgregadas = 0;

        foreach ($ocupaciones as $ocupacion) {
            $consulta = mysqli_prepare($conexion, "SELECT ID_Ocupacion FROM ocupacion WHERE Nombre = ? AND Estado = 1");
            mysqli_stmt_bind_param($consulta, 's', $ocupacion);
            mysqli_stmt_execute($consulta);
            mysqli_stmt_store_result($consulta);

            if (mysqli_stmt_num_rows($consulta) > 0) {
                $errores[] = "La patología '$ocupacion' ya existe.";
            } else {
                $insertar = mysqli_prepare($conexion, "INSERT INTO ocupacion (Nombre) VALUES (?)");
                mysqli_stmt_bind_param($insertar, 's', $ocupacion);
                if (!mysqli_stmt_execute($insertar)) {
                    $errores[] = "Error al insertar '$ocupacion': " . mysqli_error($conexion);
                } else {
                    $ocupacionesAgregadas++;
                }
                mysqli_stmt_close($insertar);
            }

            mysqli_stmt_close($consulta);
        }

        if (count($errores) > 0) {
            if ($ocupacionesAgregadas > 0) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Se añadieron parcialmente las ocupaciones',
                    'errors' => $errores
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No se pudieron añadir las ocupaciones.',
                    'errors' => $errores
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Todas las ocupaciones se insertaron correctamente.'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se recibieron ocupaciones'
        ]);
    }
} else {
    header("Location: ../../");
}
?>
