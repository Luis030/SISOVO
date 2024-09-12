<?php
    session_start();

    /* Conectar con la libreria FPDF y la base de datos*/
    require_once("fpdf/fpdf.php");
    require_once("../BD/conexionbd.php");
    
    /* Consultas a la base de datos */
    $cedula = $_SESSION['cedula'];
    $idinforme = $_GET['ID'];
    
    $sql = "SELECT * FROM alumnos A, informes I
    WHERE A.ID_Alumno=I.ID_Alumno
    AND I.ID_Informe=$idinforme
    AND Cedula=$cedula;";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($columna = mysqli_fetch_assoc($resultado)){
            $titulo = $columna['Titulo'];
            $nombrecompleto = $columna['Nombre']." ".$columna['Apellido'];
            $cedulaAlumno = $columna['Cedula'];
            $observaciones = $columna['Observaciones'];
            $fechaNac = $columna['Fecha_Nac'];
            $fechainforme = $columna['Fecha'];
        }
    }
    
    function formatoFecha($fechaSQL) {
        $fecha = new DateTime($fechaSQL);
        return $fecha->format('d/m/Y');
    }

    function edadCronologica($fechaInicio, $fechaFin) {
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFin = new DateTime($fechaFin);
        
        $diferencia = $fechaInicio->diff($fechaFin);
        
        return $diferencia->y . " años y " . $diferencia->m . " meses";
    }

    function obtenerNumeroMes($fecha) {
        $fecha = new DateTime($fecha);
        return $fecha->format('m');
    }
    function obtenerNumeroAño($fecha) {
        $fecha = new DateTime($fecha);
        return $fecha->format('Y');
    }
    
    $numeromes = obtenerNumeroMes($fechainforme);
    $año = obtenerNumeroAño($fechainforme);
    switch($numeromes){
        case "01":
            $mes = "Enero";
            break;
        case "02":
            $mes = "Febrero";
            break;
        case "03":
            $mes = "Marzo";
            break;
        case "04":
            $mes = "Abril";
            break;
        case "05":
            $mes = "Mayo";
            break;
        case "06":
            $mes = "Junio";
            break;
        case "07":
            $mes = "Julio";
            break;
        case "08":
            $mes = "Agosto";
            break;
        case "09":
            $mes = "Septiembre";
            break;
        case "10":
            $mes = "Octubre";
            break;
        case "11":
            $mes = "Noviembre";
            break;
        case "12":
            $mes = "Diciembre";
            break;
    }

    $sql = "SELECT D.Nombre
            FROM docentes D, informes I 
            WHERE I.ID_Docente=D.ID_Docente 
            AND I.ID_Informe=$idinforme;";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($columna = mysqli_fetch_assoc($resultado)){
            $nombreDocente = $columna['Nombre'];
        }
    }

    /* Creacion del PDF */
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage('P', 'A4');
    $pdf->Header($mes, $año);
    $pdf->SetFont('Times', 'B', 14);

    /* Título */
    $pdf->Ln(-35);
    $pdf->Cell(0, 10, utf8_decode($titulo), 0, 0, 'C');
    $pdf->Ln(30);
    
    /* Info del alumno */
    $pdf->Cell(0, 10, 'Nombre: '.utf8_decode($nombrecompleto), 0, 0, 'L');
    $pdf->Ln(10);

    $pdf->Cell(0, 10, 'Fecha de nacimiento: '.formatoFecha($fechaNac), 0, 0, 'L');
    $pdf->Ln(10);

    $pdf->Cell(0, 10, utf8_decode('Edad cronológica:').' '.utf8_decode(edadCronologica($fechaNac, $fechainforme)), 0, 0, 'L');
    $pdf->Ln(10);

    $pdf->Cell(0, 10, 'Grado: '.'6to', 0, 0, 'L');
    $pdf->Ln(10);

    /* Se abre el PDF en el navegador */
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="archivo.pdf"');
    $pdf->Output('I', 'archivo.pdf', 'false');
?>


