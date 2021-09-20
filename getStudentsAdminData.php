<?php

	include("database.php");

	$conn = getDatabaseConnection();  

	$data = file_get_contents("php://input");

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data);

	$company = $request->company;
	$sscMarks = $request->sscMarks;
	$hsccMarks = $request->hsccMarks;
	$diploma = $request->diploma;
	$engineering = $request->engineering; 
	$technology = $request->technology;
	$gap = $request->gap;
	$detail = $request->detail;

	$success = array('Success Message' => "Data Updated Successfully.");       
	$error = array('Error Message' => "Data Update Failed");

	$updateQuery = "UPDATE companydetail SET sscMarks='$sscMarks', hsccMarks='$hsccMarks', diploma='$diploma', engineering='$engineering', technology='$technology', gap='$gap', detail='$detail' WHERE company='$company'";

	$result = mysqli_query($conn,$updateQuery);

	$count = mysqli_num_rows($result);
	// echo $count;

	if($result==1){
		echo json_encode($success);
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn); 

?> 