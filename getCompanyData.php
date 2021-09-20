<?php

	include("database.php");

	$conn = getDatabaseConnection();  

	$id = $_GET["id"];

	$data = file_get_contents("php://input");

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8"); 
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data); 

	$success = array('Success Message' => "Data Selected Successfully.");       
	$error = array('Error Message' => "Data Selected Failed.");

	$selectQuery = "SELECT * FROM companydetail WHERE Id='$id'";

	$resultSet = mysqli_query($conn, $selectQuery); 
	$rowCount = mysqli_num_rows($resultSet);
	// echo $rowCount;

	if($rowCount > 0) { 
		echo json_encode(mysqli_fetch_assoc($resultSet)); 
		} else {
			echo json_encode($error);
		}
	// 	echo json_encode($data);
	// }else{
	// 	echo json_encode($error);	
	// }
 	mysqli_close($conn); 
?>