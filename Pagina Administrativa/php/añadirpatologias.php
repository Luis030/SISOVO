<?php
include("../../BD/conexionbd.php");
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['patologias'])) {
    $patologias = $data['patologias'];
    echo json_encode(['status' => 'success', 'message' => 'Datos recibidos correctamente']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron patologías']);
}
?>
