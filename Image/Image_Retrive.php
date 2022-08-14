<?php include '../DBconfig.php';	
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);	
	
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}		
	
	$result = $conn->query("SELECT * FROM Images_Entry");
		
if ($result->num_rows > 0) {

	$resultarr = array();
	//$imgresult = "[";
	while ($row[] = $result->fetch_assoc()) {
		$resultarr = $row;
		//$data =$row[0]['user_name'];
		foreach ($resultarr as $value) {
			//print_r ($value[0]);							


		}
		$imgresult .= '{"Modularkitchen":' . $value['Modularkitchen']
			. '",'			
			. '"CupBoard":"' . $value['CupBoard'] . '",' 
			. '"Netlon":"' . $value['Netlon'] . '",'			
			. '"Showcases":"' . $value['SHOWCASES'] . '",'	
			. '"FalseCeiling":"' . $value['FalseCeiling'] . '",'	
			. '"AluminumWindow":"' . $value['AluminumWindow'] . '",'
			. '"extra1":"' . $value['extra1'] . '",'
			. '"extra2":"' . $value['extra2'] . '",'
			. '"extra3":"' . $value['extra3'] . '",'
			. '"PvcDoor":"' . $value['PvcDoor'] . '"},';	
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

