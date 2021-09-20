<?php

	$id = $_GET["id"];
	include("database.php"); 
	$conn = getDatabaseConnection();
	
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: DELETE");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$success = array('Success Message' => "Data Deleted Successfully.");       
	$error = array('Error Message' => "Data Deleted Failed." );

	$selectQuery = "DELETE from admintable where Id='{$id}' ";

	$result = mysqli_query($conn,$selectQuery);

	$count = mysqli_num_rows($result);
		// echo $count;

	if ($result>0) {
		echo json_encode($success);
	}else{
		echo json_encode($error);
	}

	mysqli_close($conn); 

?>