<?php

		
		session_start();

		
		include("connection.php");

                $registration_error="";

                $query_search= "SELECT * FROM `eventU` WHERE unique_name ='".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'TeamName'))."' AND event_id ='".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'event_id'))."' LIMIT 1";
			
			$result_search = mysqli_query($link, $query_search);	
			
			$results_search = mysqli_num_rows($result_search);
			
			if ($results_search) {
                            $registration_error.= "<li>Team name '".filter_input(INPUT_POST, 'TeamName')."' has already been taken. Try another?</li>";
                        }
                  $query_search= "SELECT * FROM `user_details` WHERE advaita_id ='".strtoupper(mysqli_real_escape_string($link, filter_input(INPUT_POST, 'Advaita_id0')))."' LIMIT 1";
			
			  $result_search = mysqli_query($link, $query_search);	
			
			  $results_search = mysqli_num_rows($result_search);
			
			  if (!$results_search) {
                              $registration_error.= "<li>Advaita id '".filter_input(INPUT_POST, 'Advaita_id0')."' is not registered in our database.</li>";
                          }
               for ($i = 1;$i < filter_input(INPUT_POST, 'members'); $i++) 
                  {
                  	  $advaita = 'Advaita_id'.$i;
                        $query_search= "SELECT * FROM `user_details` WHERE advaita_id ='".strtoupper(mysqli_real_escape_string($link, filter_input(INPUT_POST, $advaita)))."' LIMIT 1";
			
			  $result_search = mysqli_query($link, $query_search);	
			
			  $results_search = mysqli_num_rows($result_search);
			
			  if (!$results_search) {
                              $registration_error.= "<li>Advaita id '".filter_input(INPUT_POST, $advaita)."' is not registered in our database.</li>";
                          }
                  }
              /*Check for unique members*/
              for ($i = 0;$i < filter_input(INPUT_POST, 'members'); $i++)
              { 
              	  $advaita = 'Advaita_id'.$i;
	              $query_search= "SELECT * FROM `membersU` WHERE member ='".mysqli_real_escape_string($link, filter_input(INPUT_POST, $advaita))."' AND event_id ='".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'event_id'))."' LIMIT 1";
	              $result_searches = mysqli_query($link, $query_search);	
				
				$results_search1 = mysqli_num_rows($result_searches);
				
				if ($results_search1) {
	                            $registration_error.= "<li>Advaita id '".filter_input(INPUT_POST, $advaita)."' has already registered for this event.</li>";
	                        }
	          }

              echo $registration_error;

            if ($registration_error == "") {
			
			$query = "INSERT INTO `eventU` (`unique_name`, `members`, `team_leader`, `event_id`) VALUES ('".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'TeamName'))."', '".filter_input(INPUT_POST, 'members')."','".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'Advaita_id0'))."','".filter_input(INPUT_POST, 'event_id')."')";
   
    		mysqli_query($link, $query);

                $team_id = mysqli_insert_id($link);
                
                for ($c = 0;$c < filter_input(INPUT_POST, 'members');$c++)
                {
                       $member = 'Advaita_id'.$c;
                         $event_entry_query = "INSERT INTO `membersU` (`member`, `team_id`,`event_id`) VALUES ('".strtoupper(mysqli_real_escape_string($link, filter_input(INPUT_POST, $member)))."','".$team_id."','".filter_input(INPUT_POST, 'event_id')."')";                      
                      mysqli_query($link, $event_entry_query);
                }
    		
    		echo "<li>You've been successfully registered!</li>";

				/**
				* This example shows settings to use when sending over SMTP with TLS and custom connection options.
				*/
	
				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				date_default_timezone_set('Etc/UTC');
			
				require '../../PHPMailer/PHPMailerAutoload.php';
			
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
				$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead

				$mail->Username = $zohoUsername;
			
				//Password to use for SMTP authentication
				$mail->Password = $zohoPassword;
			
				//Set who the message is to be sent from
				$mail->setFrom($zohoUsername, 'ADVAITA IIIT-Bhubaneswar');

				$mail->Subject = filter_input(INPUT_POST, 'event_id')." Registration";

				//Same body for all messages, so set this before the sending loop
				//If you generate a different body for each recipient (e.g. you're using a templating system),
				//set it inside the loop
				
				
				$email = array();
				$fname = array();
				 $tbl = "<table>";

				for ($c = 0;$c < filter_input(INPUT_POST, 'members');$c++)
                {
                       $member = 'Advaita_id'.$c;
                         $event_entry_query = "SELECT a.email,b.fname,b.lname,b.advaita_id FROM users a, user_details b WHERE a.id=b.link_id AND b.advaita_id ='".strtoupper(mysqli_real_escape_string($link, filter_input(INPUT_POST, $member)))."' LIMIT 1";                      
                      $results2 = mysqli_query($link, $event_entry_query);
					  $row2 = mysqli_fetch_array($results2);
					  
					  if ($row2){
						  $email[$c] = $row2['email'];
						  $fname[$c] = $row2['fname'];
						  $tbl = $tbl."<tr><td>Member ".($c+1).":</td><td> ".$fname[$c]." ".$row2['lname']." (".$row2['advaita_id'].")</td></tr>";
					  }
					  
					  
                }
                 $tbl = $tbl."</table>";
                $body = " <h2>Welcome To Advaita 2k16</h2>
                        <p>Thanks for Registering in ".filter_input(INPUT_POST, 'event_id')."!</p> 
                        <br>".$tbl." ";

				$mail->msgHTML($body);
				//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
				$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
				for ($c = 0;$c < filter_input(INPUT_POST, 'members');$c++)
                {
                    $mail->addAddress($email[$c], $fname[$c]);
                    if (!$mail->send()) {
				        echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
				        break; //Abandon sending
				    }
				    // Clear all addresses and attachments for next loop
				    $mail->clearAddresses();
					  
                }
				
	}	
	
?>