<?php
include("database.php");

    $conn = getDatabaseConnection();

    // header("Access-Control-Allow-Origin: *");

    // $data = file_get_contents("php://input");

    // header("Content-Type: application/json; charset=UTF-8");
    // header("Access-Control-Allow-Methods: POST");
    // header("Access-Control-Max-Age: 3600");
    // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
     
    // $request = json_decode($data);

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST"); 
        $response = array();
        $upload_dir = 'upload/';
        $server_url = 'http://127.0.0.1/';


        if($_FILES['avatar'])
        { 
            $userEmailKey = $_POST["userEmailKey"];

            // $ar = array();

            // $ar[0]=$userEmailKey;

            $avatar_name = $_FILES["avatar"]["name"];
            $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
            $error = $_FILES["avatar"]["error"]; 

            if($error > 0){
                $response = array(
                    "status" => "error",
                    "error" => true,
                    "message" => "Error uploading the file!"
                );
            }else 
            {
                $random_name = rand(1000,1000000)."-".$avatar_name;
                $upload_name = $upload_dir.strtolower($random_name);
                $upload_name = preg_replace('/\s+/', '-', $upload_name);
            
                if(move_uploaded_file($avatar_tmp_name , $upload_name)) {

                    $updateQuery = "UPDATE studentsapplytocompany SET Resume ='$avatar_name'";

                    // $updateQuery = "INSERT INTO studentsapplytocompany(Resume)VALUES('".$avatar_name."')";

                    $result = mysqli_query($conn,$updateQuery);

                    $response = array(
                        "status" => "success",
                        "error" => false,
                        "message" => "File uploaded successfully",
                        "url" => $server_url."/".$upload_name
                      );
                }else
                {
                    $response = array(
                        "status" => "error",
                        "error" => true,
                        "message" => "Error uploading the file!"
                    );
                }
            } 
        }else{
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "No file was sent!"
            );
        }

        echo json_encode($ar); 
?>