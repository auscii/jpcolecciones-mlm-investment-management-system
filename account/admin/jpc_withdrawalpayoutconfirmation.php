<?php
date_default_timezone_set('Asia/Manila');
include "../include/jpc_common.php" ;
ob_start();
@session_start();

if (isset($_SESSION['jpcvar_codered'])) {
$jpc_codered = $_SESSION['jpcvar_codered'];  
} else {
$jpc_codered = "";
}         
if ($jpc_codered!="11101000000101110") {
header('Location:'.$serverdirectory.'admin');
exit();
}  

if (isset($_GET["jpc_withdrawalpayoutconfirmation_id"])) {
	$jpc_withdrawalpayoutconfirmation_id = $_GET['jpc_withdrawalpayoutconfirmation_id'];	
} else {
	$jpc_withdrawalpayoutconfirmation_id = "";
}

if (isset($_GET["jpc_withdrawalpayoutconfirmation_memberid"])) {
	$jpc_withdrawalpayoutconfirmation_memberid = $_GET['jpc_withdrawalpayoutconfirmation_memberid'];	
} else {
	$jpc_withdrawalpayoutconfirmation_memberid = "";
}

if (isset($_GET["jpc_withdrawalpayoutconfirmation_transferid"])) {
	$jpc_withdrawalpayoutconfirmation_transferid = $_GET['jpc_withdrawalpayoutconfirmation_transferid'];	
} else {
	$jpc_withdrawalpayoutconfirmation_transferid = "";
}

if (isset($_GET["jpc_withdrawalpayoutconfirmation_withdrawablebalance"])) {
	$jpc_withdrawalpayoutconfirmation_withdrawablebalance = $_GET['jpc_withdrawalpayoutconfirmation_withdrawablebalance'];	
} else {
	$jpc_withdrawalpayoutconfirmation_withdrawablebalance = "";
}

if (isset($_GET["jpc_withdrawalpayoutconfirmation_userpayout"])) {
	$jpc_withdrawalpayoutconfirmation_userpayout = $_GET['jpc_withdrawalpayoutconfirmation_userpayout'];	
} else {
	$jpc_withdrawalpayoutconfirmation_userpayout = "";
}

if ($jpc_withdrawalpayoutconfirmation_memberid==$jpc_withdrawalpayoutconfirmation_transferid) {
	$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET 
				i_externalwalletbalance = i_externalwalletbalance-$jpc_withdrawalpayoutconfirmation_userpayout
				WHERE i_memberid = '$jpc_withdrawalpayoutconfirmation_memberid'");

	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_transactionhistory (
						i_memberid,
						i_description,
						i_outamount
						) VALUES (
						'$jpc_withdrawalpayoutconfirmation_memberid',
						'Processed External Wallet Withdrawal',
						$jpc_withdrawalpayoutconfirmation_userpayout
					)");
					
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid='$jpc_withdrawalpayoutconfirmation_memberid' AND i_isverified=8");
	$row = mysqli_fetch_array($result);
	if ($row) {		;	
		$email = "" . $row['i_email'] ;
		$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;			
		$emailaddress = $email;
		$your_website = $serverdirectory ;
		$email_of_the_sender_from_your_website = $serveremail ;
		$your_email_address = $emailaddress ;
		$your_email_subject = "jpc Withdrawal Payout";
		$message_from_the_sender_of_your_website = "Dear $membername,\n\nYour withdrawal payout amounting to $jpc_withdrawalpayoutconfirmation_userpayout is successfully processed.\n\nRegards,\n\nSupport Team" ;
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
	}
} 

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_withdrawalpayout SET i_status = 8
				WHERE i_id = $jpc_withdrawalpayoutconfirmation_id");

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
