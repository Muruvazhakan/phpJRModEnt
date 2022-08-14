<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header('Content-Type: application/json; charset=utf-8');
require_once "vendor/autoload.php";

	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);

use Google\Cloud\Storage\StorageClient;
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

 
try {
    $storage = new StorageClient([
        'keyFilePath' => './helpone-d08bde72c412_gcp-storage.json',
    ]);
 
    $bucketName = 'helpone-9bf33.appspot.com;
    $bucket = $storage->bucket($bucketName);
    if (!$bucket->exists()) {
       
        echo json_encode('Your Bucket $bucket is ther');

    }
} catch(Exception $e) {
    echo json_encode('exception');
 
}
//$DIR = "/var/www/html/upload/";
//$response = array();
//$urlServer = 'http://43.204.119.91:3000';
//$fileName = $_FILES["image"]["name"];
//$FILE_NAME = rand(10, 1000000)."-".$fileName;
//        $UPLOAD_IMG_NAME = $DIR.strtolower($FILE_NAME);
//        $UPLOAD_IMG_NAME = preg_replace('/\s+/', '-', $UPLOAD_IMG_NAME);
//$tempFileName = $_FILES["image"]["tmp_name"];
//if(move_uploaded_file($tempFileName , $UPLOAD_IMG_NAME)) {
//    $response = array(
//        "status" => "success",
//        "error" => false,
//        "message" => "Image has uploaded",
//        "url" => $urlServer."/".$UPLOAD_IMG_NAME
//      );
//}else
//{
//    $response = array(
//        "status" => "error",
//        "error" => true,
//        "message" => "Error occured"
//    );
//}

//if($_FILES['image'])
//{
//    $fileName = $_FILES["image"]["name"];
//    $tempFileName = $_FILES["image"]["tmp_name"];
//    $error = $_FILES["image"]["error"];
//
//    if($error > 0){
//        $response = array(
//            "status" => "error",
//            "error" => true,
//            "message" => "Error uploading the file!"
//        );
//    }else
//    {
//        $FILE_NAME = rand(10, 1000000)."-".$fileName;
//        $UPLOAD_IMG_NAME = $DIR.strtolower($FILE_NAME);
//        $UPLOAD_IMG_NAME = preg_replace('/\s+/', '-', $UPLOAD_IMG_NAME);
//        move_uploaded_file($gs_name, 'gs://socalityapp/users/profile_pics/profile_pic.jpg');
//
//        if(move_uploaded_file($tempFileName , $UPLOAD_IMG_NAME)) {
//            $response = array(
//                "status" => "success",
//                "error" => false,
//                "message" => "Image has uploaded",
//                "url" => $urlServer."/".$UPLOAD_IMG_NAME
//              );
//        }else
//        {
//            $response = array(
//                "status" => "error",
//                "error" => true,
//                "message" => "Error occured"
//            );
//        }
//    }
//
//}

echo json_encode($response);

//	$imgtitle =  $obj['imgtitle'];
//    $imgdesc =  $obj['imgdesc'];
//    $imgurlno =  $obj['imgurlno'];
//    $imgheaderid =  $obj['imgheaderid'];
//$image =  $obj['image'];
//$type =  $obj['type'];
//
//     $bucketName = 'helpone-9bf33.appspot.com';
//     $objectName = '1.jpg';
//     $source = $image ;
//
//    $storage = new StorageClient();
//    $file = fopen($source, 'r');
//    $bucket = $storage->bucket($bucketName);
//    $object = $bucket->upload($file, [
//        'name' => $objectName
//    ]);
//    printf('Uploaded %s to gs://%s/%s' . PHP_EOL, basename($source), $bucketName, $objectName);
//    if($conn->connect_error)
//    {
//        die("Connection failes:" .$conn->connect_error);
//    }
//    if($type == 'create')
//{
//    $result = $conn->query("SELECT count(1) countnum FROM Image_Count WHERE Image_Header_Id  = '$headerid' ");
//
//    if ($result->num_rows > 0) {
//
//        $resultarr = array();
//        while ($row[] = $result->fetch_assoc()) {
//            $resultarr = $row;
//            $reqno =$row[0]['countnum'];
//
//        }
//        }
//    //echo  json_encode( $reqno + '$reqno ');
//    $imageurlno =$reqno+1;
//
//        $insertimgdet = $conn->query("insert into Image_Count (Image_Name,Image_Header_Id,Image_Url_No,Image_Title,Image_Description) values('$imageurlno','$headerid','$imageurlno','$imagetitle','$imagedescription')");
//
//        if($insertimgdet)
//        {
//            echo  json_encode($imageurlno);
//        }
//        else
//        {
//            echo json_encode('issue');
//        }
//
//}
//
//else
//{
//	$updateHeaderDetails = $conn->query(" UPDATE Image_Count set Image_Title = '$imgtitle' , Image_Description = '$imgdesc' where Image_Url_No = '$imgurlno' and Image_Header_Id = '$imgheaderid' ");
//
//	if($updateHeaderDetails)
//	{
//		echo  json_encode('Updated');
//	}
//	else
//	{
//		echo json_encode('no');
//	}
//}
	$conn->close();
?>

