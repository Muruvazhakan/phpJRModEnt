<?php include '../DBconfig.php';	
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);	
	$imgs = $obj['imgs'];
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}	
	if($imgs == 'all'){
		$result = $conn->query("SELECT * FROM Header_Details ");
	}
	else
	{
		$result = $conn->query("SELECT * FROM Header_Details where  imgs ='$imgs' ");
	}
	
	
		
if ($result->num_rows > 0) {

	$resultarr = array();
	//$imgresult = "[";
	while ($row[] = $result->fetch_assoc()) {
		$resultarr = $row;
		//$data =$row[0]['user_name'];
		foreach ($resultarr as $value) {
			//print_r ($value[0]);							


		}
		//	
		$imgresult .= '{"Header_Details_id":' . $value['Header_Details_id']
			. '",'			
			. '"lightBg":"' . $value['lightBg'] . '",' 
			. '"lightTextDesc":"' . $value['lightTextDesc'] . '",'			
			. '"topLine":"' . $value['topLine'] . '",'	
			. '"label":"' . $value['label'] . '",'	
			. '"title":"' . $value['title'] . '",'
			. '"imgs":"' . $value['imgs'] . '",'
			. '"imgcount":"' . $value['imgcount'] . '",'
			. '"imgurl":"' . $value['imgurl'] . '",'	
			. '"titleimage":"' . $value['titleimage'] . '",'	
			. '"alt":"' . $value['alt'] . '",'
			. '"autoplay":"' . $value['autoplay'] . '",'
			. '"display_type":"' . $value['display_type'] . '",'
			. '"user_display":"' . $value['user_display'] . '",'
			. '"Dummy1":"' . $value['Dummy1'] . '",'
			. '"Dummy2":"' . $value['Dummy2'] . '"},';	
	}
	$imgresult = substr($imgresult, 0, -1);
	//$imgresult .= "]";
	echo json_encode($resultarr);
} else {
	if ($result->num_rows == 0) {
		echo  json_encode('No'); // 
	} else {
		echo json_encode('check internet connection');
	}
}
$conn->close();
		
?>

