<?php
    include "../include/jpc_common.php" ;
	
	ob_start();
	@session_start();
    
	//date_default_timezone_set('Asia/Hong_Kong');	
	date_default_timezone_set('Asia/Manila');
	
	if (isset($_GET["i_username"])) {
		$u = trim(htmlentities(strip_tags($_GET['i_username'])));
		$u = stripslashes($u);	
	} else {
		$u = "";
	}	
	
	if (isset($_GET["i_password"])) {
		$p = trim(htmlentities(strip_tags($_GET['i_password'])));	
		$p = $az1n1 . hash('sha256', stripslashes($p).$u) . $az1n2 ;
	} else {
		$p = "";
	}	


	// echo $p ;
	// exit();

	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_settings WHERE i_id=1 AND i_adminpassword='$p'");
	$row = mysqli_fetch_array($result);
	if ($row) {		
		$id = $row['i_id'] ;	
		$_SESSION['jpcvar_codered'] = "11101000000101110";
		header('Location:'.$serverdirectory.'admin/jpc_main.php');
		exit();
	} else {
		$_SESSION['jpcvar_codered'] = "11111001010100111";
		header('Location:'.$serverdirectory.'admin');
		exit();
	}	
      
    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
        
?>