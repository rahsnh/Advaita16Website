<?php

		
		session_start();

		
		include("connection.php");
		
  	
  		if (isset($_SESSION['id'])) {	
			
	              $query_register= "SELECT * FROM `membersU` WHERE member ='".$_SESSION['advaita_id']."' AND event_id ='".$event."' LIMIT 1";
	              $result_searches3 = mysqli_query($link, $query_register);	
				
				$results_search3 = mysqli_num_rows($result_searches3);
				
				if ($results_search3) {
	                            $active = 1;
	                        }
	    }
?>