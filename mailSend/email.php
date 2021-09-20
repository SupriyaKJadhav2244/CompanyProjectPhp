<?php
 


                require 'PHPMailerAutoload.php'; 
                $mail = new PHPMailer;
                $mail->Host = gethostbyname('smtp.gmail.com');
                $mail->isSMTP();                                                  // Set mailer to use SMTP
                //$mail->Host = 'smtp.gmail.com';                                   // Specify main and backup server
                $mail->SMTPAuth = true;                                           // Enable SMTP authentication
                $mail->Username = "jadhav.sandhya843@gmail.com";
				        $mail->Password = "9960432740San@";
                $mail->SMTPSecure = 'tls';                                        // Enable encryption, 'ssl' also accepted
                $mail->Port = 587;                                                //Set the SMTP port number - 587 for authenticated TLS
                $mail->setFrom('jadhav.prashant843@gmail.com', 'pra');            //Set who the message is to be sent from
                $mail->addReplyTo('jadhav.prashant843@gmail.com', 'First Pr');         //Set an alternative reply-to address
                $mail->addAddress("jadhav.prashant843@gmail.com", 'Pr');  // Add a recipient
                $mail->WordWrap = 50;   
                $mail->Subject = 'Your Password Forgot Link Click On';
                $mail->SMTPOptions = array(
  				      'ssl' => array(
  				        'verify_peer' => false,
  				        'verify_peer_name' => false,
  				        'allow_self_signed' => true
  				      )
				        );

                $message = "Hi"; 
                $mail->Body    = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    exit;
               } 