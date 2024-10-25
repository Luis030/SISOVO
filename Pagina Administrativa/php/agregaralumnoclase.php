<?php
require_once("../../BD/conexionbd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $idclase = $data['id'];

    if (isset($data['valores']) && is_array($data['valores'])) {
        $alumnosAgregados = $data['valores'];
        $errores = [];
        
        foreach ($alumnosAgregados as $alumno) {
            $alumno = intval($alumno);
            $sql = "SELECT * FROM alumnos_clase WHERE ID_Alumno = ? AND ID_Clase = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, 'ii', $alumno, $idclase);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($resultado) > 0) {
                $errores[] = $alumno;
            } else {
                $sql = "INSERT INTO alumnos_clase (ID_Clase, ID_Alumno) VALUES (?, ?)";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, 'ii', $idclase, $alumno);
                mysqli_stmt_execute($stmt);
            }
        }

        if (!empty($errores)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Los siguientes alumnos ya están en la clase: ' . implode(', ', $errores)
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Todos los alumnos han sido agregados correctamente.'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se enviaron datos válidos'
        ]);
    }
}
?>
