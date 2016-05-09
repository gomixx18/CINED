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
$codigo = $_POST['codigoProyecto'];
$etapa = $_POST['etapa'];
$tipo = $_POST['tipo'];
$isInvestigacion = $_POST['isInvestigacion'];


if(isset($_FILES['archivo']['name'])){
  $nombre_archivo = $_FILES['archivo']['name'];
}

if(!$codigo  || !$etapa || !$tipo || !$isInvestigacion){
    $_SESSION["error"] = "¡Hubo un error al cargar el archivo! POST_VARS";
    header("Location: ../navegacion/500.php");
}
$ubicacionArchivo = $codigo.'/ETAPA '.$etapa.'/'.$tipo.'/'.$usuario.'/';



try{
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=almacenamientocined;AccountKey=7EvXeLf3f7iU4OcS0RgzDBfmoUO6eSVO44KEQhuBtre6NDZXvzJDfWBa/C+dCtrYvDhlkVQOHZVxN/IjglEG6A==;BlobEndpoint=https://almacenamientocined.blob.core.windows.net/';
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
}
catch (RuntimeException $e){
    $_SESSION["error"] = "¡Hubo un error al cargar el archivo! Conexion Rechazada BD";
    header("Location: ../navegacion/500.php");
    exit();
}

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if (!$connection) {
     $_SESSION["error"] = "¡Hubo un error al cargar el archivo! Conexión a base de datos";
    header("Location: ../navegacion/500.php");
    exit();
}


$archivo_bases = "https://almacenamientocined.blob.core.windows.net/investigacionyextension/".$ubicacionArchivo.$nombre_archivo;
$content = fopen($_FILES['archivo']["tmp_name"], "r");
if(!$content){
   $_SESSION["error"] = "¡Hubo un error al cargar el archivo! FOPEN";
   header("Location: ../navegacion/500.php");
   exit();
}
$blob_name = $ubicacionArchivo.$nombre_archivo;
echo $blob_name;

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("investigacionyextension",$blob_name, $content);
    $dt = new DateTime();
    $fecha = $dt->format('Y-m-d H:i:s');
    if ($tipo == "archivoEvaluador") {
        $consulta = "INSERT INTO iearchivosevaluadores (evaluador, etapa, proyecto, ruta, fecha, nom_archivo) VALUES ( '" . $usuario . "' , " . $etapa .
                " , '" . $codigo . "','" . $archivo_bases . "' ,'" . $fecha ."','".$nombre_archivo."');";
    }
    if($tipo == 'archivoInvestigador'){
     $consulta  = "INSERT INTO iearchivosinvestigadores (investigador, etapa, proyecto, ruta, fecha, nom_archivo) VALUES ( '".$usuario."' , ".$etapa.
                 " ,'".$codigo."','".$archivo_bases."','".$fecha."','".$nombre_archivo."');";
    }
    if($tipo == 'archivoComiex'){
       $consulta  = "INSERT INTO iearchivoscomiex (miembrocomiex, etapa, proyecto, ruta, fecha, nom_archivo) VALUES ( '".$usuario."' , ".$etapa.
                 " , '".$codigo."','".$archivo_bases."' ,'".$fecha."','".$nombre_archivo."');";
    }
  
    $resultado = mysqli_query($connection, $consulta);
    
    if($resultado){
        
        
        
        if($isInvestigacion){
          echo '<html>';

    echo '<head>';
    echo '<title></title>';

    echo '</head>';

    echo '<body onload="enviar()" hidden>';
        echo '<script language="JavaScript">';
        echo 'function enviar(){';
        echo 'document.form.submit();';
        echo '}';
        echo '</script>';
        echo '<form id="form" name="form" method="POST" action="../consulta_Investigacion.php" >';
        echo '<input type="text" value="' . $codigo . '" name="codigo" />';
        echo '</form>';


        echo '</body>';

        echo '</html>';
        exit();
    }

    }else{
    $_SESSION["error"] = "¡Error al Cargar el archivo! Error Insert BD".$consulta;
    header("Location: ../navegacion/500.php");
    exit();
    }
   
}
catch(ServiceException $e){
    $_SESSION["error"] = "¡Error al Cargar el archivo! conexion al servicio de Blobs";
    header("Location: ../navegacion/500.php");
    exit();

}
?>
