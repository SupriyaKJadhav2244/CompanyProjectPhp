<?php

	include("database.php");

	$conn = getDatabaseConnection();

	header("Access-Control-Allow-Origin: *");

	// $data = file_get_contents("php://input");

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$data = array();

	$success = array('Success Message' => "Data Selected Successfully");       
	$error = array('Error Message' => "Data Selected Failed " );

	$selectQuery = "SELECT * FROM companydetail";

	$result = mysqli_query($conn,$selectQuery);

	$count = mysqli_num_rows($result);
		// echo $count;

	if($count > 0){
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row; 
		}echo json_encode($data);
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn);


?>