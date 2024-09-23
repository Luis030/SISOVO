<?php
include("../../BD/conexionbd.php");

header('Content-Type: application/json');

// Leer los datos JSON enviados en la solicitud
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['items'])) {
    $patologias = $data['items'];
    $errores = [];
    $patologiasAgregadas = 0;

    foreach ($patologias as $patologia) {
        $consulta = mysqli_prepare($conexion, "SELECT ID_Patologia FROM patologias WHERE Nombre = ?");
        mysqli_stmt_bind_param($consulta, 's', $patologia);
        mysqli_stmt_execute($consulta);
        mysqli_stmt_store_result($consulta);

        if (mysqli_stmt_num_rows($consulta) > 0) {
            $errores[] = "La patología '$patologia' ya existe.";
        } else {
            $insertar = mysqli_prepare($conexion, "INSERT INTO patologias (Nombre) VALUES (?)");
            mysqli_stmt_bind_param($insertar, 's', $patologia);
            if (!mysqli_stmt_execute($insertar)) {
                $errores[] = "Error al insertar '$patologia': " . mysqli_error($conexion);
            } else {
                $patologiasAgregadas++;
            }
            mysqli_stmt_close($insertar);
        }

        mysqli_stmt_close($consulta);
    }

    if (count($errores) > 0) {
        if ($patologiasAgregadas > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Se añadieron parcialmente las patologías',
                'errors' => $errores
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No se pudieron añadir las patologías.',
                'errors' => $errores
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Todas las patologías se insertaron correctamente.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se recibieron patologías'
    ]);
}
?>
