<?php include '../DBconfig.php';	
	include('config.php');	
	$json = file_get_contents('php://input'); 
	header("Access-Control-Allow-Origin:*");	
	$obj = json_decode($json,true);	
	
	$conn = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);	
	
	$name=$obj['name'];
	$mobile=$obj['mobile'];
	$emailid=$obj['emailid'];
	$password=$obj['password'];
	$type=$obj['type'];
	
	$checkflag=0;
				
	if($type == 'create')	
	{			
		$Userid= $conn->query("SELECT User_Id FROM User_Profile where User_Mobile_Number='$mobile' ");	
		if($Userid->num_rows == 0)
		{
			$insertuser= $conn->query("insert into User_Profile (User_Name,User_Mobile_Number,User_Password,User_Email_Id,User_Status) 
			values('$name','$mobile','$password','$emailid','Active') "); 			
			// User_Status
			if($insertuser)
			{
				$checkflag=1;	// Created				
			}
			else
			{
				$checkflag=0;	//Issue
			}
			
		}
		else{
			$checkflag=11; // Already registed
		}
	}
	else
	{	
		$Usercheck= $conn->query("SELECT User_Id FROM User_Profile where User_Mobile_Number='$mobile' and User_Password ='$password' and User_Status='Active' "); 

		if($Usercheck->num_rows > 0)
		{
			$checkflag=2; // Login Succ
		}
		else
		{
			$checkflag=12; //Not found
		}
					
	}			
	
	echo json_encode($checkflag);
	
	

	$conn->close();
?>

