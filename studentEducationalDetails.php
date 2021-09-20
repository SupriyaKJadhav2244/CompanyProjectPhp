<?php

	include("database.php");

	$conn = getDatabaseConnection();

	header("Access-Control-Allow-Origin: *");

	$data = file_get_contents("php://input");

	header("Content-Type: application/json; charset=UTF-8");     
	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data); 

	$FullName 			= $request->FullName;
	$Email 				= $request->Email;
	$sscMarks 			= $request->sscMarks;
	$hscMarks 			= $request->hscMarks;
	$PolyMarks 			= $request->PolyMarks;
	$EngineeringMarks 	= $request->EngineeringMarks;
	$ProjectDetails 	= $request->ProjectDetails; 

	$success = array('Success Message' => "Data Inserted Successfully In Database");       
	$error = array('Error Message' => "Data Inserted Failed " );

	$updateQuery = "UPDATE hungamatable SET sscMarks='$sscMarks',hscMarks='$hscMarks',PolyMarks='$PolyMarks',EngineeringMarks='$EngineeringMarks',ProjectDetails='$ProjectDetails' WHERE Email='$Email'";

	$result = mysqli_query($conn,$updateQuery);


	if($result){
		echo json_encode($success);
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn); 
?> 
	 
     