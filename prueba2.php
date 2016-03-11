<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'WindowsAzure/WindowsAzure.php';

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\PublicAccessType;
use WindowsAzure\Common\ServiceException;

define("CONTAINERNAME", "mycontainer");
define("BLOCKBLOBNAME", "myblockblob");
define("BLOCKSIZE", 4 * 1024 * 1024);    // Size of the block, modify if needed.
define("PADLENGTH", 5);                  // Size of the string used for the block ID, modify if needed.
define("FILENAME", "myfile.txt");        // Local file to upload as a block blob.


// Create blob REST proxy.

$connectionString = 'DefaultEndpointsProtocol=http;AccountName=almacenamientocined;AccountKey=7EvXeLf3f7iU4OcS0RgzDBfmoUO6eSVO44KEQhuBtre6NDZXvzJDfWBa/C+dCtrYvDhlkVQOHZVxN/IjglEG6A==';

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


// OPTIONAL: Set public access policy and metadata.
// Create container options object.
$createContainerOptions = new CreateContainerOptions();

// Set public access policy. Possible values are
// PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
// CONTAINER_AND_BLOBS:
// Specifies full public read access for container and blob data.
// proxys can enumerate blobs within the container via anonymous
// request, but cannot enumerate containers within the storage account.
//
// BLOBS_ONLY:
// Specifies public read access for blobs. Blob data within this
// container can be read via anonymous request, but container data is not
// available. proxys cannot enumerate blobs within the container via
// anonymous request.
// If this value is not specified in the request, container data is
// private to the account owner.
$createContainerOptions->setPublicAccess(PublicAccessType::BLOBS_ONLY);

// Set container metadata.
$createContainerOptions->addMetaData("Category", "Image");


try {
    // Create container.
    $meta = $createContainerOptions->getMetadata();
     $blobRestProxy->createContainer("contenedorNuevo");
    
    echo $meta;
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