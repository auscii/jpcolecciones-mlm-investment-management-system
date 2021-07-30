<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_setannouncements_id"])) {
	$jpc_setannouncements_id = $_POST['jpc_setannouncements_id'];	
} else {
	$jpc_setannouncements_id = "";
}	

if (isset($_POST["jpc_setannouncements_announcements"])) {
	$jpc_setannouncements_announcements = $_POST['jpc_setannouncements_announcements'];	
} else {
	$jpc_setannouncements_announcements = "";
}	

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_settings SET 
				i_announcements = '$jpc_setannouncements_announcements'
				WHERE i_id = $jpc_setannouncements_id");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
