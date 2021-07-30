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

if (isset($_GET["jpc_memberwalletprocessing_id"])) {
	$jpc_memberwalletprocessing_id = $_GET['jpc_memberwalletprocessing_id'];	
} else {
	$jpc_memberwalletprocessing_id = "";
}

if (isset($_GET["memberwalletprocessing_memberid"])) {
	$memberwalletprocessing_memberid = $_GET['memberwalletprocessing_memberid'];	
} else {
	$memberwalletprocessing_memberid = "";
}

$personalwalletbalance = 0 ;
$externalwalletbalance = 0 ;
$commission = 0 ;

$sqlviewallgeneaology = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_email, t1.i_password, t1.i_firstname, t1.i_lastname, t1.i_middlename, t1.i_memberid, t1.i_sponsorid, t1.i_placementid, t1.i_membershipplan, t1.i_investmentamount, t1.i_personalwalletbalance, t1.i_externalwalletbalance, t1.i_stockbonus, t1.i_specialbonus, t1.i_withdrawamount, t1.i_commission, t1.i_isactive, t1.i_thumbnailphoto, t1.i_profilephoto, t2.i_id AS transactionid, t2.i_id, t2.i_uplineid, t2.i_sponsorid, t2.i_level, t2.i_commission AS commission_amount, t2.i_paidstatus, t2.i_created AS join_date, t2.i_updated AS last_login, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS uplinename
    FROM jpc_members AS t1 
    INNER JOIN jpc_geneaology2 AS t2 
    ON t1.i_memberid = t2.i_sponsorid 
    INNER JOIN jpc_members AS t3 
    ON t2.i_uplineid = t3.i_memberid 
    WHERE  t2.i_memberid='$memberwalletprocessing_memberid' AND i_paidstatus = 0
    ORDER BY t2.i_id");
while ($rows=mysqli_fetch_array($sqlviewallgeneaology)) {
	$commission += $rows["commission_amount"];
}

$personalwalletbalance = $commission / 2 ;
$externalwalletbalance = $commission / 2 ;

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET 
				i_personalwalletbalance = i_personalwalletbalance+$personalwalletbalance,
				i_externalwalletbalance = i_externalwalletbalance+$externalwalletbalance
				WHERE i_id = $jpc_memberwalletprocessing_id");

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_geneaology2 SET 
				i_paidstatus = 8
				WHERE i_memberid = '$memberwalletprocessing_memberid'");

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_transactionhistory (
							i_memberid,
							i_description,
							i_inamount
							) VALUES (
							'$memberwalletprocessing_memberid',
							'Processed Personal Wallet Balance',
							$personalwalletbalance
						)");			

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_transactionhistory (
							i_memberid,
							i_description,
							i_inamount
							) VALUES (
							'$memberwalletprocessing_memberid',
							'Processed External Wallet Balance',
							$externalwalletbalance
						)");			

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
