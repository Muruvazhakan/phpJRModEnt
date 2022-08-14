<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

    $lightBg =  $obj['lightBg'];
    $lightTextDesc =  $obj['lightTextDesc'];
    $label =  $obj['label'];
    $title =  $obj['title'];
    $imgcount =  $obj['imgcount'];
    $titleimage =  $obj['titleimage'];
    $alt =  $obj['alt'];
    $displaytype =  $obj['displaytype'];
    $userdisplay =  $obj['userdisplay'];
    $autoplay =   $obj['autoplay'];
    $headerid =   $obj['headerid'];


	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}

	$updateHeaderDetails = $conn->query(" UPDATE Header_Details set lightBg = '$lightBg' ,lightTextDesc = '$lightTextDesc' ,  label = '$label' , title = '$title' , imgcount = '$imgcount' ,titleimage = '$titleimage' , alt = '$alt' , autoplay = '$autoplay' , display_type = '$displaytype' , user_display = '$userdisplay' where  Header_Details_id = '$headerid' ");
		
	if($updateHeaderDetails)
	{
		echo  json_encode('Updated');
	}
	else
	{
		echo json_encode('no');
	}
	$conn->close();
?>

