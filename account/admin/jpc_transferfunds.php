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

if (isset($_GET["jpc_transferfunds_id"])) {
	$jpc_transferfunds_id = $_GET['jpc_transferfunds_id'];
} else {
	$jpc_transferfunds_id = "";
}

if (isset($_GET["jpc_transferfunds_amount"])) {
	$jpc_transferfunds_amount = $_GET['jpc_transferfunds_amount'];
} else {
	$jpc_transferfunds_amount = "";
}

$sql=mysqli_query($GLOBALS["___mysqli_ston"],
						"UPDATE jpc_members SET
						i_personalwalletbalance = i_personalwalletbalance-$jpc_transferfunds_amount,
						i_externalwalletbalance = i_externalwalletbalance+$jpc_transferfunds_amount
						WHERE i_id = $jpc_transferfunds_id");

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_id='$jpc_transferfunds_id'");
$row = mysqli_fetch_array($result);
if ($row) {		;
	$memberid = "" . $row['i_memberid'] ;
	$email = "" . $row['i_email'] ;
	$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;

	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_transactionhistory (
								i_memberid,
								i_description,
								i_inamount,
								i_outamount
								) VALUES (
								'$memberid',
								'Transfered Personal Wallet to External Wallet',
								0,
								$jpc_transferfunds_amount
							)");

	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_transactionhistory (
								i_memberid,
								i_description,
								i_inamount,
								i_outamount
								) VALUES (
								'$memberid',
								'Received External Wallet from Personal Wallet',
								$jpc_transferfunds_amount,
								0
							)");

	$emailaddress = $email;
	$your_website = $serverdirectory ;
	$email_of_the_sender_from_your_website = $serveremail ;
	$your_email_address = $emailaddress ;
	$your_email_subject = "jpc Transfered Personal Wallet to External Wallet";
	$message_from_the_sender_of_your_website = "Dear $membername,\n\nYour stock wallet amounting to $jpc_transferfunds_amount is successfully transfered to your external wallet.\n\nRegards,\n\nSupport Team" ;
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

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
