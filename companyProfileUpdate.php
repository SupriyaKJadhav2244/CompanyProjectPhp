<?php

	$id = $_GET["id"];
	include("database.php"); 
	$conn = getDatabaseConnection();
	
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); 

	$success = array('Success Message' => "Data Selected Successfully.");       
	$error = array('Error Message' => "Data Selected Failed");

	$selectQuery = "SELECT * FROM companydetail WHERE id='$id'";

	$result = mysqli_query($conn,$selectQuery);

	$count = mysqli_num_rows($result);
		// echo $count;

	if($count > 0){
		if($row = mysqli_fetch_assoc($result)) {  
			echo json_encode($row);
		  } 
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn);  
?>