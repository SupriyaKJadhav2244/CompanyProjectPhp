<?php

	include("database.php");

	$conn = getDatabaseConnection();

	$data = file_get_contents("php://input");

	header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");     
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 

	$request = json_decode($data); 
	$Email = $request->Email;
	// echo $Email ;	

	$success = array('Success Message' => "Data Selected Successfully");       
	$error = array('Email' => ""); 

	$selectQuery = "SELECT * from admintable where Email='$Email'"; 

	$result = mysqli_query($conn,$selectQuery);

	$rowCount = mysqli_num_rows($result);
		// echo $rowCount;

		if($rowCount>0){  
				// $data = array('FullName'=>$row["FullName"], 'Email'=>$row["Email"], 'ContactNo'=>$row["ContactNo"], 'Designation'=>$row["Designation"]);
			echo json_encode($row = mysqli_fetch_assoc($result)); 
		}else{
			echo json_encode($error);
		 }

		mysqli_close($conn); 

?>