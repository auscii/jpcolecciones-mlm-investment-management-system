<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_setemailvideo_id"])) {
	$jpc_setemailvideo_id = $_POST['jpc_setemailvideo_id'];
} else {
	$jpc_setemailvideo_id = "";
}

if (isset($_POST["jpc_setemailvideo_emailvideolink"])) {
	$jpc_setemailvideo_emailvideolink = $_POST['jpc_setemailvideo_emailvideolink'];
} else {
	$jpc_setemailvideo_emailvideolink = "";
}

if (isset($_POST["jpc_setemailvideo_emailvideomessage"])) {
	$jpc_setemailvideo_emailvideomessage = $_POST['jpc_setemailvideo_emailvideomessage'];
} else {
	$jpc_setemailvideo_emailvideomessage = "";
}


$sql=mysqli_query($GLOBALS["___mysqli_ston"],
				"UPDATE jpc_settings SET
				i_emailvideolink = '$jpc_setemailvideo_emailvideolink',
				i_emailvideomessage = '$jpc_setemailvideo_emailvideomessage'
				WHERE i_id = $jpc_setemailvideo_id");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
