<?php

                session_start();      
                if (isset($_SESSION['id'])) {session_destroy();
		
			$message="You have been logged out. Have a nice day!";
		
		}
                header('Location: ../');

?>
