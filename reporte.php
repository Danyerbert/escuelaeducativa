<?php
require "conexion.php";
require "plantilla.php";
    if (!empty($_POST)) {
        $grado = mysqli_escape_string($conexion, $_POST['grado']);
$sql = "SELECT id_alumno, nombres_alumno, apellidos, fecha_nac, grado, turno, parentesco FROM datos_alumnos WHERE grado LIKE '$grado' ";
$resultado = $conexion->query($sql);

$pdf = new Cabecera("P","mm","letter");
$pdf ->AliasNbPages();
$pdf ->SetMargins(10,10,10);
$pdf ->AddPage();
$pdf ->SetFont("Arial","B",9);
$pdf ->Cell(10,5,"N",1,0,"C");
$pdf ->Cell(40,5,"Nombres",1,0,"C");
$pdf ->Cell(40,5,"Apellidos",1,0,"C");
$pdf ->Cell(50,5,"Fecha de Nacimiento",1,0,"C");
$pdf ->Cell(15,5,"Grado",1,0,"C");
$pdf ->Cell(20,5,"Turno",1,0,"C");
$pdf ->Cell(20,5,"Parentesco",1,1,"C");

$pdf ->SetFont("Arial","",8);

while ($fila = $resultado->fetch_assoc()) {
    
    $pdf ->Cell(10,5,$fila['id_alumno'],1,0,"C");
    $pdf ->Cell(40,5,utf8_decode($fila['nombres_alumno']),1,0,"C");
    $pdf ->Cell(40,5,utf8_decode($fila['apellidos']),1,0,"C");
    $pdf ->Cell(50,5,$fila['fecha_nac'],1,0,"C");
    $pdf ->Cell(15,5,$fila['grado'],1,0,"C");
    $pdf ->Cell(20,5,$fila['turno'],1,0,"C");
    $pdf ->Cell(20,5,$fila['parentesco'],1,1,"C");
}
$pdf->Output();
    }
