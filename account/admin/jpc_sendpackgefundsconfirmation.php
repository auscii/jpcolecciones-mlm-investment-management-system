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

if (isset($_GET["jpc_package"])) {
	$jpc_package = $_GET['jpc_package'];
} else {
	$jpc_package = "";
}

if (isset($_GET["jpc_funds"])) {
	$jpc_funds = $_GET['jpc_funds'];
} else {
	$jpc_funds = "";
}

if ( !empty($jpc_package) && !empty($jpc_package) ) {
	$sql=mysqli_query($GLOBALS["___mysqli_ston"],
				"UPDATE jpc_members SET
				i_externalwalletbalance = i_externalwalletbalance+$jpc_funds
				WHERE i_membershipplan = '$jpc_package'");
}

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
