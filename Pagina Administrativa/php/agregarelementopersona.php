<?php
    include("../../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $tipo  = $_POST['tipo'];

    if ($tipo == 'alumno') {
        $idp = $_POST['idp'];
        $ida = $_POST['ida'];
        foreach ($idp as $pat) {
            $sql = "INSERT INTO patologia_alumno (ID_Patologia, ID_Alumno) VALUES ($pat, $ida)";
            $resultado = mysqli_query($conexion, $sql);
        }
    }

    if ($tipo == 'docente') {
        $ide = $_POST['ide'];
        $idd = $_POST['idd'];
        foreach ($ide as $esp) {
            $sql = "INSERT INTO especializacion_docente (ID_Especializacion, ID_Docente) VALUES ($esp, $idd)";
            $resultado = mysqli_query($conexion, $sql);
        }
    }
} else {
    header("Location: ../../");
}
?>