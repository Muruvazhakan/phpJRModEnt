<?php include '../DBconfig.php';
	//header('Access-Control-Allow-Origin: ' . $HostSite);
	header("Access-Control-Allow-Origin:*");
	$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	 
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

	$name = $obj['name'];
	$mobile = $obj['mobile'];
	$comments = $obj['comments'];
	$emailid=$obj['emailid'];
	$date=$obj['date'];	
	$status='Client_Raised';
	
	if($conn->connect_error)
	{
		die("Connection failes:" .$conn->connect_error);
	}		
	
	$insertclientdetails = $conn->query("insert into Client_Contact_Details (Client_Name,Client_Comments,Client_Number,Client_Event_Date,Status,Client_Email_Id) values('$name','$comments','$mobile','$date','$status','$emailid')");
		
	if($insertclientdetails)
	{
		echo  json_encode('Added'); 
	}
	else
	{
		echo json_encode('check internet connection');		  
	}
	$conn->close();
?>

