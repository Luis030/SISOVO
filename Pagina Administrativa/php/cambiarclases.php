<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];

    if ($tipo === "nombre") {
        $nombre = $_POST['nombre'];
        $sql = "UPDATE clase
                SET Nombre = '$nombre'
                WHERE ID_Clase = $id";
    }   

    if ($tipo === "docente") {
        $docente = $_POST['docente'];

        $sql = "UPDATE clase
                SET ID_Docente = '$docente'
                WHERE ID_Clase = $id";
    }

    if ($tipo === "horario") {
        $horario = $_POST['horario'];
        
        $sql = "UPDATE clase
        SET Horario = '$horario'
        WHERE ID_Clase = $id";
    }
    
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado == TRUE) {
        switch($tipo) {
            case "docente":
                $sql2 = "SELECT Nombre, Apellido
                FROM docentes
                WHERE ID_Docente = $docente";
                $resultado2 = mysqli_query($conexion, $sql2);
                if (mysqli_num_rows($resultado2) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado2)) {
                        $nombreDocente = $fila['Nombre'].' '.$fila['Apellido'] ;
                    }
                }
                echo json_encode(['mensaje' => 'si', 'docente' => $nombreDocente]);
                break;
            case "horario":
                $sql2 = "SELECT Horario
                FROM clase
                WHERE ID_Clase = $id";
                $resultado2 = mysqli_query($conexion, $sql2);
                if (mysqli_num_rows($resultado2) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado2)) {
                        $horarioClase = $fila['Horario'];
                    }
                }
                echo json_encode(['mensaje' => 'si', 'horario' => $horarioClase]);
                break;
            default: 
                echo json_encode(['mensaje' => 'si']);
                break;
        }
    }

} else {
    header("Location: ../../");
}
?>