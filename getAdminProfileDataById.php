<?php
	$id = $_GET["id"];
	include("database.php"); 
	$conn = getDatabaseConnection();
	
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	 
	$selectQuery = "SELECT * FROM admintable where Id='{$id}' LIMIT 1"; 
	$check = mysqli_query($conn, $selectQuery); 
	$result = mysqli_num_rows($check); 
	if($result > 0)
	{ 
		 if($row = mysqli_fetch_assoc($check)) {  
			echo json_encode($row);
		  } 
	}else{
		echo "Record Selected Failed".mysqli_error($conn);
	} 
	mysqli_close($conn); 
 
?>