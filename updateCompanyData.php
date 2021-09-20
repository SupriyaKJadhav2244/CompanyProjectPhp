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

	$company 		= $request->company;
	$sscMarks 		= $request->sscMarks;
	$hsccMarks 		= $request->hsccMarks;
	$diploma 		= $request->diploma;
	$engineering 	= $request->engineering;
	$technology  	= $request->technology;
	$gap 		 	= $request->gap;
	$detail 	 	= $request->detail; 

	$success = array('Success Message' => "Data Inserted Successfully In Database");       
	$error = array('Error Message' => "Data Inserted Failed " );

	$insertQuery = "INSERT INTO companydetail(company,sscMarks,hsccMarks,diploma,engineering,technology,gap,detail)VALUES('".$company."','".$sscMarks."','".$hsccMarks."','".$diploma."','".$engineering."','".$technology."','".$gap."','".$detail."')";

	$result = mysqli_query($conn,$insertQuery);

	if($result){
		echo json_encode($success);
	}else{
		echo json_encode($error). mysqli_error($conn);
	}

	mysqli_close($conn);






?>