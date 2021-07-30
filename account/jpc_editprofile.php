<?php

if (isset($_POST["jpc_editprofileid"])) {
	$jpc_editprofileid = $_POST['jpc_editprofileid'];	
} else {
	$jpc_editprofileid = "";
}	

if (isset($_POST["jpc_firstname"])) {
	$jpc_firstname = $_POST['jpc_firstname'];	
} else {
	$jpc_firstname = "";
}	

if (isset($_POST["jpc_lastname"])) {
	$jpc_lastname = $_POST['jpc_lastname'];	
} else {
	$jpc_lastname = "";
}

if (isset($_POST["jpc_middlename"])) {
	$jpc_middlename = $_POST['jpc_middlename'];	
} else {
	$jpc_middlename = "";
}

if (isset($_POST["jpc_gender"])) {
	$jpc_gender = $_POST['jpc_gender'];	
} else {
	$jpc_gender = "";
}

if (isset($_POST["jpc_dob"])) {
	$jpc_dob = $_POST['jpc_dob'];	
} else {
	$jpc_dob = "";
}

if (isset($_POST["jpc_address"])) {
	$jpc_address = $_POST['jpc_address'];	
} else {
	$jpc_address = "";
}

if (isset($_POST["jpc_country"])) {
	$jpc_country = $_POST['jpc_country'];	
} else {
	$jpc_country = "";
}

if (isset($_POST["jpc_state"])) {
	$jpc_state = $_POST['jpc_state'];	
} else {
	$jpc_state = "";
}

if (isset($_POST["jpc_city"])) {
	$jpc_city = $_POST['jpc_city'];	
} else {
	$jpc_city = "";
}

if (isset($_POST["jpc_countrycode"])) {
	$jpc_countrycode = $_POST['jpc_countrycode'];	
} else {
	$jpc_countrycode = "";
}

if (isset($_POST["jpc_phone"])) {
	$jpc_phone = $_POST['jpc_phone'];	
} else {
	$jpc_phone = "";
}

if (isset($_POST["jpc_zipcode"])) {
	$jpc_zipcode = $_POST['jpc_zipcode'];	
} else {
	$jpc_zipcode = "";
}

if (isset($_POST["jpc_bankname"])) {
	$jpc_bankname = $_POST['jpc_bankname'];	
} else {
	$jpc_bankname = "";
}

if (isset($_POST["jpc_bankaccountnumber"])) {
	$jpc_bankaccountnumber = $_POST['jpc_bankaccountnumber'];	
} else {
	$jpc_bankaccountnumber = "";
}

if (isset($_POST["jpc_bankaccountname"])) {
	$jpc_bankaccountname = $_POST['jpc_bankaccountname'];	
} else {
	$jpc_bankaccountname = "";
}

include "include/jpc_common.php" ;
$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET 
				i_firstname = '$jpc_firstname',
				i_lastname = '$jpc_lastname',
				i_middlename = '$jpc_middlename',
				i_gender = '$jpc_gender',
				i_dob = '$jpc_dob',
				i_address = '$jpc_address',
				i_country = '$jpc_country',
				i_state = '$jpc_state',
				i_city = '$jpc_city',
				i_countrycode = '$jpc_countrycode',
				i_phone = '$jpc_phone',
				i_zipcode = '$jpc_zipcode',
				i_bankname = '$jpc_bankname',
				i_bankaccountnumber = '$jpc_bankaccountnumber',
				i_bankaccountname = '$jpc_bankaccountname'
				WHERE i_id = $jpc_editprofileid");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
