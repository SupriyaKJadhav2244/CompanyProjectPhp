<?php

	$id = $_GET["id"];
	include("database.php"); 
	$conn = getDatabaseConnection();
	
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: DELETE");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$selectQuery = "DELETE from hungamatable where id='{$id}' ";
 
	$check = mysqli_query($conn, $selectQuery); 
	$result = mysqli_num_rows($check); 
	if($result > 0)
	{ 
		 echo "Data Deleted Successfully."; 
	}else{
		echo "Data Deleted Failed.".mysqli_error($conn);
	} 
	mysqli_close($conn);  
?>