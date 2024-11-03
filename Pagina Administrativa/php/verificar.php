<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");

    if(isset($_GET['esp']) && isset($_GET['item'])){
        $item = $_GET['item'];
        $ocupacion = $_GET['ocupacionEsp'];
        $sql = "SELECT * FROM especializaciones WHERE Nombre='$item' AND Estado=1 AND ID_Ocupacion=$ocupacion";
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
        exit;
    } 

    if(isset($_GET['pat']) && isset($_GET['item'])){
        $item = $_GET['item'];
        $sql = "SELECT * FROM patologias WHERE Nombre='$item' AND Estado=1";
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
        exit;
    }

    if(isset($_GET['ocu']) && isset($_GET['item'])){
        $item = $_GET['item'];
        $sql = "SELECT * FROM ocupacion WHERE Nombre='$item' AND Estado=1";
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
        exit;
    }
} else {
    header("Location: ../../");
}
?>
