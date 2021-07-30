<?php
	include "include/izi69_common.php" ;
	
	ob_start();
	@session_start();
    
	//date_default_timezone_set('Asia/Hong_Kong');	
	date_default_timezone_set('Asia/Manila');

	if (isset($_GET["memberid1"])) {
		$memberid1 =  $_GET['id'];	
		$memberid2 =  $memberid1 ;
		$memberid3 =  $memberid1 ;;
		$memberid4 =  $memberid1 ;
	} else {
		$memberid1 = "";
	}

	$membershipplan = "Referral Bonus For Package 2";
	$firstname = "Xian";
	$lastname = "Lim";
    $middlename = "Lim";
	$sponsorid = "WAAQNA2147480983";
	$email = "quotations2009@gmail.com";
	$password = "izi69";	
	$password = $az1n1 . hash('sha256', stripslashes($password).$email) . $az1n2 ;
	
	// $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_members WHERE i_memberid = '$sponsorid'");
	// $row = mysqli_fetch_array($result);
	// if (!$row) {		
	// 	header('Location:'.$serverdirectory);
	// 	exit();
	// }

	// $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_members WHERE i_email = '$email'");
	// $row = mysqli_fetch_array($result);
	// if ($row) {		
	// 	header('Location:'.$serverdirectory);
	// 	exit();
	// }

	$level1percentage = 0 ;
	$level2percentage = 0 ;
	$level3percentage = 0 ;
	$level4percentage = 0 ;
	$level5percentage = 0 ;
	$level6percentage = 0 ;
	$level7percentage = 0 ;
	$level8percentage = 0 ;
	$level9percentage = 0 ;
	$level10percentage = 0 ;
	$investmentamount = 0 ;
	$stockbonusshare = 0 ;

	// $datecode = date("Ymdhis", mktime(0,0,0,date("m"),date("d"),date("Y")));
	// $datecode = (((intval($datecode) - 888) - 888) - 888) . mt_rand(1,9) ;
	// $memberid = $firstname[0] . $firstname[1] . $middlename[0] . $middlename[1] . $lastname[0] . $lastname[1] . $datecode;
	// $memberid = strtoupper($memberid);
	// $memberid1 = $memberid ;
	// $memberid2 = $memberid ;
	// $memberid3 = $memberid ;
    // $memberid4 = $memberid ;
    
    // $memberid1= "JEGRGR20180527117336" ;
    // $memberid2= "JEGRGR20180527117336" ;
    // $memberid3 = "JEGRGR20180527117336" ;
    // $memberid4 = "JEGRGR20180527117336" ;

	// $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_members WHERE i_email='$email' AND i_password='$password'");
	// $row = mysqli_fetch_array($result);
	// if ($row) {	
	// 	header('Location:'.$serverdirectory);
	// 	exit();
	// } else {
		$sqlcommissionrates = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_commissionrates WHERE i_membershipplan = '$membershipplan' ");
		while ($rows=mysqli_fetch_array($sqlcommissionrates)) {
			$level1percentage = $rows['i_level1percentage'] ;
			$level2percentage = $rows['i_level2percentage'] ;
			$level3percentage = $rows['i_level3percentage'] ;
			$level4percentage = $rows['i_level4percentage'] ;
			$level5percentage = $rows['i_level5percentage'] ;
			$level6percentage = $rows['i_level6percentage'] ;
			$level7percentage = $rows['i_level7percentage'] ;
			$level8percentage = $rows['i_level8percentage'] ;
			$level9percentage = $rows['i_level9percentage'] ;
			$level10percentage = $rows['i_level10percentage'] ;	
			$investmentamount = $rows['i_investmentamount'] ;	
			$stockbonusshare = $rows['i_stockbonusshare'] ;	
            $specialbonus = $rows['i_specialbonus'] ;	
		// }	
			
		// $sqlmembers=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO izi69_members (
		// 	i_membershipplan,
		// 	i_firstname,
		// 	i_lastname,
		// 	i_middlename,
		// 	i_memberid,
		// 	i_sponsorid,
		// 	i_placementid,
		// 	i_email,
		// 	i_password,
		// 	i_investmentamount,
		// 	i_stockbonus,
		// 	i_specialbonus,
		// 	i_personalwalletbalance,
		// 	i_externalwalletbalance,
		// 	i_withdrawamount,
		// 	i_commission,
		// 	i_isverified,
		// 	i_isactive,
		// 	i_isreported,
		// 	i_isblocked
		// 	) VALUES (
		// 	'$membershipplan',
		// 	'$firstname',
		// 	'$lastname',
		// 	'$middlename',
		// 	'$memberid1',
		// 	'$sponsorid',
		// 	'$sponsorid',
		// 	'$email',
		// 	'$password',
		// 	'$investmentamount',
		// 	'$stockbonusshare',
		// 	'$specialbonus',
		// 	0,
		// 	0,
		// 	0,
		// 	0,
		// 	0,
		// 	0,
		// 	0,
		// 	0													  					     
		// )");	

		$currentlevel = 0 ;
		$currentcount = 0 ;
		
		again:
		
		if ($currentlevel == 1) {
			$commissionpercentage = $level1percentage * $investmentamount ;
		} else if ($currentlevel == 2) {
			$commissionpercentage = $level2percentage * $investmentamount ;
		} else if ($currentlevel == 3) {
			$commissionpercentage = $level3percentage * $investmentamount ;
		} else if ($currentlevel == 4) {
			$commissionpercentage = $level4percentage * $investmentamount ;
		} else if ($currentlevel == 5) {
			$commissionpercentage = $level5percentage * $investmentamount ;
		} else if ($currentlevel == 6) {
			$commissionpercentage = $level6percentage * $investmentamount ;
		} else if ($currentlevel == 7) {
			$commissionpercentage = $level7percentage * $investmentamount ;
		} else if ($currentlevel == 8) {
			$commissionpercentage = $level8percentage * $investmentamount ;
		} else if ($currentlevel == 9) {
			$commissionpercentage = $level9percentage * $investmentamount ;
		} else if ($currentlevel == 10) {
			$commissionpercentage = $level10percentage ;
		} else if ($currentlevel < 1 || $currentlevel > 10) {
			$commissionpercentage = 0 ;
		}
			
		$sqlmembers2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_members");
		while ($rows=mysqli_fetch_array($sqlmembers2)) {			
			if ($currentcount != 0) {
				$id = $rows['i_memberid'] ;
                $pid = $rows['i_placementid'] ;
                
                // echo "currentcount=" . $currentcount . " pid= " . $pid . " memberid1=" . $memberid1 . " id= " . $id ;
                // exit();

				if ($memberid1 == $id) {
                    // echo "PASOK!";
                    
					if ($currentlevel > 0) {
						$sqlgeneaology=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO izi69_geneaology (
							i_memberid,
							i_uplineid,
							i_placementid,
							i_level,
							i_commission,
							i_paidstatus
							) VALUES (
							'$id',
							'$sponsorid',
							'$memberid2',
							'$currentlevel',
							'$commissionpercentage',
							0												  					   
                        )");	
                        // echo "INSERTED!" ;
                        // exit();			
					} 
					$currentlevel = $currentlevel + 1;
					if ($pid != "") {
						$memberid1 = $pid ;
						goto again;
					} else {
						$memberid1 = "";
					}
				} 
			}
			$currentcount = $currentcount + 1;
		}	

		$currentlevel2 = 0 ;
		$currentcount2 = 0 ;
		
		again2:

		if ($currentlevel2 == 1) {
			$commissionpercentage2 = $level1percentage * $investmentamount ;
		} else if ($currentlevel2 == 2) {
			$commissionpercentage2 = $level2percentage * $investmentamount ;
		} else if ($currentlevel2 == 3) {
			$commissionpercentage2 = $level3percentage * $investmentamount ;
		} else if ($currentlevel2 == 4) {
			$commissionpercentage2 = $level4percentage * $investmentamount ;
		} else if ($currentlevel2 == 5) {
			$commissionpercentage2 = $level5percentage * $investmentamount ;
		} else if ($currentlevel2 == 6) {
			$commissionpercentage2 = $level6percentage * $investmentamount ;
		} else if ($currentlevel2 == 7) {
			$commissionpercentage2 = $level7percentage * $investmentamount ;
		} else if ($currentlevel2 == 8) {
			$commissionpercentage2 = $level8percentage * $investmentamount ;
		} else if ($currentlevel2 == 9) {
			$commissionpercentage2 = $level9percentage  * $investmentamount;
		} else if ($currentlevel2 == 10) {
			$commissionpercentage2 = $level10percentage * $investmentamount ;
		} else if ($currentlevel2 < 1 || $currentlevel2 > 10) {
			$commissionpercentage2 = 0 ;
		}
			
		$sqlmembers3 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM izi69_members");
		while ($rows=mysqli_fetch_array($sqlmembers3)) {
			if ($currentcount2 != 0) {
				$id2 = $rows['i_memberid'] ;
				$sid = $rows['i_sponsorid'] ;
				if ($memberid3 == $id2) {
					if ($currentlevel2 > 0) {
						$sqlgeneaology2=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO izi69_geneaology2 (
							i_memberid,
							i_uplineid,
							i_sponsorid,
							i_level,
							i_commission,
							i_paidstatus
							) VALUES (
							'$id2',
							'$sponsorid',
							'$memberid4',
							'$currentlevel2',
							'$commissionpercentage2',
							0										  			     
						)");				
					} 
					$currentlevel2 = $currentlevel2 + 1;
					if ($sid != "") {
						$memberid3 = $sid ;
						goto again2;
					} else {
						$memberid3 = "";
					}
				} 
			}	
			$currentcount2 = $currentcount2 + 1;			
		}	
		
		// $membername = $firstname . " " . $middlename . " " . $lastname ;
		// $memberverification = randomPassword() ;	

		// $sql=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE izi69_members SET i_verificationcode = '$memberverification' WHERE i_email='$email'");
		
		// $emailaddress = $email;
		// $your_website = $serverdirectory ;
		// $email_of_the_sender_from_your_website = $serveremail ;
		// $your_email_address = $emailaddress ;
		// $your_email_subject = "izi69 New Member Email Verification";
		// $message_from_the_sender_of_your_website = "Dear $membername,\n\nThanks for signing up for izi69! We're excited to have you as a new member.\n\nCopy and Paste or Click this link to your browser to confirm your email ->\n$serverdirectory"."verification/v.php?e=$emailaddress&v=$memberverification to continue registration process.\n\nRegards,\n\nSupport Team";
		// $mime_boundary = "$your_website".md5(time());
		// $headers = "From: ".$email_of_the_sender_from_your_website."\n";
		// $headers .= "Reply-To: ".$email_of_the_sender_from_your_website."\n";
		// $headers .= "MIME-Version: 1.0\n";
		// $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
		// $message = "--$mime_boundary\n";
		// $message .= "Content-Type: text/plain; charset=UTF-8\n";
		// $message .= "Content-Transfer-Encoding: 8bit\n\n";
		// $message .= $message_from_the_sender_of_your_website."\n\n";
		// $message .= "--$mime_boundary--\n\n";
		// //$mail_sent = mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email");
		
		// try {
		// 	if (mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email")) {
		// 		$status = 'success';
		// 		$msg = 'Mail sent successfully.';
		// 	} else {
		// 		$status = 'failed';
		// 		$msg = 'Unable to send mail.';
		// 	}
		// } catch(Exception $e) {
		// 	$msg = $e->getMessage();
		// }

		// header('Location:'.$serverdirectory);
		// exit();
	}	

	function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	 return implode($pass); //turn the array into a string
	}
      
    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>