<?php
require('D:\XAMPP\htdocs\MVC\core\mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'Listado de Usuarios',0,1,'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }
}

// Connect to database
$link = mysqli_connect('localhost','root','','dbmvc');

$pdf = new PDF();
$pdf->AddPage("P");
// First table: output all columns
$pdf->Table($link,'SELECT apellido, nombre, email FROM usuarios ORDER BY apellido');
$pdf->Output();
?>