<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_messagemembers_memberid"])) {
	$jpc_messagemembers_memberid = $_POST['jpc_messagemembers_memberid'];	
} else {
	$jpc_messagemembers_memberid = "";
}	

if (isset($_POST["jpc_messagemembers_message"])) {
	$jpc_messagemembers_message = $_POST['jpc_messagemembers_message'];	
} else {
	$jpc_messagemembers_message = "";
}	

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jpc_messaging (
							i_memberid,
							i_message
							) VALUES (
							'$jpc_messagemembers_memberid',
							'$jpc_messagemembers_message'						  			     
						)");			

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
