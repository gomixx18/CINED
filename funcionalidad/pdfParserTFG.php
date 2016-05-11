<?php

// Include the main TCPDF library (search for installation path).

require_once('../tcpdf/tcpdf.php');
include '../clases/UsuarioSimple.php';
include '../clases/UsuarioComplejo.php';
include '../clases/UsuarioPermisos.php';
include '../clases/UsuarioInvestigadorSimple.php';
include '../clases/UsuarioInvestigadorComplejo.php';
@session_start();

$usuarioSesion = $_SESSION["user"];
$usuarioPermisos = $_SESSION['permisos'];
$consulta = $_SESSION['pdfTFG'];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if(!isset($consulta)){
    header("Location: ../reportesTFG.php");
    exit();
}

if(!isset($usuarioSesion) ||!isset($usuarioPermisos)){
    $_SESSION["error"] = "¡Hubo un error al crear el archivo! NO _SESSION";
    header("Location: ../navegacion/500.php");
    exit();
}

if (!$connection) {
    $_SESSION["error"] = "¡Hubo un error al crear el reporte! Conexión a base de datos";
    header("Location: ../navegacion/500.php");
    exit();
}

// extend TCPF with custom functions
class MYPDF extends TCPDF {


   
      
    
    
}



// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$nombre = ' Creado por: '.$usuarioSesion->getNombre() . " " . $usuarioSesion->getApellido1() . " " . $usuarioSesion->getApellido2(); 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($nombre);
$pdf->SetTitle("Reporte TFG");
$pdf->SetSubject('Reporte de TFG');


 
$html = '<style>   
tr, td {
   
    border: 1px solid #00519E;
    font-size: xx-small;
    color: black;
    text-align: justify;
    text-justify: inter-word;
    
}

th{
   text-align: center;
   border: 1px solid #black;
   font-weight: bold;
}

h4{
    font-size: normal;
}
h3{
    font-size: small;
}

h4,h3{
    color: #00519E;
}

table {
    border-collapse: collapse;
    width: 100%;   
}
</style>       
        
<table align="center">
<thead>
<tr bgcolor="#00519E" color="white">
  <th>Código de TFG</th>
  <th>Nombre del TFG</th>   
  <th>Carrera</th>
  <th>Estado General</th>
  <th>Estado de Etapas</th>
  <th>Director</th>
  <th>Asesor 1</th>
  <th>Asesor 2</th>
  <th>Línea de Investigación</th>
</tr>
</thead> ';

obtenerModalidades();
$query = mysqli_query($connection, $consulta);
if(mysqli_num_rows($query) != 0){
while ($data2 = mysqli_fetch_assoc($query)) {
    
    $consultaProyecto = "SELECT modalidades.nombre as modalidad, tfg.titulo,concat(tfgdirectores.nombre,' ',  tfgdirectores.apellido1, ' ', tfgdirectores.apellido2) as director ,carreras.nombre as carrera, tfg.estado, lineasinvestigacion.nombre as linea
                         FROM tfg, lineasinvestigacion, modalidades, tfgdirectores, carreras where tfg.codigo = '".$data2['tfg']."' and tfg.directortfg = tfgdirectores.id and tfg.carrera = carreras.codigo and tfg.lineainvestigacion = lineasinvestigacion.codigo and tfg.modalidad = modalidades.codigo;";
    $consultaEtapa = "SELECT tfgetapas.estado as estado
                      FROM tfgetapas where tfgetapas.tfg = '".$data2['tfg']."';";
    
    $query2 = mysqli_query($connection, $consultaProyecto);
    $query3 = mysqli_query($connection, $consultaEtapa);
    $etapa1 = mysqli_fetch_assoc($query3);
    $etapa2 = mysqli_fetch_assoc($query3);
    $etapa3 = mysqli_fetch_assoc($query3);
    $proyecto = mysqli_fetch_assoc($query2);
    obtenerAsesores($data2['tfg']);
    agregarModalidad($proyecto['modalidad']);
    
    $html = $html."<tbody>";
    $html = $html."<tr>";
    $html = $html."<td>".$data2['tfg']."</td>";
    $html = $html."<td>".$proyecto['titulo']."</td>";
    $html = $html."<td>".$proyecto['carrera']."</td>";
    $html = $html."<td>".$proyecto['estado']."</td>";
    $html = $html."<td>".
            "Etapa #1: ".$etapa1['estado'].
            "<br>Etapa #2: ".$etapa2['estado'].
            "<br>Etapa #3: ".$etapa3['estado'].
            "</td>";
    $html = $html."<td>".$proyecto['director']."</td>";
    $html = $html."<td>".$asesor1."</td>";
    $html = $html."<td>".$asesor2."</td>";
    $html = $html."<td>".$proyecto['linea']."</td>";
    $html = $html."</tr>";
    $html = $html."</tbody>";
    
    unset($asesor1);
    unset($asesor2);
}
}else{
    echo "ni mierda";
}


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 15, PDF_HEADER_TITLE,  $nombre);

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
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)',);

// data loading
//$data = $pdf->LoadData('data/table_data_demo.txt');
//$pdf->SetFillColor(26, 179, 148);
$html = $html.'</table>'.  innerModalidades();
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', false);

// print colored table
//$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Reporte TFG', 'I');

exit();

function obtenerAsesores($tfg){
    
    global $asesor1 ;
    global $asesor2 ;
    $consultaAsesores = "SELECT concat(tfgasesores.nombre,' ',  tfgasesores.apellido1, ' ', tfgasesores.apellido2) as asesor 
                         FROM tfgasesores, tfgasesoran where tfgasesoran.estado = 1 and tfgasesoran.tfg = '".$tfg."' and tfgasesoran.asesor = tfgasesores.id; ";
    
    $query4 = mysqli_query($GLOBALS['connection'], $consultaAsesores);
    $asesor1data = mysqli_fetch_assoc($query4);
    $asesor2data = mysqli_fetch_assoc($query4);
    if(!isset($asesor1data)){
      $asesor1 = "No definido";
    }else{
        $asesor1 = $asesor1data['asesor'];
    }
    
    if(!isset($asesor2data)){
      $asesor2 = "No definido";
    }else{
        $asesor2 = $asesor2data['asesor'];
    }
    
}

function obtenerModalidades(){
    global $modalidades ;
    $modalidades = array();
    
    $consultaAsesores = "SELECT nombre from modalidades;";
    
    $query5 = mysqli_query($GLOBALS['connection'], $consultaAsesores);
    while ($data2 = mysqli_fetch_assoc($query5)) {
        array_push($modalidades, array($data2['nombre'],0));
    }
    array_push($modalidades,array ("total",0));
}

function agregarModalidad($tfgModalidad){
    $modalidades = $GLOBALS['modalidades'];
    for ($i = 0; $i<count($modalidades);$i++) {
         if($modalidades[$i][0] == $tfgModalidad){
         $modalidades[$i][1]++;
         $modalidades[count($modalidades)-1][1]++;
         }
    }
    $GLOBALS['modalidades'] = $modalidades;
    
}

function innerModalidades(){
    $html = '<h3>Modalidades</h3><h4>';
    foreach ($GLOBALS['modalidades'] as $modalidad) {
        $html = $html.$modalidad[0].": ".$modalidad[1]." ";
    }
    return $html."</h4>";
}