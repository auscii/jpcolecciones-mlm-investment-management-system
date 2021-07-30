<?php
date_default_timezone_set('Asia/Manila');
include "include/jpc_common.php" ;
ob_start();
@session_start();

if (isset($_SESSION['jpcvar_code'])) {
$jpc_code = $_SESSION['jpcvar_code'];  
} else {
$jpc_code = "";
}         
if ($jpc_code!="11101000110101001") {
header('Location:'.$serverdirectory);
exit();
}   

if (isset($_GET["jpc_addnewwithdrawalpayoutmemberid"])) {
	$jpc_addnewwithdrawalpayoutmemberid = $_GET['jpc_addnewwithdrawalpayoutmemberid'];	
} else {
	$jpc_addnewwithdrawalpayoutmemberid = "";
}

if (isset($_GET["jpc_addnewwithdrawalpayouttotalpayout"])) {
	$jpc_addnewwithdrawalpayouttotalpayout = $_GET['jpc_addnewwithdrawalpayouttotalpayout'];	
} else {
	$jpc_addnewwithdrawalpayouttotalpayout = 0;
}	

if (isset($_GET["jpc_addnewwithdrawalpayout_payout"])) {
	$jpc_addnewwithdrawalpayout_payout = $_GET['jpc_addnewwithdrawalpayout_payout'];	
} else {
	$jpc_addnewwithdrawalpayout_payout = 0;
}	

if (isset($_GET["jpc_addnewwithdrawalpayout_reason"])) {
	$jpc_addnewwithdrawalpayout_reason = $_GET['jpc_addnewwithdrawalpayout_reason'];	
} else {
	$jpc_addnewwithdrawalpayout_reason = "";
}	

if (isset($_GET["jpc_addnewwithdrawalpayout_transferid"])) {
	$jpc_addnewwithdrawalpayout_transferid = $_GET['jpc_addnewwithdrawalpayout_transferid'];	
} else {
	$jpc_addnewwithdrawalpayout_transferid = "";
}	

$jpc_addnewwithdrawalpayout_date = date("Y-m-d") ;	

$jpc_addnewwithdrawalpayout_commission = 0 ;
$jpc_addnewwithdrawalpayout_penalty = 0 ;

if ($jpc_addnewwithdrawalpayoutmemberid==$jpc_addnewwithdrawalpayout_transferid) {
	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_withdrawalpayout (
		i_memberid,
		i_transferid,
		i_totalpayout,
		i_userpayout,
		i_commission,
		i_reason,
		i_penalty,
		i_date,
		i_status
		) VALUES (
		'$jpc_addnewwithdrawalpayoutmemberid',
		'$jpc_addnewwithdrawalpayout_transferid',
		'$jpc_addnewwithdrawalpayouttotalpayout',
		'$jpc_addnewwithdrawalpayout_payout',
		'$jpc_addnewwithdrawalpayout_commission',
		'$jpc_addnewwithdrawalpayout_reason',
		'$jpc_addnewwithdrawalpayout_penalty',
		'$jpc_addnewwithdrawalpayout_date',
		0)");	
	
		$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid='$jpc_addnewwithdrawalpayoutmemberid' AND i_isverified=8");
		$row = mysqli_fetch_array($result);
		if ($row) {		;	
			$email = "" . $row['i_email'] ;
			$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;			
			$emailaddress = $email;
			$your_website = $serverdirectory ;
			$email_of_the_sender_from_your_website = $serveremail ;
			$your_email_address = $emailaddress ;
			$your_email_subject = "jpc Withdrawal Payout";
			$message_from_the_sender_of_your_website = "Dear $membername,\n\nYour withdrawal payout amounting to $jpc_addnewwithdrawalpayout_payout is currently pending.\n\nRegards,\n\nSupport Team" ;
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
} else {
	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_withdrawalpayout (
		i_memberid,
		i_transferid,
		i_totalpayout,
		i_userpayout,
		i_commission,
		i_reason,
		i_penalty,
		i_date,
		i_status
		) VALUES (
		'$jpc_addnewwithdrawalpayoutmemberid',
		'$jpc_addnewwithdrawalpayout_transferid',
		'$jpc_addnewwithdrawalpayouttotalpayout',
		'$jpc_addnewwithdrawalpayout_payout',
		'$jpc_addnewwithdrawalpayout_commission',
		'$jpc_addnewwithdrawalpayout_reason',
		'$jpc_addnewwithdrawalpayout_penalty',
		'$jpc_addnewwithdrawalpayout_date',
		8)");	

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
									"UPDATE jpc_members SET 
									i_externalwalletbalance = i_externalwalletbalance-$jpc_addnewwithdrawalpayout_payout
									WHERE i_memberid = '$jpc_addnewwithdrawalpayoutmemberid'");

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
									"UPDATE jpc_members SET 
									i_externalwalletbalance = i_externalwalletbalance+$jpc_addnewwithdrawalpayout_payout
									WHERE i_memberid = '$jpc_addnewwithdrawalpayout_transferid'");

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
									"INSERT INTO jpc_transactionhistory (
									i_memberid,
									i_description,
									i_outamount
									) VALUES (
									'$jpc_addnewwithdrawalpayoutmemberid',
									'Processed Transfer External Wallet to $jpc_addnewwithdrawalpayout_transferid',
									$jpc_addnewwithdrawalpayout_payout
								)");			

		$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
									"INSERT INTO jpc_transactionhistory (
									i_memberid,
									i_description,
									i_inamount
									) VALUES (
									'$jpc_addnewwithdrawalpayout_transferid',
									'Processed Receive External Wallet from $jpc_addnewwithdrawalpayoutmemberid',
									$jpc_addnewwithdrawalpayout_payout
								)");	
								
		$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid='$jpc_addnewwithdrawalpayoutmemberid' AND i_isverified=8");
		$row = mysqli_fetch_array($result);
		if ($row) {		;	
			$email = "" . $row['i_email'] ;
			$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;			
			$emailaddress = $email;
			$your_website = $serverdirectory ;
			$email_of_the_sender_from_your_website = $serveremail ;
			$your_email_address = $emailaddress ;
			$your_email_subject = "jpc Withdrawal Payout";
			$message_from_the_sender_of_your_website = "Dear $membername,\n\nYou transferred external wallet to Member ID: $jpc_addnewwithdrawalpayout_transferid amounting to $jpc_addnewwithdrawalpayout_payout is successfully processed.\n\nRegards,\n\nSupport Team" ;
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
		
		
		$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid='$jpc_addnewwithdrawalpayout_transferid' AND i_isverified=8");
		$row = mysqli_fetch_array($result);
		if ($row) {		;	
			$email = "" . $row['i_email'] ;
			$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;			
			$emailaddress = $email;
			$your_website = $serverdirectory ;
			$email_of_the_sender_from_your_website = $serveremail ;
			$your_email_address = $emailaddress ;
			$your_email_subject = "jpc Withdrawal Payout";
			$message_from_the_sender_of_your_website = "Dear $membername,\n\nMember ID: $jpc_addnewwithdrawalpayoutmemberid has successfully transfered an amount of $jpc_addnewwithdrawalpayout_payout to your external wallet.\n\nRegards,\n\nSupport Team" ;
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


header('Location:'.$serverdirectory.'jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
