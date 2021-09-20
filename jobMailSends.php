<?php

	$id = 15;//$_GET["id"];
	include("database.php"); 
	$conn = getDatabaseConnection();
	
	header("Access-Control-Allow-Origin: *"); 
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


	$selectJob = "SELECT * FROM companydetail where id='{$id}'"; 
	$jobResultSet = mysqli_query($conn, $selectJob); 
	$rowCount= mysqli_num_rows($jobResultSet); 

	$company=$sscMarks=$hsccMarks=$diploma=$engineering="";

	if($rowCount > 0)
	{ 
		 if($jobRow = mysqli_fetch_array($jobResultSet)) {  
			 $company=$jobRow["company"];
			 $sscMarks=$jobRow["sscMarks"];
			 $hsccMarks=$jobRow["hsccMarks"];
			 $diploma=$jobRow["diploma"];
			 $engineering=$jobRow["engineering"];
			 $technology=$jobRow["technology"];
			 $gap=$jobRow["gap"];

			 // echo $company ." , ". $sscMarks ." , ". $hsccMarks ." , ". $diploma ." , ". $engineering ." , ". $technology ." , ". $gap;
		  } 
	}else{
		echo "Record Selected Failed".mysqli_error($conn);
	} 
 
	 			require 'mailSend/PHPMailerAutoload.php'; 
                $mail = new PHPMailer;
                $mail->Host = gethostbyname('smtp.gmail.com');
                $mail->isSMTP();                                                  // Set mailer to use SMTP
                //$mail->Host = 'smtp.gmail.com';                                   // Specify main and backup server
                $mail->SMTPAuth = true;                                           // Enable SMTP authentication
                $mail->Username = "jadhav.sandhya843@gmail.com";
				$mail->Password = "9960432740San@";
                $mail->SMTPSecure = 'tls';                                        // Enable encryption, 'ssl' also accepted
                $mail->Port = 587;                                                //Set the SMTP port number - 587 for authenticated TLS
                $mail->setFrom('jadhav.sandhya843@gmail.com', 'Campus Recrutments');            //Set who the message is to be sent from
                // $mail->addReplyTo('jadhav.prashant843@gmail.com', 'First Pr');         //Set an alternative reply-to address
                
                
                $mail->WordWrap = 50;   
                $mail->Subject = 'Your Profile is selected for '.$company. "IT Company.";
                $mail->SMTPOptions = array(
  				      'ssl' => array(
  				        'verify_peer' => false,
  				        'verify_peer_name' => false,
  				        'allow_self_signed' => true
  				      )
				        );

                 
            
			$selectStudents = "SELECT * FROM hungamatable";
			$studentResultSet = mysqli_query($conn, $selectStudents); 

			while($studentRow = mysqli_fetch_array($studentResultSet)){  
				 $query = "Congratulation ".$studentRow["FullName"]." Your Profile is short Listed for ".$company." IT Company So our HR Will connect with you withine 4 days on your same mail id, be prepare for F2F Interview.";
                
				if(($studentRow["sscMarks"]>= $sscMarks) && (($studentRow["hscMarks"]>=$hsccMarks) || ($studentRow["PolyMarks"] >= $diploma)) && ($studentRow["EngineeringMarks"]>= $engineering)){ 
 
                $mail_text=nl2br('Dear '.$studentRow["FullName"]. "\n \n". $query);

            	$mail->addAddress($studentRow["Email"]);  // Add a recipient
                $mail->Body = $mail_text;  
                if(!$mail->send()) {
                    echo 'Message could not be sent.'.$studentRow["Email"];
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    exit;
               	} 	
 			}  
		}  
	mysqli_close($conn);  
?>