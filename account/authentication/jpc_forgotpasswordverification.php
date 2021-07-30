<?php
    include "../include/jpc_common.php" ;
	ob_start();
	@session_start();
    
	//date_default_timezone_set('Asia/Hong_Kong');	
	date_default_timezone_set('Asia/Manila');
	
	if (isset($_GET["email"])) {
		$u = trim(htmlentities(strip_tags($_GET['email'])));
		$u = stripslashes($u);	
	} else {
		$u = "";
	}	
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_email='$u'");
	$row = mysqli_fetch_array($result);
	if ($row) {		;	
		$password = randomPassword() ;
		$email = "" . $row['i_email'] ;
		$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;
		$newpassword = $az1n1 . hash('sha256', stripslashes($password).$email) . $az1n2 ;

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE jpc_members SET i_password = '$newpassword' WHERE i_email='$email'");

		$emailaddress = $email;
		$your_website = $serverdirectory ;
		$email_of_the_sender_from_your_website = $serveremail ;
		$your_email_address = $emailaddress ;
		$your_email_subject = "jpc Members Forgot Password";
		$message_from_the_sender_of_your_website = "Dear $membername,\n\nThis is your temporary password: $password\n\nRegards,\n\nSupport Team" ;
		$mime_boundary = "$your_website".md5(time());
		$headers = "From: ".$email_of_the_sender_from_your_website."\n";
		$headers .= "Reply-To: ".$email_of_the_sender_from_your_website."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
		$message = "--$mime_boundary\n";
		$message .= "Content-Type: text/plain; charset=UTF-8\n";
		$message .= "Content-Transfer-Encoding: 8bit\n\n";
		$message .= $message_from_the_sender_of_your_website."\n\n";
		$message .= "--$mime_boundary--\n\n";
		//$mail_sent = mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email");
		
		try {
			if (mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email")) {
				$status = 'success';
				$msg = 'Mail sent successfully.';
			} else {
				$status = 'failed';
				$msg = 'Unable to send mail.';
			}
		} catch(Exception $e) {
			$msg = $e->getMessage();
		}

		header('Location:'.$serverdirectory.'jpc_main.php');
		exit();
	} else {
		header('Location:'.$serverdirectory.'jpc_main.php');
		exit();
	}
    

    function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	 return implode($pass); //turn the array into a string
	}

    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
        
?>