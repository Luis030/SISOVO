<?php
require_once("../../BD/conexionbd.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idclase = $_GET['id'];
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (isset($data['valores']) && is_array($data['valores'])) {
        $alumnosAgregados = $data['valores'];
        foreach($alumnosAgregados as $alumno){
            $sql = "SELECT * FROM alumnos_clase WHERE ID_Alumno=$alumno AND ID_Clase=$idclase";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo "error";
                exit;
            } else {
                $sql = "INSERT INTO alumnos_clase(ID_Clase, ID_Alumno) VALUES ('$idclase', '$alumno');";
                mysqli_query($conexion, $sql);
            }
        }
        echo json_encode([
            'status' => 'success',
            'message' => 'Datos recibidos correctamente'
           
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se enviaron datos válidos'
        ]);
    }
}

?>