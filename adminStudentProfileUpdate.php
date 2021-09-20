<?php

	include("database.php");

	$conn = getDatabaseConnection();

	header("Access-Control-Allow-Origin: *");

	$data = file_get_contents("php://input");

	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/json; charset=UTF-8");     
	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data); 
	// echo $data;

	$id 				= $request->Id;
	$FullName 			= $request->FullName;
	$Email 				= $request->Email;
	$Contact 			= $request->Contact;
	$Gender 			= $request->Gender;
	$City 				= $request->City;
	$PinCode 			= $request->PinCode;
	$State 				= $request->State;
	$sscMarks 			= $request->sscMarks;
	$hscMarks 			= $request->hscMarks;
	$PolyMarks 			= $request->PolyMarks;
	$engineeringMarks 	= $request->EngineeringMarks;
	$ProjectDetails 	= $request->ProjectDetails;

	$success = array('Success Message' => "Data Updated Successfully");       
	$error = array('Error Message' => "Data Updated Failed" );

	$selectQuery = "UPDATE hungamatable SET FullName='$FullName', Email='$Email', Contact='$Contact', Gender='$Gender', City='$City', PinCode='$PinCode', State='$State', sscMarks='$sscMarks', hscMarks='$hscMarks', PolyMarks='$PolyMarks', EngineeringMarks='$engineeringMarks', ProjectDetails='$ProjectDetails' WHERE Id='$id'";
	// echo $selesctQuery;

	$result = mysqli_query($conn,$selectQuery);
 
	$count = mysqli_num_rows($result);
		// echo $count;

	if($result){ 
		echo json_encode($success); 
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn); 
?>