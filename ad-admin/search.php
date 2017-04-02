<?php

		
		include("connection.php");

                $search = "";
                $query_search= "SELECT fname,lname,advaita_id FROM `user_details` WHERE fname LIKE'%".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'searchit'))."%' OR lname LIKE'%".mysqli_real_escape_string($link, filter_input(INPUT_POST, 'searchit'))."%' ORDER BY link_id ASC LIMIT 0,5";
			
			$result_search = mysqli_query($link, $query_search);	
			
			$results_search = mysqli_num_rows($result_search);
			
			if ($results_search) {
                while($row = mysqli_fetch_assoc($result_search)){

                    $search .= "<li class='clicked' value='".ltrim($row['advaita_id'],"AD16")."' style='width:100%;'><b>&nbsp; &nbsp;".$row['fname']." ".$row['lname']." - ".$row['advaita_id']."</b></li>";
                        }
                    echo $search;
            }    	
?>