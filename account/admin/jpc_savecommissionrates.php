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

if (isset($_GET["jpc_editcommissionrates_id"])) {
	$jpc_editcommissionrates_id = $_GET['jpc_editcommissionrates_id'];	
} else {
	$jpc_editcommissionrates_id = "";
}

if (isset($_GET["jpc_editcommissionrates_membershipplan"])) {
	$jpc_editcommissionrates_membershipplan = $_GET['jpc_editcommissionrates_membershipplan'];	
} else {
	$jpc_editcommissionrates_membershipplan = "";
}	

if (isset($_GET["jpc_editcommissionrates_level1percentage"])) {
	$jpc_editcommissionrates_level1percentage = $_GET['jpc_editcommissionrates_level1percentage'];
} else {
	$jpc_editcommissionrates_level1percentage = 0;
}	

if (isset($_GET["jpc_editcommissionrates_level2percentage"])) {
	$jpc_editcommissionrates_level2percentage = $_GET['jpc_editcommissionrates_level2percentage'];
} else {
	$jpc_editcommissionrates_level2percentage = "";
}	

if (isset($_GET["jpc_editcommissionrates_level3percentage"])) {
	$jpc_editcommissionrates_level3percentage = $_GET['jpc_editcommissionrates_level3percentage'];
} else {
	$jpc_editcommissionrates_level3percentage = "";
}	

if (isset($_GET["jpc_editcommissionrates_level4percentage"])) {
	$jpc_editcommissionrates_level4percentage = $_GET['jpc_editcommissionrates_level4percentage'];
} else {
	$jpc_editcommissionrates_level4percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level5percentage"])) {
	$jpc_editcommissionrates_level5percentage = $_GET['jpc_editcommissionrates_level5percentage'];
} else {
	$jpc_editcommissionrates_level5percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level6percentage"])) {
	$jpc_editcommissionrates_level6percentage = $_GET['jpc_editcommissionrates_level6percentage'];
} else {
	$jpc_editcommissionrates_level6percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level7percentage"])) {
	$jpc_editcommissionrates_level7percentage = $_GET['jpc_editcommissionrates_level7percentage'];
} else {
	$jpc_editcommissionrates_level7percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level8percentage"])) {
	$jpc_editcommissionrates_level8percentage = $_GET['jpc_editcommissionrates_level8percentage'];
} else {
	$jpc_editcommissionrates_level8percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level9percentage"])) {
	$jpc_editcommissionrates_level9percentage = $_GET['jpc_editcommissionrates_level9percentage'];
} else {
	$jpc_editcommissionrates_level9percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_level10percentage"])) {
	$jpc_editcommissionrates_level10percentage = $_GET['jpc_editcommissionrates_level10percentage'];
} else {
	$jpc_editcommissionrates_level10percentage = "";
}

if (isset($_GET["jpc_editcommissionrates_investmentamount"])) {
	$jpc_editcommissionrates_investmentamount = $_GET['jpc_editcommissionrates_investmentamount'];
} else {
	$jpc_editcommissionrates_investmentamount = "";
}

if (isset($_GET["jpc_editcommissionrates_stockbonusshare"])) {
	$jpc_editcommissionrates_stockbonusshare = $_GET['jpc_editcommissionrates_stockbonusshare'];
} else {
	$jpc_editcommissionrates_stockbonusshare = "";
}

if (isset($_GET["jpc_editcommissionrates_specialbonus"])) {
	$jpc_editcommissionrates_specialbonus = $_GET['jpc_editcommissionrates_specialbonus'];
} else {
	$jpc_editcommissionrates_specialbonus = "";
}    

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_commissionrates SET 
				i_membershipplan = '$jpc_editcommissionrates_membershipplan',
				i_level1percentage = '$jpc_editcommissionrates_level1percentage',
				i_level2percentage = '$jpc_editcommissionrates_level2percentage',
				i_level3percentage = '$jpc_editcommissionrates_level3percentage',
				i_level4percentage = '$jpc_editcommissionrates_level4percentage',
				i_level5percentage = '$jpc_editcommissionrates_level5percentage',
				i_level6percentage = '$jpc_editcommissionrates_level6percentage',
				i_level7percentage = '$jpc_editcommissionrates_level7percentage',
				i_level8percentage = '$jpc_editcommissionrates_level8percentage',
				i_level9percentage = '$jpc_editcommissionrates_level9percentage',
				i_level10percentage = '$jpc_editcommissionrates_level10percentage',
				i_investmentamount = '$jpc_editcommissionrates_investmentamount',
				i_stockbonusshare = '$jpc_editcommissionrates_stockbonusshare',
				i_specialbonus = '$jpc_editcommissionrates_specialbonus'
				WHERE i_id = $jpc_editcommissionrates_id");

header('Location:'.$serverdirectory.'admin/jpc_main.php');
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
