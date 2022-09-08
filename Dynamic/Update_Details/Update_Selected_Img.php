<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

	$uploadtype = $_POST["uploadtype"];
	$folder_name = $_POST["foldername"];
	$filename = $_POST["filename"];
	$headerid = $_POST["headerid"];
	$imagetitle = $_POST["imgtitle"];
	$imagedescription = $_POST["imgdesc"];
	//$newfolder_name = 'ModularKitchen';
	$bucketName = 'helpone-9bf33.appspot.com';
	
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}

	Full texts
	Image_id	
	Image_Name	
	Image_Header_Id	
	Image_Url_No	
	Image_Title	
	Image_Description	
	Dummy1	
	Dummy2	
	Dummy3	
	Created_TimeStamp

	$insertimgdet = $conn->query("insert into Image_Count (Image_Name,Image_Header_Id,Image_Url_No,Image_Title,Image_Description) values('$imageurlno','$headerid','$imageurlno','$imagetitle','$imagedescription')");
              	
	if($insertdet)
	{
		echo  json_encode('Added');
	}
	else
	{
		echo json_encode('issue');
	}
	$conn->close();
?>

