<?php

	include("database.php");

	$conn = getDatabaseConnection();
	// echo $conn;

	header("Access-Control-Allow-Origin: *");

	$data = file_get_contents("php://input");

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data);

	$Fname 		= $request->Fname;
	$email 		= $request->email;
	$cmobile 	= $request->cmobile;
	$gender 	= $request->gender;
	$city 		= $request->city;
	$pin 		= $request->pin;
	$state 		= $request->state;

	$success = array('Success Message' => "Data Inserted Successfully In Database");       
	$error = array('Error Message' => "Data Inserted Failed " );

	$insertQuery = "INSERT INTO hungamatable(FullName,Email,Contact,Gender,City,PinCode,State)VALUES('".$Fname."','".$email."','".$cmobile."','".$gender."','".$city."','".$pin."','".$state."')";

	$result = mysqli_query($conn,$insertQuery);

	if($result){
		echo json_encode($success);
	}else{
		echo json_encode($error). mysqli_error($conn);
	}

	mysqli_close($conn);

?>