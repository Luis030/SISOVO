<?php
    include("../../BD/conexionbd.php");
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    if ($tipo === "nombre") {
        $nombre = $_GET['nombre'];
        $sql = "UPDATE clase
                SET Nombre = '$nombre'
                WHERE ID_Clase = $id";
    }   
    if ($tipo === "dia") {
        $dia = $_GET['dia'];
        $sql = "UPDATE clase
                SET Dia = '$dia'
                WHERE ID_Clase = $id";
    } 
    if ($tipo === "inicio") {
        $inicio = $_GET['inicio'];
        $sql = "UPDATE clase
                SET Inicio = '$inicio'
                WHERE ID_Clase = $id";
    }
    if ($tipo === "final") {
        $final = $_GET['final'];
        $sql = "UPDATE clase
                SET Final = '$final'
                WHERE ID_Clase = $id";
    }
    if ($tipo === "docente") {
        $docente = $_GET['docente'];
        $sql2 = "SELECT Nombre, Apellido
                 FROM docentes
                 WHERE ID_Docente = $docente";
        $resultado = mysqli_query($conexion, $sql2);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $nombreDocente = $fila['Nombre'].' '.$fila['Apellido'] ;
            }
        }
        $sql = "UPDATE clase
                SET ID_Docente = '$docente'
                WHERE ID_Clase = $id";
    }
    
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado == TRUE && $tipo === "docente") {
        echo json_encode(['mensaje' => 'si', 'docente' => $nombreDocente]);
    } else {
        echo json_encode(['mensaje' => 'si']);
    }
?>