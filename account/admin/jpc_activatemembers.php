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

if (isset($_GET["jpc_activatemembers_id"])) {
	$jpc_activatemembers_id = $_GET['jpc_activatemembers_id'];	
} else {
	$jpc_activatemembers_id = "";
}

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET 
				i_isactive = 8
				WHERE i_id = $jpc_activatemembers_id");

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
