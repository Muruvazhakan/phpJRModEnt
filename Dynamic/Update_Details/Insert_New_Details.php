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
$titleimage =  $obj['titleimage'];
$alt =  $obj['alt'];
$imgs =  $obj['imgs'];
$displaytype =  $obj['displaytype'];
$userdisplay =  $obj['userdisplay'];
$autoplay =   $obj['autoplay'];
	
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}


	$insertdet = $conn->query("INSERT INTO Header_Details (lightBg, lightTextDesc, topLine, label, title, imgcount, imgurl, titleimage, alt, autoplay, display_type, user_display,imgs) values('$lightBg','$lightTextDesc','$topLine','$label','$title','$imgcount','$imgurl','$titleimage','$alt','$autoplay','$displaytype','$userdisplay','$imgs')");
		
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

