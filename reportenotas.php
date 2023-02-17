<?php
require "conexion.php";
require "plantilla.php";
if (!empty($_POST)) {
    $sql = "SELECT e.primer_periodo, e.segundo_periodo, e.tercer_periodo, e.total, a.nombre, g.grado FROM notas AS e 
    INNER JOIN datos_alumnos AS a ON a.id_alumno=e.id_alumno
    INNER JOIN grados AS g ON a.gid_grado=g.id_grado";
    $resultado = $conexion->query($sql);

    $pdf = new Cabecera("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(10, 5, "N", 1, 0, "C");
    $pdf->Cell(40, 5, "Primer Periodo", 1, 0, "C");
    $pdf->Cell(40, 5, "Segundo Periodo", 1, 0, "C");
    $pdf->Cell(50, 5, "Tercer Periodo", 1, 0, "C");
    $pdf->Cell(15, 5, "total", 1, 0, "C");
    $pdf->Cell(20, 5, "Estudiante", 1, 0, "C");
    $pdf->Cell(20, 5, "Grado", 1, 1, "C");

    $pdf->SetFont("Arial", "", 8);

    while ($fila = $resultado->fetch_assoc()) {

        $pdf->Cell(10, 5, $fila['id_notas'], 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['primer_periodo']), 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['segundo_periodo']), 1, 0, "C");
        $pdf->Cell(50, 5, $fila['tercer_periodo'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['total'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['nombre'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['grado'], 1, 1, "C");
    }
    $pdf->Output();
}
