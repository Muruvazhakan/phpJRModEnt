<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

    $uploadtype =  $obj['uploadtype'];
    $headerid =  $obj['headerid'];
    $imagetitle =  $obj['imagetitle'];
    $imagedescription =  $obj['imagedescription'];
    $imageurlno =  $obj['imageurlno'];   


	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}
    
    if($uploadtype =='modify')
    {
        $uploadimgdet = $conn->query(" UPDATE Image_Count set  Image_Title = '$imagetitle', Image_Description='$imagedescription' where Image_Header_Id = '$headerid' and  Image_Url_No ='$imageurlno' ");
        if($uploadimgdet)
        {
            echo  json_encode('Updated the Image Details');
        }
        else
        {
            echo json_encode('Issue in Upload');
        }
    }
    else if($uploadtype =='delete')
    {
        $deleteimgdet = $conn->query(" DELETE FROM Image_Count where Image_Header_Id = '$headerid' and  Image_Url_No ='$imageurlno' ");
        if($deleteimgdet)
        {
            echo  json_encode('Deleted the Image Details');
        }
        else
        {
            echo json_encode('Issue in Deleteion');
        }
    }
    else
    {       
            echo json_encode('Issue in Type');
    }

	
	$conn->close();
?>

