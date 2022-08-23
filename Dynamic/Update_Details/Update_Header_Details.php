<?php include '../../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

    $lightBg =  $obj['lightBg'];
    $lightTextDesc =  $obj['lightTextDesc'];
$topLine =  $obj['topLine'];
    $label =  $obj['label'];
    $title =  $obj['title'];
    $imgcount =  $obj['imgcount'];
$imgurl =  $obj['imgurl'];
$imgs =  $obj['imgs'];
    $titleimage =  $obj['titleimage'];
    $alt =  $obj['alt'];
    $displaytype =  $obj['displaytype'];
    $userdisplay =  $obj['userdisplay'];
    $autoplay =   $obj['autoplay'];
    $headerid =   $obj['headerid'];
$screen =   $obj['screen'];

	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}
    
    if($screen =='update')
    {
        $updateHeaderDetails = $conn->query(" UPDATE Header_Details set lightBg = '$lightBg',label = '$label',lightTextDesc = '$lightTextDesc' , title = '$title' , imgcount = '$imgcount' ,titleimage = '$titleimage' , alt = '$alt' , autoplay = '$autoplay' , display_type = '$displaytype' , user_display = '$userdisplay',imgs = '$imgs'   where  Header_Details_id = '$headerid' ");
        
        if($updateHeaderDetails)
        {
            echo  json_encode('Updated');
        }
        else
        {
            echo json_encode('Updated Failed');
        }
    }
    else
    {
        $insertdet = $conn->query("INSERT INTO Header_Details (lightBg, lightTextDesc, topLine, label, title, imgcount, imgurl, titleimage, alt, autoplay, display_type, user_display,imgs) values('$lightBg','$lightTextDesc','$topLine','$label','$title','$imgcount','$imgurl','$titleimage','$alt','$autoplay','$displaytype','$userdisplay','$imgs')");
            
        if($insertdet)
        {
            echo  json_encode('Added');
        }
        else
        {
            echo json_encode('Issue in Adding Details');
        }
    }

	
	$conn->close();
?>

