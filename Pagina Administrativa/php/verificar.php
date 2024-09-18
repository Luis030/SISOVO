<?php
include("../../BD/conexionbd.php");

if(isset($_GET['esp']) && isset($_GET['item'])){
    $item = $_GET['item'];
    $sql = "SELECT * FROM Especializaciones WHERE Nombre='$item'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        echo json_encode([
            'mensaje' => 'agregado',
            'item' => $item
        ]);
    } else {
        echo json_encode([
            'mensaje' => 'libre',
            'item' => $item
        ]);
    }
} 

if(isset($_GET['pat']) && isset($_GET['item'])){
    $item = $_GET['item'];
    $sql = "SELECT * FROM patologias WHERE Nombre='$item'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        echo json_encode([
            'mensaje' => 'agregado',
            'item' => $item
        ]);
    } else {
        echo json_encode([
            'mensaje' => 'libre',
            'item' => $item
        ]);
    }
}

if(isset($_GET['ocu']) && isset($_GET['item'])){
    $item = $_GET['item'];
    $sql = "SELECT * FROM ocupacion WHERE Nombre='$item'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        echo json_encode([
            'mensaje' => 'agregado',
            'item' => $item
        ]);
    } else {
        echo json_encode([
            'mensaje' => 'libre',
            'item' => $item
        ]);
    }
}
?>
