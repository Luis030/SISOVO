<?php
require_once("../../BD/conexionbd.php");
if(isset($_GET['time'])){
    $rango = $_GET['time'];
    switch($rango){
        case 'hoy':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha=curdate() ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '3d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 3 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '7d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '30d':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case '6m':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) ORDER BY Fecha DESC, Hora DESC;";
            break;
        case 'all':
            $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente ORDER BY Fecha DESC, Hora DESC;";
            break;
    }
} else {
    $docente = isset($_GET['docente']) ? $_GET['docente'] : '';
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
    $hora = isset($_GET['hora']) ? $_GET['hora'] : '';
    $rangofecha1 = isset($_GET['rangofecha1']) ? $_GET['rangofecha1'] : '';
    $rangofecha2 = isset($_GET['rangofecha2']) ? $_GET['rangofecha2'] : '';
    $rangohora1 = isset($_GET['rangohora1']) ? $_GET['rangohora1'] : '';
    $rangohora2 = isset($_GET['rangohora2']) ? $_GET['rangohora2'] : '';
    $sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, 
            CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, 
            DATE_FORMAT(LD.Fecha, '%d/%m/%Y') AS Fecha, LD.Hora 
            FROM docentes D 
            JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente 
            WHERE 1=1";

    // Añadir filtros opcionales
    if (!empty($docente)) {
        $sql .= " AND (CONCAT(D.Nombre, ' ', D.Apellido) LIKE '%$docente%' OR D.Cedula = '$docente')";
    }
    

    if (!empty($fecha)) {
        $sql .= " AND LD.Fecha = '$fecha'";
    }

    if (!empty($tipo)) {
        $sql .= " AND LD.Tipo = '$tipo'";
    }

    if (!empty($hora)) {
        $sql .= " AND LD.Hora LIKE '%$hora%'";
    }

    if (!empty($rangofecha1) && !empty($rangofecha2)) {
        $sql .= " AND LD.Fecha BETWEEN '$rangofecha1' AND '$rangofecha2'";
    } elseif (!empty($rangofecha1)) {
        $sql .= " AND LD.Fecha >= '$rangofecha1'";
    } elseif (!empty($rangofecha2)) {
        $sql .= " AND LD.Fecha <= '$rangofecha2'";
    }
    
    if (!empty($rangohora1) && !empty($rangohora2)) {
        $sql .= " AND LEFT(LD.Hora, 5) BETWEEN '$rangohora1' AND '$rangohora2'";
    } elseif (!empty($rangohora1)) {
        $sql .= " AND LEFT(LD.Hora, 5) >= '$rangohora1'";
    } elseif (!empty($rangohora2)) {
        $sql .= " AND LEFT(LD.Hora, 5) <= '$rangohora2'";
    }
    
    $sql .= " ORDER BY LD.Fecha DESC, LD.Hora DESC;";
    /*$sql = "SELECT CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, D.ID_Docente, D.Cedula, CASE WHEN LD.Tipo = 'E' THEN 'Entrada' WHEN LD.Tipo = 'S' THEN 'Salida' END AS Tipo, LD.Fecha, LD.Hora FROM docentes D JOIN lista_docente LD ON LD.ID_Docente = D.ID_Docente WHERE LD.Fecha=curdate() ORDER BY Fecha DESC, Hora DESC;";*/
}

$resultado = mysqli_query($conexion, $sql);
if (!$resultado) {
    echo "Error en la consulta: " . mysqli_error($conexion);
    exit;
}
if(mysqli_num_rows($resultado) > 0){
    $lista = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($lista);
} else {
    $data = [];
    echo json_encode($data);
}
?>