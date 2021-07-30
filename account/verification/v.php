<?php
    include "../include/jpc_common.php" ;
	ob_start();
	@session_start();
    
	//date_default_timezone_set('Asia/Hong_Kong');	
	date_default_timezone_set('Asia/Manila');
	
	if (isset($_GET["e"])) {
		$e = trim(htmlentities(strip_tags($_GET['e'])));
		$e = stripslashes($e);	
	} else {
		$e = "";
	}	

	if (isset($_GET["v"])) {
		$v = trim(htmlentities(strip_tags($_GET['v'])));
		$v = stripslashes($v);	
	} else {
		$v = "";
	}	
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_email='$e' AND i_verificationcode='$v' AND i_isverified=0");
	$row = mysqli_fetch_array($result);
	if ($row) {		;	
		$email = "" . $row['i_email'] ;
		$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;	

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE jpc_members SET i_isverified=8 WHERE i_email='$e' AND i_verificationcode='$v' AND i_isverified=0");
		
		$emailaddress = $email;
		$your_website = $serverdirectory ;
		$email_of_the_sender_from_your_website = $serveremail ;
		$your_email_address = $emailaddress ;
		$your_email_subject = "JP Colecciones New Member Verification Complete";
		$message_from_the_sender_of_your_website = "Dear $membername,\n\nYou have successfully verified: $emailaddress\n\nYou may now login to $serverdirectory\n\nRegards,\n\nSupport Team" ;
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

    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
        
?>