<?php
include "../include/jpc_common.php" ;

if (isset($_POST["jpc_members_name"])) {
	$j_new_members_name = $_POST['jpc_members_name'];	
} else {
	$j_new_members_name = "";
}			

if (isset($_POST["jpc_userid_number"])) {
	$j_upline_user_id_number = $_POST['jpc_userid_number'];	
} else {
	$j_upline_user_id_number = "";
}		

if (isset($_POST["jpc_item_description"])) {
	$j_item_description = $_POST['jpc_item_description'];	
} else {
	$j_item_description = "";
}		

if (isset($_POST["jpc_item_price"])) {
	$j_item_price = $_POST['jpc_item_price'];	
} else {
	$j_item_price = "";
}		

if (isset($_POST["jpc_referral_fee"])) {
	$j_referral_fee = $_POST['jpc_referral_fee'];	
} else {
	$j_referral_fee = "";
}		

if (isset($_POST["jpc_commission_fee"])) {
	$j_commision_fee = $_POST['jpc_commission_fee'];	
} else {
	$j_commision_fee = "";
}		

if (isset($_POST["jpc_level_number"])) {
	$j_level_number = $_POST['jpc_level_number'];	
} else {
	$j_level_number = "";
}		

if (isset($_POST["jpc_level_plan"])) {
	$j_level_plan = $_POST['jpc_level_plan'];	
} else {
	$j_level_plan = "";
}	

$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
    "INSERT INTO jpc_commissionrates_2
    (
        j_new_members_name,
        j_upline_user_id_number,
        j_item_description,
        j_item_price,
        j_referral_fee,
        j_commision_fee,
        j_level_number,
        j_level_plan
        ) VALUES (
        '$j_new_members_name',
        '$j_upline_user_id_number',
        '$j_item_description',
        '$j_item_price',
        '$j_referral_fee',
        '$j_commision_fee',
        '$j_level_number',
        '$j_level_plan'						  			     
    )");	

// $sql=mysqli_query($GLOBALS["___mysqli_ston"], 
// 				"UPDATE jpc_members SET 
// 				i_isactive = 8
// 				WHERE i_id = $jpc_activatemembers_id");

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
