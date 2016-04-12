<?php
include '../clases/UsuarioSimple.php';
include '../clases/UsuarioComplejo.php';
include '../clases/UsuarioPermisos.php';
include '../clases/UsuarioInvestigadorSimple.php';
include '../clases/UsuarioInvestigadorComplejo.php';
require_once '..\WindowsAzure\WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

@session_start();
date_default_timezone_set('America/Costa_Rica');
$usuarioPermisos = $_SESSION['permisos'];
$usuario = $_SESSION['user']->getId();
$codigo = $_POST['codigoTFG'];
$etapa = $_POST['etapa'];
$tipo = $_POST['tipo'];

if(!$codigo  || !$etapa || !$tipo){
    $_SESSION["error"] = "¡Hubo un error al cargar el archivo! POST_VARS";
    header("Location: ../navegacion/500.php");
}
$ubicacionArchivo = $codigo.'/ETAPA '.$etapa.'/'.$usuario.'/';



try{
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=almacenamientocined;AccountKey=7EvXeLf3f7iU4OcS0RgzDBfmoUO6eSVO44KEQhuBtre6NDZXvzJDfWBa/C+dCtrYvDhlkVQOHZVxN/IjglEG6A==;BlobEndpoint=https://almacenamientocined.blob.core.windows.net/';
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
}
catch (RuntimeException $e){
    $_SESSION["error"] = "¡Hubo un error al cargar el archivo! Conexion Rechazada";
    header("Location: ../navegacion/500.php");
    exit();
}

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if (!$connection) {
     $_SESSION["error"] = "¡Hubo un error al cargar el archivo! Conexión a base de datos";
    header("Location: ../navegacion/500.php");
    exit();
}

$nombre_archivo = $_FILES['archivo']['name'];
$archivo_bases = "https://almacenamientocined.blob.core.windows.net/tfg/".$ubicacionArchivo.$nombre_archivo;
$content = fopen($_FILES['archivo']["tmp_name"], "r");
if(!$content){
   $_SESSION["error"] = "¡Hubo un error al cargar el archivo! FOPEN";
   header("Location: ../navegacion/500.php");
   exit();
}
$blob_name = $ubicacionArchivo.$nombre_archivo;

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("tfg",$blob_name, $content);
    $dt = new DateTime();
    $fecha = $dt->format('Y-m-d H:i:s');
    if ($tipo == "archivoDirector") {
        $consulta = "INSERT INTO tfgarchivosdirectores (director, etapa, tfg, ruta, fecha) VALUES ( " . $usuario . " , " . $etapa .
                " , '" . $codigo . "','" . $archivo_bases . "' ,'" . $fecha . "');";
    }
    if($tipo == 'archivoAsesor'){
     $consulta  = "INSERT INTO tfgarchivosasesores (asesor, etapa, tfg, ruta, fecha) VALUES ( ".$usuario." , ".$etapa.
                 " ,'".$codigo."','".$archivo_bases."','".$fecha."');";    
    }
    if($tipo == 'archivoMiembroComision'){
       $consulta  = "INSERT INTO tfgarchivoscomision (miembrocomision, etapa, tfg, ruta, fecha) VALUES ( ".$usuario." , ".$etapa.
                 " , '".$codigo."','".$archivo_bases."' ,'".$fecha."');";     
    }
    echo $consulta;
    $resultado = mysqli_query($connection, $consulta);
    echo $resultado;
    if($resultado){
        
        @session_start();
        header("Location: ../consulta_TFG.php?codigo=".$codigo);
        exit();
    }
   
}
catch(ServiceException $e){
    @session_start(); 
    $_SESSION["error"] = "¡Error al Cargar el archivo!";
    header("Location: ../navegacion/500.php");
    exit();

}
?>
