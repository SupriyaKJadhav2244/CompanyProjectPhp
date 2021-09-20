<?php

	include("database.php");

	$conn = getDatabaseConnection();

	header("Access-Control-Allow-Origin: *");

	$data = file_get_contents("php://input");

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data); 

	$idCompany 				= $request->idCompany;
	$CompanyName 			= $request->CompanyName;  
	$YD 					= $request->YD;
	$technology 			= $request->technology; 
	$FullName 				= $request->FullName; 
	$Email 					= $request->Email;
	$Contact 				= $request->Contact;
	$Gender 				= $request->Gender;
	$City 					= $request->City;
	$PinCode 				= $request->PinCode;
	$State 					= $request->State;
	$sscMarks 				= $request->sscMarks;
	$hscMarks 				= $request->hscMarks;
	$PolyMarks 				= $request->PolyMarks;
	$EngineeringMarks 		= $request->EngineeringMarks;
	$ProjectDetails 		= $request->ProjectDetails;
 

	$success = array('Success Message' => "Data Inserted Successfully In Database");       
	$error = array('Error Message' => "Data Inserted Failed " );

	$insertQuery = "INSERT INTO studentsapplytocompany(StudentName,EmailId,Contact,Gender,City,Pincode,State,CompanyId,CompanyName,SSCObtainedMark,HSCObtainedMark,DiplomaObtainedMarks,EngineeringObtainedMarks,YearDrop,Technology,ProjectDetails)VALUES('".$FullName."','".$Email."','".$Contact."','".$Gender."','".$City."','".$PinCode."','".$State."','".$idCompany."','".$CompanyName."','".$sscMarks."','".$hscMarks."','".$PolyMarks."','".$EngineeringMarks."','".$YD."','".$technology."','".$ProjectDetails."')";

	// $insertQuery = "UPDATE studentsapplytocompany SET StudentName='$FullName',Contact='$Contact',Gender='$Gender',City='$City',Pincode='$PinCode',State='$State',CompanyId='$idCompany',CompanyName='$CompanyName',SSCObtainedMark='$sscMarks',HSCObtainedMark='$hscMarks',DiplomaObtainedMarks='$PolyMarks',EngineeringObtainedMarks='$EngineeringMarks',YearDrop='$YD',Technology='$technology',ProjectDetails='$ProjectDetails' WHERE EmailId='$Email'";

	$result = mysqli_query($conn,$insertQuery);

	if($result){
		echo json_encode($success);
	}else{
		echo json_encode($error). mysqli_error($conn);
	}

	mysqli_close($conn);

?>