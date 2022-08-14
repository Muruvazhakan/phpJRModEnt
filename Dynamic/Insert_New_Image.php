<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

    $headerid = $obj['headerid'];
    $imagetitle=$obj['imgtitle'];
    $imagedescription=$obj['imgdesc'];
	
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}

$result = $conn->query("SELECT count(1) countnum FROM Image_Count WHERE Image_Header_Id  = '$headerid' ");

if ($result->num_rows > 0) {
   
    $resultarr = array();
    while ($row[] = $result->fetch_assoc()) {
        $resultarr = $row;
        $reqno =$row[0]['countnum'];
        
    }
    }
//echo  json_encode( $reqno + '$reqno ');
$imageurlno =$reqno+1;

	$insertimgdet = $conn->query("insert into Image_Count (Image_Name,Image_Header_Id,Image_Url_No,Image_Title,Image_Description) values('$imageurlno','$headerid','$imageurlno','$imagetitle','$imagedescription')");
		
	if($insertimgdet)
	{
		echo  json_encode($imageurlno);
	}
	else
	{
		echo json_encode('issue');
	}
	$conn->close();
?>

