<?php
header('Content-Type: application/json;charset=utf-8');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: PUT, GET, POST");
include './DBconfig.php';
$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
//$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
require_once "vendor/autoload.php";
$response = array();
use Google\Cloud\Storage\StorageClient;
//$json = file_get_contents('php://input');
//$obj = json_decode($json,true);
$avatar =  $obj['avatar'];
    $storage = new StorageClient([
        'keyFilePath' => './helpone-d08bde72c412_gcp-storage.json',
    ]);

   $avatar_name = $_FILES["avatar"]["name"];

   $uploadtype = $_POST["uploadtype"];
   $folder_name = $_POST["foldername"];
   $filename = $_POST["filename"];
   $headerid = $_POST["headerid"];
   $imagetitle = $_POST["imgtitle"];
   $imagedescription = $_POST["imgdesc"];
   //$newfolder_name = 'ModularKitchen';
   $bucketName = 'helpone-9bf33.appspot.com';
   $bucket = $storage->bucket($bucketName);
   $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
//   $countfiles = count($_POST);

//   $fileName = $_FILES["avatar"]["name"];
//if($folder){
//    $folder='/'. $folder. '/';
//}
//$info = $folder->info();
//print_r($obj);
//    $cloudPath = 'jrmodularenterprises/'.$newfolder_name'/' . $avatar_name;
  

//foreach($_FILES["folder"] as $result) {
//    echo $result;
//}
//$response = array(
//                    "status" => "success",
//                    "error" => false,
//                    "message" => $_FILES,
//
//                  );

    if ($bucket->exists()) {
        if($uploadtype =='create')
            {
                $result = $conn->query("SELECT count(1) countnum FROM Image_Count WHERE Image_Header_Id  = '$headerid' ");
                if ($result->num_rows > 0) {
                   
                    $resultarr = array();
                    while ($row[] = $result->fetch_assoc()) {
                        $resultarr = $row;
                        $reqno =$row[0]['countnum'];
                    }
                }
                $imageurlno =$reqno+1;
                $insertimgdet = $conn->query("insert into Image_Count (Image_Name,Image_Header_Id,Image_Url_No,Image_Title,Image_Description) values('$imageurlno','$headerid','$imageurlno','$imagetitle','$imagedescription')");
                $filename=$imageurlno.'.jpg';
                if($insertimgdet)
                {
                    echo  json_encode('Added');
                }
                else
                {
                    echo json_encode('issue');
                }
            }
//        else if($uploadtype=='modify')
//        {
//            -
//        }
        $cloudPath = 'jrmodularenterprises/'.$folder_name.'/' . $filename;
        $filetmpName = $avatar_tmp_name;
//        $fileName = 'jr1.jpg';
        $file = fopen($filetmpName, 'r');
            $bucket = $storage->bucket($bucketName);
            $object = $bucket->upload(
                    $file,
                     ['name' => $cloudPath]
//            fopen($fileName, 'r')
//                fopen($fileName,  'name' => $avatar_name
//            )
            );
//        $response = array(
//                            "status" => "success",
//                            "error" => false,
//                            "message" => $folder_name,
//
//                          );
//        echo json_encode($filename);
        
        
    }

?>
