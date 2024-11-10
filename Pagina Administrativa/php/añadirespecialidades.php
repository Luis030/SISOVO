<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        header('Content-Type: application/json');

        // Leer los datos JSON enviados en la solicitud
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['items']) && isset($data['ocupacion'])) {
            $especialidades = $data['items'];
            $ocupacion = $data['ocupacion'];
            $errores = [];
            $especialidadesAgregadas = 0;

            foreach ($especialidades as $especialidad) {
                $consulta = mysqli_prepare($conexion, "SELECT ID_Especializacion FROM especializaciones WHERE Nombre = ? AND Estado=1 AND ID_Ocupacion = ?");
                mysqli_stmt_bind_param($consulta, 'si', $especialidad, $ocupacion);
                mysqli_stmt_execute($consulta);
                mysqli_stmt_store_result($consulta);

                if (mysqli_stmt_num_rows($consulta) > 0) {
                    $errores[] = "La especialidad '$especialidad' ya existe.";
                } else {
                    $insertar = mysqli_prepare($conexion, "INSERT INTO especializaciones (Nombre, ID_Ocupacion) VALUES (?, ?)");
                    mysqli_stmt_bind_param($insertar, 'si', $especialidad, $ocupacion);
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
    } else {
        header("Location: ../../");
    }
?>
