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

	$email		= $request->email;
	$password	= $request->password;

	 // $success = array('Success Message' => "Login Successfully.");       
	// $error = array('Error Message' => "Login Failed." );
	$error = array('Email' => "",'Password' =>"" );

	$selectQuery = "SELECT * FROM admintable WHERE Email='$email'";

	$result = mysqli_query($conn,$selectQuery);

	$count = mysqli_num_rows($result);
		// echo $count;

	if($count>0){
		echo json_encode(mysqli_fetch_assoc($result));
	}else{
		echo json_encode($error);	
	}
 	mysqli_close($conn);

?>