<?php
    /* Conectar con la libreria FPDF */
    require_once("fpdf/fpdf.php");

    /* Creacion del PDF */
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage('P', 'A4');

    /* Título */
    $pdf->Ln(-35);
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(0, 10, utf8_decode('Informe pedagógico.'), 0, 0, 'C');
    $pdf->Ln(40);
    
    /* Info del alumno */
    $pdf->SetFont('Times', '', 14);
    $pdf->Cell(0.5, 0, 'Nombre:', 0, 0, 'L');
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(80, 0, 'Federico Simonelli', 0, 0, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Times', '', 14);
    $pdf->Cell(16, 0, 'Fecha de nacimiento:', 0, 0, 'L');
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(80, 0, '21/09/2006', 0, 0, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Times', '', 14);
    $pdf->Cell(18, 0, utf8_decode('Edad cronológica:'));
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(80, 0, utf8_decode('17 años y 11 meses'), 0, 0, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Times', '', 14);
    $pdf->Cell(-26, 0, 'Grado:', 0, 0, 'L');
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(90, 0, '6to', 0, 0, 'C');
    $pdf->Ln(10);

    /* Se abre el PDF en el navegador */
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="archivo.pdf"');
    $pdf->Output('I', 'archivo.pdf', 'false');
?>


