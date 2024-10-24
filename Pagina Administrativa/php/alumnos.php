<?php
    require_once("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $q = isset($_POST['q']) ? $_POST['q'] : '';
    if(isset($_POST['idclase'])){
        $idclase = $_POST['idclase'];
        $sql = "SELECT A.ID_Alumno, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM alumnos A LEFT JOIN alumnos_clase AC on A.ID_Alumno=AC.ID_Alumno AND AC.ID_Clase=$idclase WHERE (CONCAT(Nombre, ' ', Apellido) LIKE '%$q%' OR Cedula LIKE '%$q%') AND A.Estado = 1 AND AC.ID_Clase is null;";
    } else if(isset($_POST['alumnostabla']) && $_POST['alumnostabla'] == "true") {
        $q = isset($_POST['q']) ? $_POST['q'] : '';
        $sql = "SELECT ID_Alumno, ID_Usuario, Nombre, Apellido, Cedula, TIMESTAMPDIFF(YEAR, Fecha_Nac, CURDATE()) AS Edad, Celular_Padres, Mail_Padres FROM alumnos WHERE Estado=1;";
    } else {
        $q = isset($_POST['q']) ? $_POST['q'] : '';
        $sql = "SELECT ID_Alumno, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM alumnos WHERE (CONCAT(Nombre, ' ', Apellido) LIKE '%$q%' OR Cedula LIKE '%$q%') AND A.Estado = 1 LIMIT 50";
    }
    $resultado = mysqli_query($conexion, $sql);
    $alumnos = [];

    if(mysqli_num_rows($resultado) > 0){
        while($fila = mysqli_fetch_assoc($resultado)){
            $alumnos[] = $fila; 
        }
    }
    echo json_encode($alumnos); 
} else {
    header("Location: ../../");
}
?>
