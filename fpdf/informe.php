<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../Pagina Principal/Main/index.php");
    }
    if($_SESSION['Privilegio'] != "alumno") {
        header("Location: ../Pagina Principal/Main/index.php");
    }

    /* Conectar con la libreria FPDF y la base de datos*/
    require_once("fpdf/fpdf.php");
    require_once("../BD/conexionbd.php");
    
    /* Traer datos de la BD */
    $cedula = $_SESSION['cedula'];
    $idinforme = $_GET['ID'];
    
    $sql = "SELECT * FROM alumnos A, informes I
    WHERE A.ID_Alumno=I.ID_Alumno
    AND I.ID_Informe=$idinforme
    AND Cedula=$cedula;";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $titulo = $columna['Titulo'];
            $nombrecompleto = $columna['Nombre']." ".$columna['Apellido'];
            $cedulaAlumno = $columna['Cedula'];
            $observaciones = $columna['Observaciones'];
            $fechaNac = $columna['Fecha_Nac'];
            $fechainforme = $columna['Fecha'];
            $grado = $columna['Grado'];
        }
    }
    
    /* Funciones */
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

    /* Traer datos de la BD */
    $sql = "SELECT D.Nombre AS Docente, O.Nombre AS Ocupacion
            FROM docentes D, informes I, ocupacion O 
            WHERE I.ID_Docente=D.ID_Docente
            AND D.ID_Ocupacion=O.ID_Ocupacion 
            AND I.ID_Informe=$idinforme;";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) { 
            $nombreDocente = $columna['Docente'];
            $nombreOcupacion = $columna['Ocupacion'];
        }
    }

    /* Creacion del PDF */
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage('P', 'A4');
    $pdf->SetMargins(20, 20, 20);
    $pdf->Header($mes, $año);
    
    /* Título */
    $pdf->Ln(-35);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode($titulo), 0, 0, 'C');
    $pdf->Ln(28);
    
    /* Info del alumno */
    $pdf->Cell(0, 10, $pdf->SetFont('Times', '', 12).$pdf->Write(5, "Nombre: ").$pdf->SetFont('Times', 'B', 12).$pdf->Write(5, utf8_decode($nombrecompleto)), 0, 0, 'L');
    $pdf->Ln(6);

    $pdf->Cell(0, 10, $pdf->SetFont('Times', '', 12).$pdf->Write(5, "Fecha de nacimiento: ").$pdf->SetFont('Times', 'B', 12).$pdf->Write(5, formatoFecha($fechaNac)), 0, 0, 'L');
    $pdf->Ln(6);

    $pdf->Cell(0, 10, $pdf->SetFont('Times', '', 12).$pdf->Write(5, utf8_decode("Edad cronológica: ")).$pdf->SetFont('Times', 'B', 12).$pdf->Write(5, utf8_decode(edadCronologica($fechaNac, $fechainforme)), 0, 0, 'L'));
    $pdf->Ln(6);

    $pdf->Cell(0, 10, $pdf->SetFont('Times', '', 12).$pdf->Write(5, "Grado: ").$pdf->SetFont('Times', 'B', 12).$pdf->Write(5, $grado.utf8_decode('°')), 0, 0, 'L');
    $pdf->Ln(12);

    /* Observaciones del informe */
    $pdf->SetFont('Times', '', 12);
    $pdf->Write(5, utf8_decode($observaciones));
    $pdf->Ln(10);

    /* Footer */
    $pdf->Footer($nombreDocente, $nombreOcupacion);

    /* Se abre el PDF en el navegador */
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename=informe.pdf');
    $pdf->Output('I', $titulo."pdf", 'false');
?>


