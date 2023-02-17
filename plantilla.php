<?php
require('fpdf/fpdf.php');

class Cabecera extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image("img/logoEscuela.png",30,5,13);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Título
    $this->Cell(190,5,utf8_decode("U.E.N Dr Manuel Díaz Rodriguez"),0,1,"C");
    // Logo Ministerio
    $this->Image("img/MinisterioDeEducacion.png",170,5,30,);
    //Fuente de la fecha
    $this->SetFont('Arial','',12);
    //Fecha del Documento
    $this->Cell(170,5,"Fecha: ". date("d/m/y"),0,1,"C");
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
