<?php include '../DBconfig.php';	
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);	
	$headerid = $obj['headerid'];
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}		
	
	$result = $conn->query("SELECT * FROM Image_Count WHERE Image_Header_Id  = '$headerid' ");
		
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
		$imgresult .= '{"Image_id":' . $value['Image_id']
			. '",'			
			. '"Image_Name":"' . $value['Image_Name'] . '",' 
			. '"Image_Header_Id":"' . $value['Image_Header_Id'] . '",'			
			. '"Image_Url_No":"' . $value['Image_Url_No'] . '",'	
			. '"Image_Title":"' . $value['Image_Title'] . '",'	
			. '"Image_Description":"' . $value['Image_Description'] . '",'
			. '"Dummy3":"' . $value['Dummy3'] . '",'
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

