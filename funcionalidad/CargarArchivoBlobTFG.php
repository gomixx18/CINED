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
}

$nombre_archivo = $_FILES[$tipo]['name'];
$archivo_bases = "https://almacenamientocined.blob.core.windows.net/tfg/".$ubicacionArchivo.$nombre_archivo;
$content = fopen($_FILES[$tipo]["tmp_name"], "r");
if($content){
   $_SESSION["error"] = "¡Hubo un error al cargar el archivo! FOPEN";
   header("Location: ../navegacion/500.php");
}
$blob_name = $ubicacionArchivo.$nombre_archivo;

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("tfg",$blob_name, $content);
    @session_start();
    header("Location: ../consulta_TFG.php?codigo=".$codigo);
}
catch(ServiceException $e){
    @session_start(); 
    $_SESSION["error"] = "¡Error al Cargar el archivo!";
    header("Location: ../navegacion/500.php");

}
?>
