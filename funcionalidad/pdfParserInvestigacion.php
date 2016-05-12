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
$consulta = $_SESSION['pdfIE'];

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
$pdf->SetTitle("Reporte Investigación");
$pdf->SetSubject('Reporte de Investigación');


 
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
  <th>Código del Proyecto</th>
  <th>Título del TFG</th>   
  <th>Carrera</th>
  <th>Estado General</th>
  <th>Estado de Etapas</th>
  <th>Coordinador</th>
  <th>Evaluador 1</th>
  <th>Evaluador 2</th>
  <th>Línea de Investigación</th>
</tr>
</thead> ';

obtenerModalidades();
$query = mysqli_query($connection, $consulta);
if(mysqli_num_rows($query) == 0){
while ($data2 = mysqli_fetch_assoc($query)) {
    
    $consultaProyecto = "SELECT ieproyectos.titulo as titulo,concat(iecoordinadoresinvestigacion.nombre,' ',  iecoordinadoresinvestigacion.apellido1, ' ', iecoordinadoresinvestigacion.apellido2) as coordinador ,carreras.nombre as carrera, ieproyectos.estado, lineasinvestigacion.nombre as linea
                        FROM ieproyectos, lineasinvestigacion, iecoordinadoresinvestigacion, carreras where ieproyectos.codigo = '".$data2['proyecto']."' and ieproyectos.coordinador = iecoordinadoresinvestigacion.id and ieproyectos.carrera = carreras.codigo and ieproyectos.lineainvestigacion = lineasinvestigacion.codigo;";
    //echo $consultaProyecto;
    $consultaEtapa = "SELECT ieetapas.estado as estado
                      FROM ieetapas where ieetapas.proyecto = '".$data2['proyecto']."';";
    
    $query2 = mysqli_query($connection, $consultaProyecto);
    $query3 = mysqli_query($connection, $consultaEtapa);
    $etapa1 = mysqli_fetch_assoc($query3);
    $etapa2 = mysqli_fetch_assoc($query3);
    $etapa3 = mysqli_fetch_assoc($query3);
    $proyecto = mysqli_fetch_assoc($query2);
    echo $proyecto['coordinador'];
    //obtenerEvaluadores($data2['proyecto']);
    //agregarModalidad($proyecto['modalidad']);
    
    $html = $html."<tbody>";
    $html = $html."<tr>";
    $html = $html."<td>".$data2['proyecto']."</td>";
    $html = $html."<td>".$proyecto['titulo']."</td>";
    $html = $html."<td>".$proyecto['carrera']."</td>";
    $html = $html."<td>".$proyecto['estado']."</td>";
    $html = $html."<td>".
            "Etapa #1: ".$etapa1['estado'].
            "<br>Etapa #2: ".$etapa2['estado'].
            "<br>Etapa #3: ".$etapa3['estado'].
            "</td>";
    $html = $html."<td>".$proyecto['coordinador']."</td>";
    //$html = $html."<td>".$evaluador1."</td>";
    //$html = $html."<td>".$evaluador2."</td>";
    $html = $html."<td>".$proyecto['linea']."</td>";
    $html = $html."</tr>";
    $html = $html."</tbody>";
    
   // unset($evaluador1);
    //unset($evaluador2);
}
}else{
   // echo "ni mierda";
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
$html = $html.'</table>';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', false);

// print colored table
//$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Reporte Investigacion', 'I');

exit();

function obtenerEvaluadores($proyecto){
    
    global $evaluador1 ;
    global $evaluador2 ;
    $consultaAsesores = "SELECT concat(ieevaluadores.nombre,' ',  ieevaluadores.apellido1, ' ', ieevaluadores.apellido2) as evaluador 
                         FROM ieevaluadores, ieevaluan where ieevaluan.estado = 1 and ieevaluan.proyecto = '".$proyecto."' and ieevaluan.evaluador = ieevaluadores.id; ";
    
    $query4 = mysqli_query($GLOBALS['connection'], $consultaAsesores);
    $evaluador1data = mysqli_fetch_assoc($query4);
    $evaluador2data = mysqli_fetch_assoc($query4);
    if(!isset($evaluador1data)){
      $evaluador1 = "No definido";
    }else{
        $evaluador1 = $evaluador1data['evaluador'];
    }
    
    if(!isset($evaluador2data)){
      $evaluador2 = "No definido";
    }else{
        $evaluador2 = $evaluador2data['evaluador'];
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