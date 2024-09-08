<?php
include("../../BD/conexionbd.php");

// Asegúrate de que el contenido devuelto sea JSON
header('Content-Type: application/json');

// Leer los datos JSON enviados en la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si el array de patologías está presente en los datos
if (isset($data['patologias'])) {
    $patologias = $data['patologias'];
    $errores = [];

    foreach ($patologias as $patologia) {
        // Preparar la consulta SQL para insertar la patología
        $insertar = $conexion->prepare("INSERT INTO patologias (Nombre) VALUES (?)");
        $insertar->bind_param('s', $patologia);

        // Ejecutar la consulta y verificar si hubo errores
        if (!$insertar->execute()) {
            // Verificar si el error es por duplicado (código de error 1062)
            if ($conexion->errno == 1062) {
                $errores[] = "La patología '$patologia' ya existe.";
            } else {
                // Mensaje de error general si la inserción falla por otras razones
                $errores[] = "Error al insertar '$patologia': " . $conexion->error;
            }
        }

        // Cerrar la sentencia preparada
        $insertar->close();
    }

    // Devolver una respuesta JSON con el estado de la operación
    if (count($errores) > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Algunas patologías no se pudieron insertar.',
            'errors' => $errores
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Todas las patologías se insertaron correctamente.'
        ]);
    }
} else {
    // Devolver un mensaje de error si no se recibieron patologías
    echo json_encode([
        'status' => 'error',
        'message' => 'No se recibieron patologías'
    ]);
}
?>
