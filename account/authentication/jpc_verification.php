<?php
    include "../include/jpc_common.php" ;
	
	ob_start();
	@session_start();
    
	date_default_timezone_set('Asia/Manila');
	
	if (isset($_GET["jpc_username"])) {
		$u = trim(htmlentities(strip_tags($_GET['jpc_username'])));
		$u = stripslashes($u);	
	} else {
		$u = "";
	}	
	
	if (isset($_GET["jpc_password"])) {
		$p = trim(htmlentities(strip_tags($_GET['jpc_password'])));	
		$p = $az1n1 . hash('sha256', stripslashes($p).$u) . $az1n2 ;
	} else {
		$p = "";
	}	
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE (i_email='$u' OR i_memberid='$u') AND i_password='$p' AND i_isverified=8");
	$row = mysqli_fetch_array($result);
	if ($row) {		
		$id = $row['i_id'] ;	
		$email = "" . $row['i_email'] ;
		$password = "" . $row['i_password'] ;
		$memberid = "" . $row['i_memberid'] ;	
		$sponsorid = "" . $row['i_sponsorid'] ;
		$placementid = "" . $row['i_placementid'] ;
		$membershipplan = "" . $row['i_membershipplan'] ;
		$firstname = "" . $row['i_firstname'] ;
		$middlename = "" . $row['i_middlename'] ;
		$lastname = "" . $row['i_lastname'] ;
		$address = "" . $row['i_address'] ;
		$country = "" . $row['i_country'] ;
		$state = "" . $row['i_state'] ;
		$city = "" . $row['i_city'] ;
		$countrycode = "" . $row['i_countrycode'] ;
		$phone = "" . $row['i_phone'] ;
		$zipcode = "" . $row['i_zipcode'] ;
		$gender = "" . $row['i_gender'] ;
		$dob = "" . $row['i_dob'] ;

		$investmentamount = "" . $row['i_investmentamount'] ;
		$personalwalletbalance = "" . $row['i_personalwalletbalance'] ;
		$externalwalletbalance = "" . $row['i_externalwalletbalance'] ;
		$stockbonus = "" . $row['i_stockbonus'] ;
		$specialbonus = "" . $row['i_specialbonus'] ;
		$withdrawamount = "" . $row['i_withdrawamount'] ;
		$commission = "" . $row['i_commission'] ;

		$bankname = "" . $row['i_bankname'] ;
		$bankaccountnumber = "" . $row['i_bankaccountnumber'] ;
		$bankaccountname = "" . $row['i_bankaccountname'] ;

		$verificationcode = "" . $row['i_verificationcode'] ;
		$isverified = "" . $row['i_isverified'] ;
		$isactive = "" . $row['i_isactive'] ;
		$isreported = "" . $row['i_isreported'] ;
		$isblocked = "" . $row['i_isblocked'] ;
		$thumbnailphoto = "" . $row['i_thumbnailphoto'] ;
		$profilephoto = "" . $row['i_profilephoto'] ;
		$invoicephoto = "" . $row['i_invoicephoto'] ;
		$created = "" . $row['i_created'] ;

		$_SESSION['jpcvar_id'] = $id ;
		$_SESSION['jpcvar_email'] = $email ;	
		$_SESSION['jpcvar_password'] = $password ;
		$_SESSION['jpcvar_memberid'] = $memberid ;
		$_SESSION['jpcvar_sponsorid'] = $sponsorid ;	
		$_SESSION['jpcvar_placementid'] = $placementid ;	
		$_SESSION['jpcvar_membershipplan'] = $membershipplan ;	
		$_SESSION['jpcvar_fullname'] = $firstname . " " . $lastname;	
		$_SESSION['jpcvar_firstname'] = $firstname;	
		$_SESSION['jpcvar_lastname'] = $lastname;	
		$_SESSION['jpcvar_middlename'] = $middlename;	
		$_SESSION['jpcvar_address'] = $address;	
		$_SESSION['jpcvar_country'] = $country;	
		$_SESSION['jpcvar_state'] = $state;	
		$_SESSION['jpcvar_city'] = $city;	
		$_SESSION['jpcvar_countrycode'] = $countrycode;
		$_SESSION['jpcvar_phone'] = $phone ;	
		$_SESSION['jpcvar_zipcode'] = $zipcode;	
		$_SESSION['jpcvar_gender'] = $gender;	
		$_SESSION['jpcvar_dob'] = $dob;	

		$_SESSION['jpcvar_investmentamount'] = $investmentamount ;	
		$_SESSION['jpcvar_personalwalletbalance'] = $personalwalletbalance ;	
		$_SESSION['jpcvar_externalwalletbalance'] = $externalwalletbalance ;	
		$_SESSION['jpcvar_stockbonus'] = $stockbonus ;
		$_SESSION['jpcvar_specialbonus'] = $specialbonus ;	
		$_SESSION['jpcvar_withdrawamount'] = $withdrawamount ;
		$_SESSION['jpcvar_commission'] = $commission ;

		$_SESSION['jpcvar_bankname'] = $bankname ;
		$_SESSION['jpcvar_bankaccountnumber'] = $bankaccountnumber ;
		$_SESSION['jpcvar_bankaccountname'] = $bankaccountname ;

		$_SESSION['jpcvar_verificationcode'] = $verificationcode ;
		$_SESSION['jpcvar_isverified'] = $isverified ;		
		$_SESSION['jpcvar_isactive'] = $isactive ;	
		$_SESSION['jpcvar_isreported'] = $isreported ;	
		$_SESSION['jpcvar_isblocked'] = $isblocked ;
		$_SESSION['jpcvar_thumbnailphoto'] = $thumbnailphoto ;
		$_SESSION['jpcvar_profilephoto'] = $profilephoto ;
		$_SESSION['jpcvar_invoicephoto'] = $invoicephoto ;
		$_SESSION['jpcvar_created'] = $created ;
		$_SESSION['jpcvar_code'] = "11101000110101001";

		header('Location:'.$serverdirectory.'jpc_main.php');
		exit();
	} else {
		$_SESSION['jpcvar_id'] = "" ;
		$_SESSION['jpcvar_email'] =  "" ;
		$_SESSION['jpcvar_password'] = "" ;
		$_SESSION['jpcvar_memberid'] =  "" ;
		$_SESSION['jpcvar_sponsorid'] =  "" ;
		$_SESSION['jpcvar_placementid'] =  "" ;
		$_SESSION['jpcvar_membershipplan'] =  "" ;
		$_SESSION['jpcvar_fullname'] =  "" ;
		$_SESSION['jpcvar_firstname'] =  "" ;
  		$_SESSION['jpcvar_lastname'] =  "" ;
  		$_SESSION['jpcvar_middlename'] =  "" ;
		$_SESSION['jpcvar_address'] =  "" ;
		$_SESSION['jpcvar_country'] =  "" ;
		$_SESSION['jpcvar_state'] =  "" ;
		$_SESSION['jpcvar_city'] =  "" ;
		$_SESSION['jpcvar_countrycode'] =  "" ;
		$_SESSION['jpcvar_phone'] =  "" ;
		$_SESSION['jpcvar_zipcode'] =  "" ;
		$_SESSION['jpcvar_gender'] =  "" ;
		$_SESSION['jpcvar_dob'] =  "" ;

		$_SESSION['jpcvar_investmentamount'] = "" ;	
		$_SESSION['jpcvar_personalwalletbalance'] = "" ;
		$_SESSION['jpcvar_externalwalletbalance'] = "" ;
		$_SESSION['jpcvar_stockbonus'] = "" ;	
		$_SESSION['jpcvar_specialbonus'] = "" ;	
		$_SESSION['jpcvar_withdrawamount'] = "" ;
		$_SESSION['jpcvar_commission'] = "" ;

		$_SESSION['jpcvar_bankname'] = "" ;
		$_SESSION['jpcvar_bankaccountnumber'] = "" ;
		$_SESSION['jpcvar_bankaccountname'] = "" ;

		$_SESSION['jpcvar_verificationcode'] =  "" ;
		$_SESSION['jpcvar_isverified'] =  "" ;
		$_SESSION['jpcvar_isactive'] =  "" ;
		$_SESSION['jpcvar_isreported'] =  "" ;	
		$_SESSION['jpcvar_isblocked'] = "" ;
		$_SESSION['jpcvar_thumbnailphoto'] =  "" ;
		$_SESSION['jpcvar_profilephoto'] = "" ;
		$_SESSION['jpcvar_invoicephoto'] = "" ;
		$_SESSION['jpcvar_created'] = "" ;
		$_SESSION['jpcvar_code'] = "00001000000101001";
		
		header('Location:'.$serverdirectory);
		exit();
	}	
      
    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
        
?>