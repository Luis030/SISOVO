<?php
    require_once("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['filtrado'])){
        if($_POST['filtrado'] == true){
            $maxedad = isset($_POST['valemax']) ? $_POST['valemax'] : '';
            $minedad = isset($_POST['valemin']) ? $_POST['valemin'] : '';
            $patologia = isset($_POST['patologia']) ? $_POST['patologia'] : '';
            $consultabase = "
            SELECT DISTINCT a.ID_Alumno, a.ID_Usuario, a.Nombre, a.Apellido, a.Cedula,
                            TIMESTAMPDIFF(YEAR, a.Fecha_Nac, CURDATE()) AS Edad,
                            a.Celular_Padres, a.Mail_Padres
            FROM alumnos a
            LEFT JOIN patologia_alumno pa ON a.ID_Alumno = pa.ID_Alumno AND pa.Estado = 1
            LEFT JOIN patologias p ON pa.ID_Patologia = p.ID_Patologia
            WHERE a.Estado = 1
            ";
            if ($minedad != '') {
                $consultabase .= " AND TIMESTAMPDIFF(YEAR, a.Fecha_Nac, CURDATE()) >= " . intval($minedad);
            }
            
            if ($maxedad != '') {
                $consultabase .= " AND TIMESTAMPDIFF(YEAR, a.Fecha_Nac, CURDATE()) <= " . intval($maxedad);
            }
            
            if (!empty($patologia)) {
                $consultabase .= " AND p.ID_Patologia = " . intval($patologia);
            }
            
            
            $resultado = mysqli_query($conexion, $consultabase);
            if(mysqli_num_rows($resultado) > 0){
                $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                echo json_encode($filas);
                exit;
            } else {
                echo json_encode([]);
                exit;
            }
            exit;
        }
        exit;
    }
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
