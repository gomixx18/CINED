<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*set_time_limit(0);
require 'ftp.php';


$ftp = new ftp();
$ftp->conn('waws-prod-hk1-017.ftp.azurewebsites.windows.net', 'cined\cined', 'cined123');
$ftp->get('download/demo', '/demo'); // download live "/demo" folder to local "download/demo"

$ftp->put('/demo/test', 'upload/vjtest'); // upload local "upload/vjtest" to live "/demo/test"

$arr = $ftp->getLogData();
if ($arr['error'] != "")
    echo '<h2>Error:</h2>' . implode('<br />', $arr['error']);
if ($arr['ok'] != "")
    echo '<h2>Success:</h2>' . implode('<br />', $arr['ok'])*/

require_once 'WindowsAzure\WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;

use WindowsAzure\Common\ServiceException;
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=almacenamientocined;AccountKey=7EvXeLf3f7iU4OcS0RgzDBfmoUO6eSVO44KEQhuBtre6NDZXvzJDfWBa/C+dCtrYvDhlkVQOHZVxN/IjglEG6A==';
//$connectionString = 'UseDevelopmentStorage=true;DevelopmentStorageProxyUri=http://127.0.0.1';

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


$content = fopen("c:\hola.txt", "r");
$blob_name = "sql";

try {
    //Upload blob
    $blobRestProxy->createBlockBlob("tfg",$blob_name, $content);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
?>

