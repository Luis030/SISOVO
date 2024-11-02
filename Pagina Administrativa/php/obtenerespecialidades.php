<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php");
    session_start();
    if(isset($_POST['datospagina'])){
        $sql = "SELECT 
    (SELECT COUNT(*) FROM especializaciones E WHERE E.Estado = 1) AS Total_Especializaciones,

    (SELECT COUNT(e.ID_Especializacion) FROM especializaciones e
     LEFT JOIN especializacion_docente ed ON e.ID_Especializacion = ed.ID_Especializacion AND ed.Estado = 1 
     WHERE ed.ID_Especializacion IS NULL AND e.Estado = 1) AS Especializaciones_Sin_Docentes;
    ";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($fila = mysqli_fetch_assoc($resultado)){
            $cantidadesp = $fila['Total_Especializaciones'];
            $espsinP = $fila['Especializaciones_Sin_Docentes'];
        }
    }
    echo json_encode([
        "totalesp" => $cantidadesp,
        "espsinp" => $espsinP
    ]);
    exit;
    }
    if(isset($_POST['tabla'])){
        if($_POST['tabla'] == "true"){
            $sql = "SELECT e.Nombre AS Especializacion, o.Nombre AS Ocupacion, COUNT(DISTINCT ed.ID_Docente) AS Total_Docentes, e.ID_Especializacion 
            FROM especializaciones e
            LEFT JOIN ocupacion o ON e.ID_Ocupacion = o.ID_Ocupacion
            LEFT JOIN especializacion_docente ed ON e.ID_Especializacion = ed.ID_Especializacion AND ed.Estado = 1
            WHERE e.Estado = 1
            GROUP BY e.Nombre, o.Nombre;
            ";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                echo json_encode($especialidades);
                exit;
            } else {
                echo json_encode([]);
                exit;
            }
        }
    }

    if (isset($_POST['editardocente'])){
        $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';
        $id = $_POST['id'];
        $ido = $_POST['ido'];
        $sql = "SELECT E.ID_Especializacion, E.Nombre FROM especializaciones E
                WHERE E.Nombre LIKE '%$q%' AND E.Estado = 1 AND E.ID_Ocupacion = $ido AND E.ID_Especializacion NOT IN
                (SELECT ID_Especializacion
                FROM especializacion_docente
                WHERE ID_Docente = $id AND Estado = 1)";
        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($especialidades);
        }
        exit;
    }

    $q = isset($_POST['q']) ? mysqli_real_escape_string($conexion, $_POST['q']) : '';
    $ocupacion = isset($_POST['ocupacion']) ? mysqli_real_escape_string($conexion, $_POST['ocupacion']) : '';

    if ($q) {
        $sql = "SELECT ID_Especializacion, Nombre 
                FROM especializaciones 
                WHERE Nombre LIKE '%$q%' AND ID_Ocupacion='$ocupacion'
                LIMIT 50";
    } else {
        $sql = "SELECT ID_Especializacion, Nombre 
                FROM especializaciones WHERE ID_Ocupacion='$ocupacion'
                ORDER BY Nombre ASC 
                LIMIT 10";
    }

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($especialidades);
    }
} else {
    header("Location: ../../");
}
?>
