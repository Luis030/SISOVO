    <?php
include("../../BD/conexionbd.php");
session_start();

if(isset($_GET['tabla'])){
    if($_GET['tabla'] == "true"){
        $sql = "SELECT e.Nombre AS Especializacion, o.Nombre AS Ocupacion, COUNT(DISTINCT ed.ID_Docente) AS Total_Docentes
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

if (isset($_GET['editardocente'])){
    $q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';
    $id = $_GET['id'];
    $sql = "SELECT E.ID_Especializacion, E.Nombre FROM Especializaciones E
            WHERE E.Nombre LIKE '%$q%' AND E.Estado = 1 AND E.ID_Especializacion NOT IN 
            (SELECT ID_Especializacion 
            FROM especializacion_docente 
            WHERE ID_Docente = $id AND Estado = 1);";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        $especialidades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($especialidades);
    }
    exit;
}

$q = isset($_GET['q']) ? mysqli_real_escape_string($conexion, $_GET['q']) : '';
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
?>
