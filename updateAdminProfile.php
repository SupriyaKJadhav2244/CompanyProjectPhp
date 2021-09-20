<?php 

	include("database.php");

	$conn = getDatabaseConnection();

	header("Access-Control-Allow-Origin: *");

	$data = file_get_contents("php://input");

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	 
	$request = json_decode($data);

	$Id 		= $request->Id;
	$Adminname 	= $request->Name;
	$contact 	= $request->ContactNo;
	$email 		= $request->Email;
	$password	= $request->Password;
	$occupation	= $request->Occupation; 

	$success = array('Success Message' => "Data Updated Successfully In Database");       
	$error = array('Error Message' => "Data Updated Failed " );

	$updateQuery = "UPDATE admintable SET Name='$Adminname',ContactNo='$contact',Email='$email',Password='$password',Occupation='$occupation' WHERE Id='$Id'";

	$result = mysqli_query($conn,$updateQuery);

	if($result){
		echo json_encode($success);
	}else{
		echo json_encode($error);
	}

	// echo $updateQuery;

	mysqli_close($conn); 
?>