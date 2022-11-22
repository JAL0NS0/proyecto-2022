<?php 
declare(strict_types=1);

use AzurePHP\Service\AzureBlobService;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

require_once __DIR__ . '/../vendor/autoload.php';

if ([] === $_FILES || !isset($_FILES['blob'])) {
    echo file_get_contents(__DIR__ . 'tpl/upload-form.tpl');
    return;
}
$connectionString = $_SERVER['AZURE_STORAGE_CONNECTION_STRING'] ?: '';
if ('' === $connectionString) {
    throw new InvalidArgumentException(
        'Please set the environment variable STORAGE_CONN_STRING with the Azure Blob Connection String'
    );
}
$blobClient = BlobRestProxy::createBlobService($connectionString);
$blobService = new AzureBlobService($blobClient);

?>