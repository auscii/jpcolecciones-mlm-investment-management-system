<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_changepasswordid"])) {
	$jpc_changepasswordid = $_POST['jpc_changepasswordid'];	
} else {
	$jpc_changepasswordid = "";
}	

if (isset($_POST["jpc_password"])) {
	$jpc_password = $az1n1 . hash('sha256', stripslashes($_POST['jpc_password']).'administrator@jpc.biz') . $az1n2 ;
} else {
	$jpc_password = "";
}	

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_settings SET 
				i_adminpassword = '$jpc_password'
				WHERE i_id = $jpc_changepasswordid");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
