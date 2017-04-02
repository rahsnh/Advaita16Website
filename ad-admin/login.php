<?php

		
		session_start();

		
		include("connection.php");
		
  	
  		if (filter_input(INPUT_POST, 'submit')=== "SIGN-UP") {	 

                        $error = "";	
            $email = filter_input(INPUT_POST, 'email');
			$password = filter_input(INPUT_POST, 'password');
			$usr = filter_input(INPUT_POST, 'usr');
			$firstname = filter_input(INPUT_POST, 'firstname');
		    $lastname = filter_input(INPUT_POST, 'lastname');
			$gender = filter_input(INPUT_POST, 'gender');
			$dob = filter_input(INPUT_POST, 'dob');
			$ph_no = filter_input(INPUT_POST, 'ph_no');
			$state = filter_input(INPUT_POST, 'state');
			$institution = filter_input(INPUT_POST, 'institution');
			$dept = filter_input(INPUT_POST, 'dept');
			$year = filter_input(INPUT_POST, 'year');
			$addr = filter_input(INPUT_POST, 'addr');
			
			$query= "SELECT * FROM `users` WHERE email ='".trim(mysqli_real_escape_string($link, $email))."' LIMIT 1";
			
			$result = mysqli_query($link, $query);	
			
			$results = mysqli_num_rows($result);
			
			if ($results) {
                            $error = "That email is already registered.";
                        }  
			else {
                    $hash = md5( rand(0,1000) );
			
						$to      = trim(mysqli_real_escape_string($link, $email)); // Send email to our user
                        $subject = 'Signup | Verification'; // Give the email a subject 
						$mail_name = trim(mysqli_real_escape_string($link, $firstname));
                        $message = ' <h2>Welcome To Advaita 2k16</h2>
                        <p>Thanks for signing up!</p> 
						<p>Your account has been created.</b>.
						<br>You can login to your Advaita account with the following credentials after you have activated your account by clicking the url below.</p>
 
<p><br>------------------------
<br>Email: '.trim(mysqli_real_escape_string($link, $email)).'
<br>Password: '.$password.'
<br>------------------------</p>
 
<p>Please click this link to activate your account:</p>
<p>https://advaita.io/ad-admin/verify.php?email='.trim(mysqli_real_escape_string($link, $email)).'&hash='.$hash.'</p>

'; // Our message above including the link

				/**
				* This example shows settings to use when sending over SMTP with TLS and custom connection options.
				*/
	
				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				date_default_timezone_set('Etc/UTC');
			
				require '../PHPMailer/PHPMailerAutoload.php';
			
				//Create a new PHPMailer instance
				$mail = new PHPMailer;
	
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();

				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;

				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';
			
				//Set the hostname of the mail server
				$mail->Host = $zohoHost;
			
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;
			
				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';
			
				//Custom connection options
				/*$mail->SMTPOptions = array (
					'ssl' => array(
					'verify_peer'  => true,
					'verify_depth' => 3,
					'allow_self_signed' => true,
					'peer_name' => 'smtp.example.com',
					'cafile' => '/etc/ssl/ca_cert.pem',
					)
				);*/
			
				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;
			
				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = $zohoUsername;
			
				//Password to use for SMTP authentication
				$mail->Password = $zohoPassword;
			
				//Set who the message is to be sent from
				$mail->setFrom($zohoUsername, 'ADVAITA IIIT-Bhubaneswar');
			
				//Set who the message is to be sent to
				$mail->addAddress($to, $mail_name);
			
				//Set the subject line
				$mail->Subject = $subject;
			
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				$mail->msgHTML($message);
			
				//send the message, check for errors
				if (!$mail->send()) {
				
					echo "<script type='text/javascript'>
						alert('$mail->ErrorInfo');
						location.replace('.');
					</script>";
				} else {
					
					$query = "INSERT INTO `users` (`email`, `password`, `hash`) VALUES ('".trim(mysqli_real_escape_string($link, $email))."', '".md5(md5($email).$password)."','".mysql_escape_string($hash)."')";					
						  
					mysqli_query($link, $query);
					
					$insert_id = mysqli_insert_id($link);
					if ($insert_id < 10 ) { $starting_id = "AD16000"; }
                          else if ($insert_id < 100 ) { $starting_id = "AD1600"; }
                          else if ($insert_id < 1000 ) { $starting_id = "AD160"; }
                          else { $starting_id = "AD16"; }
						  
					$a_id = $starting_id.$insert_id;
  
					$details_entry_query = "INSERT INTO `user_details` (`fname`,`lname`,`gender`,`dob`,`ph_no`,`state`,`institution`,`dept`,`year`,`advaita_id`,`link_id`,`fb_id`)VALUES ('".trim(mysqli_real_escape_string($link, $firstname))."','".trim(mysqli_real_escape_string($link, $lastname))."','".$gender."','".$dob."','".trim(mysqli_real_escape_string($link, $ph_no))."','".$state."','".trim(mysqli_real_escape_string($link, $institution))."','".trim(mysqli_real_escape_string($link, $dept))."','".$year."','".$a_id."','".$insert_id."','".trim(mysqli_real_escape_string($link, $usr))."')";
          
					mysqli_query($link, $details_entry_query);
                
					$signup_success = "You have been successfully signed up!Please verify it by clicking the activation link that has been send to your email.";
					echo "<script type='text/javascript'>
						alert('$signup_success');
						location.replace('../');
					</script>";
				}				
			}
		}

	if (filter_input(INPUT_POST, 'submit') === "SIGN-IN") {	
	
	    $loginemail = filter_input(INPUT_POST, 'loginemail');
		$loginpassword = filter_input(INPUT_POST, 'loginpassword');
	
		$query = "SELECT a.id, b.fname, b.lname, b.advaita_id, a.active FROM users a, user_details b WHERE a.id=b.link_id AND a.email='".trim(mysqli_real_escape_string($link, $loginemail))."' AND 
		a.password='" .md5(md5($loginemail) .$loginpassword). "' LIMIT 1";
		
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		if($row){
		     if(!$row['active']) {
                        $loginerror = "Please verify your account by clicking the activation link that has been send to your email.";
                     }
                     else {
						$_SESSION['id']=$row['id'];
                        $_SESSION['advaita_id']=$row['advaita_id'];
						$_SESSION['fname']=$row['fname'];
						$_SESSION['lname']=$row['lname'];
			
		        header('Location: ../');
                     }
    
		} else {
		
			$loginerror = "Please enter correct email and password";
			
			
		
		}
	
	}

	if (isset($_SESSION['id'])) {	
			
	              $query_register= "SELECT * FROM `membersU` WHERE member ='".$_SESSION['advaita_id']."' AND event_id ='".$event."' LIMIT 1";
	              $result_searches3 = mysqli_query($link, $query_register);	
				
				$results_search3 = mysqli_num_rows($result_searches3);
				
				if ($results_search3) {
	                            $active = 1;
	                        }
	    }
	
	
?>