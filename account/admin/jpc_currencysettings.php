<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_currencysettings_id"])) {
	$jpc_currencysettings_id = $_POST['jpc_currencysettings_id'];	
} else {
	$jpc_currencysettings_id = "";
}	

if (isset($_POST["jpc_currencysettings_currencyvalue"])) {
	$jpc_currencysettings_currencyvalue = $_POST['jpc_currencysettings_currencyvalue'];	
} else {
	$jpc_currencysettings_currencyvalue = "";
}	

if (isset($_POST["jpc_currencysettings_currencyprefix"])) {
	$jpc_currencysettings_currencyprefix = $_POST['jpc_currencysettings_currencyprefix'];	
} else {
	$jpc_currencysettings_currencyprefix = "";
}	

if (isset($_POST["jpc_currencysettings_currencysymbol"])) {
	$jpc_currencysettings_currencysymbol = $_POST['jpc_currencysettings_currencysymbol'];	
} else {
	$jpc_currencysettings_currencysymbol = "";
}	

if (isset($_POST["jpc_externalwalletmaintainingbalance"])) {
	$jpc_externalwalletmaintainingbalance = $_POST['jpc_externalwalletmaintainingbalance'];	
} else {
	$jpc_externalwalletmaintainingbalance = "";
}	

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_settings SET 
				i_currencyvalue = '$jpc_currencysettings_currencyvalue',
				i_currencyprefix = '$jpc_currencysettings_currencyprefix',
				i_currencysymbol = '$jpc_currencysettings_currencysymbol',
				i_externalwalletmaintainingbalance = '$jpc_externalwalletmaintainingbalance'
				WHERE i_id = $jpc_currencysettings_id");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
