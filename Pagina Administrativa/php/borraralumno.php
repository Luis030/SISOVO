<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");
    $IDalumno = $_POST['id'];
    if($IDalumno){
        $sql = "UPDATE alumnos SET Estado=0 WHERE ID_Alumno = $IDalumno;";
        if(mysqli_query($conexion, $sql) === TRUE){
            echo json_encode([
                "Resultado" => "exitoso",
                "IDAlumno" => $IDalumno
            ]);
        } else {
            echo json_encode([
                "Resultado" => "error",
                "IDAlumno" => $IDalumno
            ]);
        }
    }
} else {
    header("Location: ../../");
}
?>