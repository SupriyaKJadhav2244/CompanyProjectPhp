<?php
	include("database.php");

	$conn = getDatabaseConnection();
	header("Access-Control-Allow-Origin: *");
	$data = file_get_contents("php://input");

	header("Content-Type: text/plain; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data);

	$email		= $request->email;
	$cmobile 	= $request->cmobile;

	// 	$success = array('Success Message' => "Login Successfully.");       
	// 	$error = array('Error Message' => "Login Failed." );
		$error = array('Email' => "",'Contact' =>"" );

		$selectQuery = "SELECT * FROM hungamatable WHERE Email='$email' AND Contact='$cmobile' ";

		$resultSet = mysqli_query($conn, $selectQuery); 
		$rowCount = mysqli_num_rows($resultSet);  
		
		if($rowCount > 0) {  
			echo json_encode(mysqli_fetch_assoc($resultSet)); 
		} else {
			echo json_encode($error);
		}

	//  if($rowCount > 0) { 
	// 	while($row = mysqli_fetch_assoc($resultSet)) {  
	// 		$data[] = $row;
	// 	}
	// 	echo json_encode($data);
	// }else{
	// 	echo "Record Selected Failed".mysqli_error($conn);
	// }
	mysqli_close($conn);	


?>