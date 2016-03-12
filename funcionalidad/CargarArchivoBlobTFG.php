<?php

require_once '..\WindowsAzure\WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=almacenamientocined;AccountKey=7EvXeLf3f7iU4OcS0RgzDBfmoUO6eSVO44KEQhuBtre6NDZXvzJDfWBa/C+dCtrYvDhlkVQOHZVxN/IjglEG6A==;BlobEndpoint=https://almacenamientocined.blob.core.windows.net/';
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


$nombre_archivo = $_FILES['file']['name'];
$archivo_bases = "https://almacenamientocined.blob.core.windows.net/tfg/files".$_FILES['file']["name"];
$content = fopen($_FILES["file"]["tmp_name"], "r");
$blob_name = "files/".$nombre_archivo;

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("421",$blob_name, $content);
}
catch(ServiceException $e){
   /* $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />"; */
    @session_start(); 
    $_SESSION["error"] = "¡Error al Cargar el archivo!";
    header("Location: ../navegacion/500.php");

}
?>
