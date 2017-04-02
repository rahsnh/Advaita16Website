<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Advaita 2015-16 | IIIT Bhubaneswar</title>
</head>

<body>
     <?php
         
            session_start();
	
     		include("connection.php");
             
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
    $search = mysqli_query($link,"SELECT id, email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0' LIMIT 1") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
    $row = mysqli_fetch_array($search);             
    if($match > 0){
        // We have a match, activate the account
        mysqli_query($link,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error());
        $_SESSION['id'] = $row['id'];
        echo "<script type='text/javascript'>
                    alert('Your account has been activated');
                    location.replace('http://www.advaita.io');
                 </script>";
    }else{
        // No match -> invalid url or account has already been activated.
        echo "<script type='text/javascript'>
                    alert('The url is either invalid or you already have activated your account.');
                    location.replace('http://www.advaita.io');
                 </script>";
    }
                 
}else{
    // Invalid approach
    echo "<script type='text/javascript'>
                    alert('Invalid approach, please use the link that has been send to your email.');
                    location.replace('http://www.advaita.io');
                 </script>";
}
             
        ?>
</body>

</html>
