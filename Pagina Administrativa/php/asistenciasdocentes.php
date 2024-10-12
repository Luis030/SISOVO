<?php
require_once("../../BD/conexionbd.php");
if(isset($_GET['time'])){
    $rango = $_GET['time'];
    switch($rango){
        case 'hoy':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha=curdate() ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '3d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 3 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '7d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '30d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '6m':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case 'all':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente ORDER BY Fecha DESC, Hora DESC;";
            break;
    }
} else {
    $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha=curdate() ORDER BY Fecha DESC, Hora DESC;";
}

$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) > 0){
    $lista = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($lista);
} else {
    $data = [];
    echo json_encode($data);
}
?>