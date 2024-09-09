<?php
include("../../BD/conexionbd.php");

header('Content-Type: application/json');

// Leer los datos JSON enviados en la solicitud
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['items'])) {
    $especialidades = $data['items'];
    $errores = [];
    $especialidadesAgregadas = 0;

    foreach ($especialidades as $especialidad) {
        $consulta = mysqli_prepare($conexion, "SELECT ID_Especializacion FROM Especializaciones WHERE Nombre = ?");
        mysqli_stmt_bind_param($consulta, 's', $especialidad);
        mysqli_stmt_execute($consulta);
        mysqli_stmt_store_result($consulta);

        if (mysqli_stmt_num_rows($consulta) > 0) {
            $errores[] = "La especialidad '$especialidad' ya existe.";
        } else {
            $insertar = mysqli_prepare($conexion, "INSERT INTO Especializaciones (Nombre) VALUES (?)");
            mysqli_stmt_bind_param($insertar, 's', $especialidad);
            if (!mysqli_stmt_execute($insertar)) {
                $errores[] = "Error al insertar '$especialidad': " . mysqli_error($conexion);
            } else {
                $especialidadesAgregadas++;
            }
            mysqli_stmt_close($insertar);
        }

        mysqli_stmt_close($consulta);
    }

    if (count($errores) > 0) {
        if ($especialidadesAgregadas > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Se añadieron parcialmente las especialidades',
                'errors' => $errores
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No se pudieron añadir las especialidades.',
                'errors' => $errores
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Todas las especialidades se insertaron correctamente.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se recibieron especialidades'
    ]);
}
?>
