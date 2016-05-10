<?php

// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(26, 179, 148);
        $this->SetTextColor(255);
        $this->SetFillColor(26, 179, 148);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(150, 150, 150, 150);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell(strlen($header[$i]), 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Bryan  Rodriguez');
$pdf->SetTitle('Prueba UNED');
$pdf->SetSubject('Reporte de TFG');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 20, PDF_HEADER_TITLE, PDF_HEADER_STRING);



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

$pdf->Ln(5);

// column titles
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)',);

// data loading
//$data = $pdf->LoadData('data/table_data_demo.txt');

$html = <<<EOD
<h1>Reporte TEG </h1>
<h2>Fecha de Creación: 25-04-2016</h2>
<table cellpadding="2" cellspacing="1" border="1">
<tr align="center" bgcolor="#1ab394">
  <td>Código de TFG</td>
  <td>Nombre del TFG</td>   
  <td>Estado de Etapa 1</td>
  <td>Estado de Etapa 2</td>
  <td>Estado de Etapa 3</td>
  <td>Estado Final</td>
  <td>Fecha de Inicio</td>
  <td>Fecha Final</td>
  <td>Director</td>

</tr>
<tr>
  <td>TFG-1-2016-1-2-1</td>
  <td>Analisis de las bases de datos en el campo de la computacion Cuantica</td>   
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>En ejecución</td>
  <td>En ejecución</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>José Pablo Villalobos</td>
</tr>
<tr>
  <td>TFG-2-2016-2-2-1</td>
  <td>Analisis de las bases de datos en el campo de la computacion Cuantica</td> 
  <td>Ejecución</td>
  <td>Inactivo</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td>Lorem ipsum dolor sit amet.</td> 
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> in varius dolor hendrerit sit amet </td>       
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td>in varius dolor hendrerit sit amet o</td> 
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> in varius dolor hendrerit sit amet </td>      
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> in varius dolor hendrerit sit amet </td>      
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> in varius dolor hendrerit sit amet </td>      
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> Curabitur commodo velit tortor </td>      
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>
<tr>
  <td>TFG-3-2016-2-2-1</td>
  <td> Curabitur commodo velit tortor </td>
  <td>Aprovado</td>
  <td>Aprovado con Observaciones</td>
  <td>Inactivo</td>
  <td>Activo</td>
  <td>12-03-2016</td>
  <td>10-03-2017</td>
  <td>Brenda Ruiz M</td>
</tr>

</table>
<h3>Estados de los proyectos</h3>
<h4>Activos: 5 - Inactivos: 3 - Aprobados Defensa: 2 - Totales: 11<h4>
<h3>Modalidades</h3>
<h4>Tesís: 7 - Proyecto: 4</h4>

EOD;
$pdf->SetFillColor(26, 179, 148);
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', false);

// print colored table
//$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

