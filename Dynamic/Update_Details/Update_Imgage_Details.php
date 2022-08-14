<?php
use Google\Cloud\Storage\StorageClient;
header("Access-Control-Allow-Origin:*");
require_once "./vendor/autoload.php";
//include '../../DBconfig.php';
//namespace Google\Cloud\Samples\Auth;
$serviceAccountPath='./helpone-d08bde72c412_gcp-storage.json';
$projectId = 'helpone-9bf33';
$bucketName = 'helpone-9bf33.appspot.com';
header('Content-Type: application/json');
//$obj = json_decode(file_get_contens("php://input"));

$json = file_get_contents('php://input');
 $obj = json_decode($json,true);
$imgdata= json_decode($json);
//echo json_encode($imgdata);
if($imgdata['image'])
{
//                      echo json_encode($imgdata['image']);
}
                      
try {
    $storage = new StorageClient([
        'keyFilePath' => getcmd().$serviceAccountPath,
    ]);


    $bucket = $storage->bucket($bucketName);
    if (!$bucket->exists()) {

        echo json_encode('img is there');
    }
} catch(Exception $e) {
    echo json_encode($e);
}


?>

