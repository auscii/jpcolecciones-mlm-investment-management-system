<?php
  //date_default_timezone_set('Asia/Hong_Kong');
  date_default_timezone_set('Asia/Manila');
  
   include "include/jpc_common.php" ;

  ob_start();
  @session_start();
  
  if (isset($_SESSION['jpcvar_code'])) {
    $jpc_code = $_SESSION['jpcvar_code'];  
  } else {
    $jpc_code = "";
  }         
  if ($jpc_code!="11101000110101001") {
    header('Location:'.$serverdirectory);
    exit();
  }   

  if (isset($_SESSION['jpcvar_id'])) {
    $id = $_SESSION['jpcvar_id'];  
  } else {
    $id = "";
  }   

  if (isset($_SESSION['jpcvar_email'])) {
    $email = $_SESSION['jpcvar_email'];  
  } else {
    $email = "";
  }   

  if (isset($_SESSION['jpcvar_password'])) {
    $password = $_SESSION['jpcvar_password'];  
  } else {
    $password = "";
  }  

  if (isset($_SESSION['jpcvar_memberid'])) {
    $memberid = $_SESSION['jpcvar_memberid'];  
    if ($memberid!="") {
      $referrallink = $serverdirectory."referral.php?r=" . $memberid ;
    }
    
  } else {
    $memberid = "";
  }  

  if (isset($_SESSION['jpcvar_sponsorid'])) {
    $sponsorid = $_SESSION['jpcvar_sponsorid'];  
  } else {
    $sponsorid = "";
  }  

  if (isset($_SESSION['jpcvar_membershipplan'])) {
    $membershipplan = $_SESSION['jpcvar_membershipplan'];  
  } else {
    $membershipplan = "";
  }  

  if (isset($_SESSION['jpcvar_placementid'])) {
    $placementid = $_SESSION['jpcvar_placementid'];  
  } else {
    $placementid = "";
  } 

  if (isset($_SESSION['jpcvar_fullname'])) {
    $fullname = $_SESSION['jpcvar_fullname'];  
  } else {
    $fullname = "";
  }  

  if (isset($_SESSION['jpcvar_firstname'])) {
    $firstname = $_SESSION['jpcvar_firstname'];  
  } else {
    $firstname = "";
  }  

  if (isset($_SESSION['jpcvar_lastname'])) {
    $lastname = $_SESSION['jpcvar_lastname'];  
  } else {
    $lastname = "";
  }  

  if (isset($_SESSION['jpcvar_middlename'])) {
    $middlename = $_SESSION['jpcvar_middlename'];  
  } else {
    $middlename = "";
  }  

  if (isset($_SESSION['jpcvar_address'])) {
    $address = $_SESSION['jpcvar_address'];  
  } else {
    $address = "";
  }   

  if (isset($_SESSION['jpcvar_country'])) {
    $country = $_SESSION['jpcvar_country'];  
  } else {
    $country = "";
  }   

  if (isset($_SESSION['jpcvar_state'])) {
    $state = $_SESSION['jpcvar_state'];  
  } else {
    $state = "";
  }   

  if (isset($_SESSION['jpcvar_city'])) {
    $city = $_SESSION['jpcvar_city'];  
  } else {
    $city = "";
  }  

  if (isset($_SESSION['jpcvar_countrycode'])) {
    $countrycode = $_SESSION['jpcvar_countrycode'];  
  } else {
    $countrycode = "";
  }    

  if (isset($_SESSION['jpcvar_phone'])) {
    $phone = $_SESSION['jpcvar_phone'];  
  } else {
    $phone = "";
  }  

  if (isset($_SESSION['jpcvar_zipcode'])) {
    $zipcode = $_SESSION['jpcvar_zipcode'];  
  } else {
    $zipcode = "";
  }  

  if (isset($_SESSION['jpcvar_gender'])) {
    $gender = $_SESSION['jpcvar_gender'];  
  } else {
    $gender = "";
  }   

  if (isset($_SESSION['jpcvar_dob'])) {
    $dob = $_SESSION['jpcvar_dob'];  
  } else {
    $dob = "";
  }   

  if (isset($_SESSION['jpcvar_investmentamount'])) {
    $investmentamount = $_SESSION['jpcvar_investmentamount'];  
  } else {
    $investmentamount = "";
  }  

  if (isset($_SESSION['jpcvar_personalwalletbalance'])) {
    $personalwalletbalance = $_SESSION['jpcvar_personalwalletbalance'];  
  } else {
    $personalwalletbalance = "";
  }  

  if (isset($_SESSION['jpcvar_externalwalletbalance'])) {
    $externalwalletbalance = $_SESSION['jpcvar_externalwalletbalance'];  
  } else {
    $externalwalletbalance = "";
  }  

  if (isset($_SESSION['jpcvar_stockbonus'])) {
    $stockbonus = $_SESSION['jpcvar_stockbonus'];  
  } else {
    $stockbonus = "";
  }  

  if (isset($_SESSION['jpcvar_specialbonus'])) {
    $specialbonus = $_SESSION['jpcvar_specialbonus'];  
  } else {
    $specialbonus = "";
  }  

  if (isset($_SESSION['jpcvar_withdrawamount'])) {
    $withdrawamount = $_SESSION['jpcvar_withdrawamount'];  
  } else {
    $withdrawamount = "";
  }  

  if (isset($_SESSION['jpcvar_commission'])) {
    $commission = $_SESSION['jpcvar_commission'];  
  } else {
    $commission = "";
  } 

  if (isset($_SESSION['jpcvar_bankname'])) {
    $bankname = $_SESSION['jpcvar_bankname'];  
  } else {
    $bankname = "";
  } 

  if (isset($_SESSION['jpcvar_bankaccountnumber'])) {
    $bankaccountnumber = $_SESSION['jpcvar_bankaccountnumber'];  
  } else {
    $bankaccountnumber = "";
  } 

  if (isset($_SESSION['jpcvar_bankaccountname'])) {
    $bankaccountname = $_SESSION['jpcvar_bankaccountname'];  
  } else {
    $bankaccountname = "";
  } 

  if (isset($_SESSION['jpcvar_thumbnailphoto'])) {
    $thumbnailphoto = $_SESSION['jpcvar_thumbnailphoto'];   
    if ($thumbnailphoto=="") {
      if ($thumbnailphoto=="") {
        $thumbnailphoto = "male.png";
      } if ($gender=="Male") {
        $thumbnailphoto = "male.png";
      } else if ($gender=="Female") {
        $thumbnailphoto = "female.png";
      }
    } else {
      $thumbnailphoto = $_SESSION['jpcvar_thumbnailphoto'];   
    }   
  } else {
    $thumbnailphoto = "";
  }  

  if (isset($_SESSION['jpcvar_profilephoto'])) {
    $profilephoto = $_SESSION['jpcvar_profilephoto'];   
    if ($profilephoto=="") {
      if ($gender=="") {
        $profilephoto = "male.png";
      } if ($gender=="Male") {
        $profilephoto = "male.png";
      } else if ($gender=="Female") {
        $profilephoto = "female.png";
      }
    } else {
      $profilephoto = $_SESSION['jpcvar_profilephoto'];   
    }   
  } else {
    $profilephoto = "";
  }  

  if (isset($_SESSION['jpcvar_invoicephoto'])) {
    $invoicephoto = $_SESSION['jpcvar_invoicephoto'];  
    if ($invoicephoto=="") {
      $invoicephoto = "invoice.png" ;
    } else {
      $invoicephoto = $_SESSION['jpcvar_invoicephoto'];  
    }
  } else {
    $invoicephoto = "";
  }  

  if (isset($_SESSION['jpcvar_isverified'])) {
    $isverified = $_SESSION['jpcvar_isverified'];  
  } else {
    $isverified = "";
  } 

  if (isset($_SESSION['jpcvar_isactive'])) {
    $isactive = $_SESSION['jpcvar_isactive'];  
  } else {
    $isactive = "";
  } 

  if (isset($_SESSION['jpcvar_created'])) {
    $created = $_SESSION['jpcvar_created'];  
  } else {
    $created = "";
  }  

  $currencyvalue = "" ;
  $currencyprefix = "" ;
  $currencysymbol = "" ;
  $externalwalletmaintainingbalance = "" ;
  $announcements = "" ;
  $sqlsettings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_settings LIMIT 1");
  while ($rows=mysqli_fetch_array($sqlsettings)) {
    $currencyvalue = $rows['i_currencyvalue'] ;
    $currencyprefix = $rows['i_currencyprefix'] ;
    $currencyprefix = strtoupper($currencyprefix);
    $currencysymbol = $rows['i_currencysymbol'] ;
    $externalwalletmaintainingbalance = $rows['i_externalwalletmaintainingbalance'] ;
    $announcements = $rows['i_announcements'] ;
  } 

  if (isset($_GET["startmodule"])) {
    $jpc_startmodule = $_GET['startmodule'];   
  } else {
    $jpc_startmodule = "";
  } 

  $limit = 5;  
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
  $start_from = ($page-1) * $limit;   
  $sqlgeneaology = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_email, t1.i_password, t1.i_firstname, t1.i_lastname, t1.i_middlename, t1.i_memberid, t1.i_sponsorid, t1.i_placementid, t1.i_membershipplan, t1.i_investmentamount, t1.i_personalwalletbalance, t1.i_externalwalletbalance, t1.i_stockbonus, t1.i_specialbonus, t1.i_withdrawamount, t1.i_commission, t1.i_isactive, t1.i_thumbnailphoto, t1.i_profilephoto, t2.i_id AS transactionid, t2.i_id, t2.i_uplineid, t2.i_sponsorid, t2.i_level, t2.i_commission, t2.i_paidstatus, t2.i_created AS join_date, t2.i_updated AS last_login, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS uplinename
    FROM jpc_members AS t1 
    INNER JOIN jpc_geneaology2 AS t2 
    ON t1.i_memberid = t2.i_sponsorid 
    INNER JOIN jpc_members AS t3 
    ON t2.i_uplineid = t3.i_memberid 
    WHERE  t2.i_memberid='$memberid'
    ORDER BY t2.i_level, t2.i_id
    ASC LIMIT $start_from, $limit");

  $limit2 = 5;  
  if (isset($_GET["page2"])) { $page2  = $_GET["page2"]; } else { $page2=1; };  
  $start_from2 = ($page2-1) * $limit2; 
  $sqlgeneaology2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_email, t1.i_password, t1.i_firstname, t1.i_lastname, t1.i_middlename, t1.i_memberid, t1.i_sponsorid, t1.i_placementid, t1.i_membershipplan, t1.i_investmentamount, t1.i_personalwalletbalance, t1.i_externalwalletbalance, t1.i_stockbonus, t1.i_specialbonus, t1.i_withdrawamount, t1.i_commission, t1.i_isactive, t1.i_thumbnailphoto, t1.i_profilephoto, t2.i_id AS transactionid, t2.i_id, t2.i_uplineid, t2.i_sponsorid, t2.i_level, t2.i_commission, t2.i_paidstatus, t2.i_created AS join_date, t2.i_updated AS last_login, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS uplinename
    FROM jpc_members AS t1 
    INNER JOIN jpc_geneaology2 AS t2 
    ON t1.i_memberid = t2.i_sponsorid 
    INNER JOIN jpc_members AS t3 
    ON t2.i_uplineid = t3.i_memberid 
    WHERE  t2.i_memberid='$memberid'
    ORDER BY t2.i_level, t2.i_id
    ASC LIMIT $start_from2, $limit2");

  $limit3 = 5;  
  if (isset($_GET["page3"])) { $page3  = $_GET["page3"]; } else { $page3=1; };  
  $start_from3 = ($page3-1) * $limit3; 
  $sqlwithdrawalpayout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *
    FROM jpc_withdrawalpayout 
    WHERE i_memberid='$memberid'
    ORDER BY i_date
    ASC LIMIT $start_from3, $limit3");

  $limit4 = 5;  
  if (isset($_GET["page4"])) { $page4  = $_GET["page4"]; } else { $page4=1; };  
  $start_from4 = ($page4-1) * $limit4; 
  $sqltransactionhistory = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *
    FROM jpc_transactionhistory 
    WHERE i_memberid='$memberid'
    ORDER BY i_created
    ASC LIMIT $start_from4, $limit4");

  $jpc_withdrawalapproved = 0;
  $sqlwithdrawalapproved = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(i_userpayout) AS withdrawalapproved FROM jpc_withdrawalpayout WHERE i_memberid='$memberid' AND i_status=8");
  while ($rows=mysqli_fetch_array($sqlwithdrawalapproved)) {
    $jpc_withdrawalapproved = $rows['withdrawalapproved'] ;
  } 

  $jpc_totalmessages = 0;
  $sqlmessagingcount = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS totalmessages FROM jpc_messaging WHERE i_memberid='$memberid'");
  while ($rows=mysqli_fetch_array($sqlmessagingcount)) {
    $jpc_totalmessages = $rows['totalmessages'] ;
  } 

 $jpc_totaldownlines = 0;
  $sqltotaldownlines = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t1.i_id) AS totaldownlines
    FROM jpc_members AS t1 
    INNER JOIN jpc_geneaology2 AS t2 
    ON t1.i_memberid = t2.i_sponsorid 
    INNER JOIN jpc_members AS t3 
    ON t2.i_uplineid = t3.i_memberid 
    WHERE  t2.i_memberid='$memberid'");
  while ($rows=mysqli_fetch_array($sqltotaldownlines)) {
    $jpc_totaldownlines = $rows['totaldownlines'] ;
  } 

  $jpc_totalpendinginvestmentpayout = 0;
  $sqltotalpendinginvestmentpayout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t1.i_id) AS totalpendinginvestmentpayout
    FROM jpc_members AS t1 
    INNER JOIN jpc_geneaology2 AS t2 
    ON t1.i_memberid = t2.i_sponsorid 
    INNER JOIN jpc_members AS t3 
    ON t2.i_uplineid = t3.i_memberid 
    WHERE  t2.i_memberid='$memberid' AND t2.i_paidstatus=0");
   while ($rows=mysqli_fetch_array($sqltotalpendinginvestmentpayout)) {
    $jpc_totalpendinginvestmentpayout = $rows['totalpendinginvestmentpayout'] ;
  } 

  $jpc_totalpendingwithdrawalpayout = 0;
  $sqltotalpendingwithdrawalpayout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS totalpendingwithdrawalpayout
    FROM jpc_withdrawalpayout 
    WHERE i_memberid='$memberid' AND i_status=0");
   while ($rows=mysqli_fetch_array($sqltotalpendingwithdrawalpayout)) {
    $jpc_totalpendingwithdrawalpayout = $rows['totalpendingwithdrawalpayout'] ;
  } 

  if ($isactive!=8) {
    $personalwalletbalance = "0.00" ; 
    $externalwalletbalance = "0.00" ;
    $stockbonus = "0.00" ;
    $jpc_withdrawalapproved = "0.00" ;
    $investmentamount = "0.00" ; 
    $specialbonus = "0.00" ;
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid='$memberid' AND i_isverified=8");
	$row = mysqli_fetch_array($result);
	if ($row) {		;	
		$email = "" . $row['i_email'] ;
		$membername = $row['i_firstname'] . " " . $row['i_middlename'] . " " . $row['i_lastname'] ;			
		$emailaddress = $email;
		$your_website = $serverdirectory ;
		$email_of_the_sender_from_your_website = $serveremail ;
		$your_email_address = $emailaddress ;
		$your_email_subject = "jpc Withdrawal Payout";
		$message_from_the_sender_of_your_website = "Requirements Detail\n\n";
		$message_from_the_sender_of_your_website .= "To become jpc-verified, we require you to provide a proof of identity and a invoice proof of payment.\n\n";
		$message_from_the_sender_of_your_website .= "Proof of Identity (ID)\n\n";
		$message_from_the_sender_of_your_website .= "You may submit a colored scan of any of the following acceptable identification documents:\n\n";
		$message_from_the_sender_of_your_website .= "Passport, Driver's License, National ID card, Tax ID, Proof of Age ID, Professional License ID, State ID, Voter's ID, Postal ID, Government-issued Health Cards, Other IDs - as long as it is government-issued and has your name, photo, date of birth, signature and the ID's date of issue\n\n";
		$message_from_the_sender_of_your_website .= "Invoice Proof of Payment (POP)\n\n";
		$message_from_the_sender_of_your_website .= "You may submit a colored scan of your invoice payment. (Issued within the current week of invoice payment.)\n\n";
		$message_from_the_sender_of_your_website .= "Rules to Remember:\n\n";
		$message_from_the_sender_of_your_website .= "The colored scanned ID and Invoice details must not be handwritten. The copy must have your full name and address. The copy should be a high-quality colored image scan or colored digital photo. Photocopies and black and white scans/photos are not acceptable. Image dimensions must be 500 x 300 pixels minimum. The copy must not be cropped and should include all sides and details. The copy must not be altered or edited in any way. If you are submitting an ID card, please submit its front and back parts. Do not use special characters (i.e. &#@!) in the image's filename so the Verification Team can review the file. Submission of a fake ID and Invoice will result in account closure and may lead to legal actions.\n";
		$message_from_the_sender_of_your_website .= "\n\nRegards,\n\nSupport Team" ;       
		$mime_boundary = "$your_website".md5(time());
		$headers = "From: ".$email_of_the_sender_from_your_website."\n";
		$headers .= "Reply-To: ".$email_of_the_sender_from_your_website."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
		$message = "--$mime_boundary\n";
		$message .= "Content-Type: text/plain; charset=UTF-8\n";
		$message .= "Content-Transfer-Encoding: 8bit\n\n";
		$message .= $message_from_the_sender_of_your_website."\n\n";
		$message .= "--$mime_boundary--\n\n";
		//$mail_sent = mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email");
		
		try {
			if (mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email")) {
				$status = 'success';
				$msg = 'Mail sent successfully.';
			} else {
				$status = 'failed';
				$msg = 'Unable to send mail.';
			}
		} catch(Exception $e) {
			$msg = $e->getMessage();
		}
	}
	
  } 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JP Colecciones | Investment MLM System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="author" content="Walter Aquino Narvasa">  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo" style="background: #3c8dbc;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>JPC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="images/newlogo.png" width="40" height="40"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- HOME ICON -->
          <!-- <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-home"></i>
            </a>
          </li> -->

          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger"><?php echo $jpc_totalmessages+0 ; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- start message -->
                  <?php
                    $sqlmessaging = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_messaging WHERE i_memberid='$memberid'");
                    while ($rows=mysqli_fetch_array($sqlmessaging)) {
                      $jpc_messagingmessage = $rows['i_message'] ;
                      $jpc_messagingcreated = $rows['i_created'] ;

                      echo '<li><a href="#"><div class="pull-left">' ;
                      echo '<img src="images/photos/supportteam.png" width="160px" height="160px" class="img-circle" alt="Support Team">' ;
                      echo '</div><h4>Support Team' ;
                      echo '<small><i class="fa fa-clock-o"></i> ' . $jpc_messagingcreated . ' </small>' ;
                      echo  '</h4><p>' . $jpc_messagingmessage . '</p></a></li>' ;
                    } 
                  ?>
                  <!-- end message -->
                </ul>
              </li>
            </ul>
          </li>

          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- Task item -->
                  <li>
                    <a href="#">
                      <h3>
                        <?php echo $announcements ; ?>
                      </h3>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img id="jpc_accountphoto" name="jpc_accountphoto" src="<?php echo 'images/photos/' . $thumbnailphoto ; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fullname ; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img id="jpc_accountphoto2" name="jpc_accountphoto2" src="<?php echo 'images/photos/' . $thumbnailphoto ; ?>" class="user-image" alt="User Image">

                <p align="left">
                  <?php echo $fullname ; ?>
                  <small>Member since: <?php echo '<strong>'.date('m-d-Y', strtotime($created)) . "</strong><br> Downlines: <strong>" .  $jpc_totaldownlines . '</strong><br>Pending Investments: <strong>' . $jpc_totalpendinginvestmentpayout . '</strong><br>Pending Withdrawals: <strong>' . $jpc_totalpendingwithdrawalpayout . '</strong>' ; ?></small>
                </p>
              </li>

              <!-- Menu Body -->
              <li class="user-footer">
                 <div class="pull-left">
                  <a href="#" onclick="LoadProfile();" class="btn btn-default btn-flat" style="width: 262px; text-align: center; margin:0 auto;">
                    <i class="fa fa-user-o"></i>&nbsp;
                      <span>Profile</span>
                  </a>
                 </div>
              </li>

               <li class="user-footer">
                 <div class="pull-left">
                  <a href="#" onclick="document.location.href ='jpc_main.php'" class="btn btn-default btn-flat" style="width: 262px; text-align: center; margin:0 auto;">
                    <i class="fa fa-refresh"></i>&nbsp;
                      <span>Reload</span>
                  </a>
                 </div>
              </li>

              <li class="user-footer">
                 <div class="pull-left">
                  <a href="#" onclick="LoadLogout();" class="btn btn-default btn-flat" style="width: 262px; text-align: center; margin:0 auto;">
                    <i class="fa fa-sign-out"></i>&nbsp;
                      <span>Logout</span>
                  </a>
                 </div>
              </li>

            </ul>

          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img id="jpc_accountphoto3" name="jpc_accountphoto3" src="<?php echo 'images/photos/' . $thumbnailphoto ; ?>" width="160px" height="160px" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fullname ; ?></p>
          <a href="#">
          <?php 
            if ($isactive==8) {
              echo '<i class="fa fa-circle text-success"></i> Status: <strong>Active</strong></a><br>' ; 
            } else {
              echo '<i class="fa fa-circle text-danger"></i> Status: <strong>Inactive</strong></a><br>' ; 
            }
          ?>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#" onclick="LoadDashboard();">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadProfile();">
            <i class="fa fa-user-o"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadUploadProfileImage();">
            <i class="fa fa-camera"></i> <span>Upload Profile Photo</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadUploadInvoiceImage();">
            <i class="fa fa-camera"></i> <span>Upload Proof of Payment</span>
          </a>
        </li>

        <?php 
            if ($isactive==8) {
              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadEditProfile();">' ;
              echo '<i class="fa fa-pencil-square-o"></i>' ;
              echo '<span>Edit profile</span>' ;
              echo '</a></li>' ;
      
              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadChangePassword();">' ;
              echo '<i class="fa fa-unlock-alt"></i>' ;
              echo '<span>Change password</span>' ;
              echo '</a></li>' ;

              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadReferralLink();">' ;
              echo '<i class="fa fa-female"></i>' ;
              echo '<span>Referral Link</span>' ;
              echo '</a></li>' ;

              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadWithdrawalPayout();">' ;
              echo '<i class="fa fa-credit-card"></i> <span>Withdrawal Payout</span>' ;
              echo '</a></li>' ;

              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadGeneaology();">' ;
              echo '<i class="fa fa-sitemap"></i> <span>Genealogy history</span>' ;
              echo '</a></li>' ;

              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadInvestment();">' ;
              echo '<i class="fa fa-download"></i> <span>Investment history</span>' ;
              echo '</a></li>' ;

              echo '<li class="treeview">' ;
              echo '<a href="#" onclick="LoadTransactionHistory();">' ;
              echo '<i class="fa fa-exchange"></i> <span>Transaction history</span>' ;
              echo '</a></li>' ;
            }
        ?>

        <li class="treeview">
          <a href="#" onclick="LoadLogout();">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section id="jpc_MainCaption" name="jpc_MainCaption" class="content-header">
      <h1>
        Member Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="LoadDashboard();"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Member Dashboard</li>
        <li><span id="jpc_MemberDashboard"></span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="modal modal-danger fade" id="jpc_Alert" name="jpc_Alert">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">jpc Info</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group" align="center">
                        <h1><span id="jpc_alertmessage"></span></h1>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pu" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal modal-success fade" id="jpc_Requirements" name="jpc_Requirements">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">jpc Requirements</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group" align="center">
                        <h4><strong>Requirements Detail</strong></h4>
                        <p>To become jpc-verified, we require you to provide a proof of identity and a invoice proof of payment.</p>
                        <h4><strong>Proof of Identity (ID)</strong></h4>
                        <p>You may submit a colored scan of any of the following acceptable identification documents:</p>
                        <p>Passport, Driver's License, National ID card, Tax ID, Proof of Age ID, Professional License ID, State ID, Voter's ID, Postal ID, Government-issued Health Cards, Other IDs - as long as it is government-issued and has your name, photo, date of birth, signature and the ID's date of issue</p>
                        <h4><strong>Invoice Proof of Payment (POP)</strong></h4>
                        <p>You may submit a colored scan of your invoice payment. (Issued within the current week of invoice payment.)</p>
                        <h4><strong>Rules to Remember:</strong></h4>
                        <p>The colored scanned ID and Invoice details must not be handwritten. The copy must have your full name and address. The copy should be a high-quality colored image scan or colored digital photo. Photocopies and black and white scans/photos are not acceptable. Image dimensions must be 500 x 300 pixels minimum. The copy must not be cropped and should include all sides and details. The copy must not be altered or edited in any way. If you are submitting an ID card, please submit its front and back parts. Do not use special characters (i.e. &#@!) in the image's filename so the Verification Team can review the file. <strong>Submission of a fake ID and Invoice will result in account closure and may lead to legal actions. </strong></p>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pu" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Small boxes (Stat box) -->
      <div id="jpc_DashboardWidget" name="jpc_DashboardWidget" class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $personalwalletbalance ; ?> <?php echo $currencyprefix ; ?></h3>

              <p>Stock Wallet Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $externalwalletbalance ; ?> <?php echo $currencyprefix ; ?></h3>

              <p>External Wallet Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $stockbonus ; ?> Shares</h3>

              <p>Stock Bonus</p>
            </div>
            <div class="icon">
              <i class="ion ion-network"></i>
            </div>
          </div>
        </div>        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jpc_withdrawalapproved ; ?> <?php echo $currencyprefix ; ?></h3>

              <p>Withdrawal Approved</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div id="jpc_MemberProfile" name="jpc_MemberProfile" class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Member Profile</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                      <li>
                        <table width="400" border="0">
                          <tbody>
                            <tr>
                              <td>
                                  <img id="jpc_accountphoto4" name="jpc_accountphoto4" src="<?php echo 'images/photos/' . $thumbnailphoto ; ?>" width="128px" height="128px" class="user-image" alt="User Image">
                              </td>
                              <td align="left">     
                                <p>Name: <strong><br><?php echo $fullname ; ?> </strong></p>
                                <p>Member ID: <strong><br><?php echo $memberid ; ?> </strong></p>
                                <p>Email: <strong><br><?php echo $email ; ?> </strong></p>
                                <p>Sponsor ID: <strong><br><?php echo $sponsorid ; ?> </strong></p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Investment Status</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Investment Amount</span>
                    <span class="progress-number"><b><?php echo $investmentamount ; ?></b> <?php echo $currencyprefix ; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Stock Wallet Balance</span>
                    <span class="progress-number"><b><?php echo $personalwalletbalance ; ?></b> <?php echo $currencyprefix ; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-agua" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Stock Bonus</span>
                    <span class="progress-number"><b><?php echo $stockbonus ; ?></b> Shares</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Special Bonus</span>
                    <span class="progress-number"><b><?php echo $specialbonus ; ?></b> <?php echo $currencyprefix ; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div id="jpc_UploadProfileImage" name="jpc_UploadProfileImage" class="row" style="display: none">
        <div class="col-md-24">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Profile Photo (Image)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4>jpc Profile Photo</h4>
                  <p>This will serve as your avatar and profile photo when you log in. Please click choose file and click upload profile photo.</p>
                </div>
                <h4><strong>Profile Photo</strong></h4>
                <img id="jpc_uploadphoto" name="jpc_uploadphoto" src="<?php echo 'images/photos/' . $thumbnailphoto ; ?>" width="300px" height="300px" alt="Profile Photo Image">
                <br>
                <div id="body-overlay"></div>
                <div class="bgColor">
                  <form id="jpc_form" action="" method="post">
                    <div id="targetOuter">
                      <input type="hidden" id="jpc_id" name="jpc_id" value="<?php echo $id ; ?>">
                      <input name="jpc_photo" id="jpc_photo" type="file" class="inputFile" onChange="showPreview(this,1);" />
                    </div>
                  <div>
    
                    <input type="submit" value="Upload Profile Photo" class="btnSubmit" />
                    </form>
                  </div>
                </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div id="jpc_UploadInvoiceImage" name="jpc_UploadInvoiceImage" class="row" style="display: none">
        <div class="col-md-24">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Proof of Payment (Images)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>jpc Requirements</h4>
                <p>To become jpc-verified, we require you to provide an ID and a invoice proof of payment. Please click choose file and click upload photo. <button type="button" class="btn btn-info" data-toggle="modal" data-target="#jpc_Requirements">
                View Requirements
              </button></p>
              </div>
              <table width="400" border="0">
                <tbody>
                  <tr>
                    <td>
                        <h4><strong>Personal ID Photo</strong></h4>
                        <img id="jpc_uploadphoto2" name="jpc_uploadphoto2" src="<?php echo 'images/photos/' . $profilephoto ; ?>" width="300px" height="300px" alt="Personal ID Photo Image">
                    </td>
                     <td width="150px;"></td>
                     <td>
                        <h4><strong>Invoice Photo</strong></h4>
                        <img id="jpc_uploadphoto3" name="jpc_uploadphoto3" src="<?php echo 'images/photos/' . $invoicephoto ; ?>" width="300px" height="300px" alt="Invoice Photo Image">
                    </td>
                  </tr>
                  <tr>
                    <td align="left">     
                        <div id="body-overlay"></div>
                        <div class="bgColor">
                          <form id="jpc_form2" action="" method="post">
                            <div id="targetOuter">
                              <input type="hidden" id="jpc_id2" name="jpc_id2" value="<?php echo $id ; ?>">
                              <input name="jpc_photo2" id="jpc_photo2" type="file" class="inputFile" onChange="showPreview(this,2);" />
                            </div>
                          <div>
                            <input type="submit" value="Upload Personal ID Photo" class="btnSubmit" />
                            </form>
                          </div>
                        </div>
                    </td>
                    <td width="50px;"></td>
                    <td align="left">     
                        <div id="body-overlay2"></div>
                        <div class="bgColor">
                          <form id="jpc_form3" action="" method="post">
                            <div id="targetOuter">
                              <input type="hidden" id="jpc_id3" name="jpc_id3" value="<?php echo $id ; ?>">
                              <input name="jpc_photo3" id="jpc_photo3" type="file" class="inputFile" onChange="showPreview(this,3);" />
                            </div>
                          <div>
                            <input type="submit" value="Upload Invoice Photo" class="btnSubmit" />
                            </form>
                          </div>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- SELECT2 EXAMPLE -->
      <div id="jpc_PersonalDetails" name="jpc_PersonalDetails"  class="box box-default" style="display: none">
        <div class="box-header with-border">
          <h3 class="box-title">Basic Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Fullname: <?php echo $fullname ; ?></label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Member ID: <?php echo $memberid ; ?></label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email Address: <?php echo $email ; ?></label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Sponsor ID: <?php echo $sponsorid ; ?></label>
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone: <?php echo $phone ; ?></label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Investment Amount: <?php echo $investmentamount ; ?></label>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div id="jpc_EditProfile" name="jpc_EditProfile" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formeditprofile" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_editprofileid" name="jpc_editprofileid" value="<?php echo $id ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_firstname" class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_firstname" name="jpc_firstname" placeholder="First Name" value="<?php echo $firstname ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_lastname" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_lastname" name="jpc_lastname" placeholder="Last Name" value="<?php echo $lastname ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_middlename" class="col-sm-2 control-label">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_middlename" name="jpc_middlename" placeholder="Middle Name" value="<?php echo $middlename ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_email" class="col-sm-2 control-label">Email Address</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="jpc_email" name="jpc_email" placeholder="Email Address" value="<?php echo $email ; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_gender" class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" id="jpc_gender" name="jpc_gender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <script type="text/javascript">
                    var gender = "<?php echo $gender ; ?>" ;
                    document.getElementById("jpc_gender").value = gender ;
                  </script>
                </div>
                <div class="form-group">
                  <label for="jpc_dob" class="col-sm-2 control-label">Date of Birth</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="jpc_dob" name="jpc_dob" value="<?php echo $dob ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_investmentamount" class="col-sm-2 control-label">Investment Amount</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jpc_investmentamount" name="jpc_investmentamount" value="<?php echo $investmentamount ; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_membershipplan" class="col-sm-2 control-label">Membership Plan</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" id="jpc_membershipplan" name="jpc_membershipplan" readonly>
                    <option>Referral Bonus For Package 1</option>
                    <option>Referral Bonus For Package 2</option>
                    <option>Referral Bonus For Package 3</option>
                    <option>Referral Bonus For Package 4</option>
                    <option>Referral Bonus For Package 5</option>
                    </select>
                    <script type="text/javascript">
                      var membershipplan = "<?php echo $membershipplan ; ?>" ;
                      document.getElementById("jpc_membershipplan").value = membershipplan ;
                    </script>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_address" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_address" name="jpc_address" placeholder="Address" value="<?php echo $address ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_country" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" id="jpc_country" name="jpc_country">
                      <option value="">  </option>
                      <option value="Afghanistan"> Afghanistan </option>
                      <option value="Albania"> Albania </option>
                      <option value="Algeria"> Algeria </option>
                      <option value="American Samoa"> American Samoa </option>
                      <option value="Andorra"> Andorra </option>
                      <option value="Angola"> Angola </option>
                      <option value="Anguilla"> Anguilla </option>
                      <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                      <option value="Argentina"> Argentina </option>
                      <option value="Armenia"> Armenia </option>
                      <option value="Aruba"> Aruba </option>
                      <option value="Australia"> Australia </option>
                      <option value="Austria"> Austria </option>
                      <option value="Azerbaijan"> Azerbaijan </option>
                      <option value="The Bahamas"> The Bahamas </option>
                      <option value="Bahrain"> Bahrain </option>
                      <option value="Bangladesh"> Bangladesh </option>
                      <option value="Barbados"> Barbados </option>
                      <option value="Belarus"> Belarus </option>
                      <option value="Belgium"> Belgium </option>
                      <option value="Belize"> Belize </option>
                      <option value="Benin"> Benin </option>
                      <option value="Bermuda"> Bermuda </option>
                      <option value="Bhutan"> Bhutan </option>
                      <option value="Bolivia"> Bolivia </option>
                      <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                      <option value="Botswana"> Botswana </option>
                      <option value="Brazil"> Brazil </option>
                      <option value="Brunei"> Brunei </option>
                      <option value="Bulgaria"> Bulgaria </option>
                      <option value="Burkina Faso"> Burkina Faso </option>
                      <option value="Burundi"> Burundi </option>
                      <option value="Cambodia"> Cambodia </option>
                      <option value="Cameroon"> Cameroon </option>
                      <option value="Canada"> Canada </option>
                      <option value="Cape Verde"> Cape Verde </option>
                      <option value="Cayman Islands"> Cayman Islands </option>
                      <option value="Central African Republic"> Central African Republic </option>
                      <option value="Chad"> Chad </option>
                      <option value="Chile"> Chile </option>
                      <option value="People &#x27;s Republic of China"> People &#x27;s Republic of China </option>
                      <option value="Republic of China"> Republic of China </option>
                      <option value="Christmas Island"> Christmas Island </option>
                      <option value="Cocos(Keeling) Islands"> Cocos(Keeling) Islands </option>
                      <option value="Colombia"> Colombia </option>
                      <option value="Comoros"> Comoros </option>
                      <option value="Congo"> Congo </option>
                      <option value="Cook Islands"> Cook Islands </option>
                      <option value="Costa Rica"> Costa Rica </option>
                      <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
                      <option value="Croatia"> Croatia </option>
                      <option value="Cuba"> Cuba </option>
                      <option value="Cyprus"> Cyprus </option>
                      <option value="Czech Republic"> Czech Republic </option>
                      <option value="Denmark"> Denmark </option>
                      <option value="Djibouti"> Djibouti </option>
                      <option value="Dominica"> Dominica </option>
                      <option value="Dominican Republic"> Dominican Republic </option>
                      <option value="Ecuador"> Ecuador </option>
                      <option value="Egypt"> Egypt </option>
                      <option value="El Salvador"> El Salvador </option>
                      <option value="Equatorial Guinea"> Equatorial Guinea </option>
                      <option value="Eritrea"> Eritrea </option>
                      <option value="Estonia"> Estonia </option>
                      <option value="Ethiopia"> Ethiopia </option>
                      <option value="Falkland Islands"> Falkland Islands </option>
                      <option value="Faroe Islands"> Faroe Islands </option>
                      <option value="Fiji"> Fiji </option>
                      <option value="Finland"> Finland </option>
                      <option value="France"> France </option>
                      <option value="French Polynesia"> French Polynesia </option>
                      <option value="Gabon"> Gabon </option>
                      <option value="The Gambia"> The Gambia </option>
                      <option value="Georgia"> Georgia </option>
                      <option value="Germany"> Germany </option>
                      <option value="Ghana"> Ghana </option>
                      <option value="Gibraltar"> Gibraltar </option>
                      <option value="Greece"> Greece </option>
                      <option value="Greenland"> Greenland </option>
                      <option value="Grenada"> Grenada </option>
                      <option value="Guadeloupe"> Guadeloupe </option>
                      <option value="Guam"> Guam </option>
                      <option value="Guatemala"> Guatemala </option>
                      <option value="Guernsey"> Guernsey </option>
                      <option value="Guinea"> Guinea </option>
                      <option value="Guinea - Bissau"> Guinea - Bissau </option>
                      <option value="Guyana"> Guyana </option>
                      <option value="Haiti"> Haiti </option>
                      <option value="Honduras"> Honduras </option>
                      <option value="Hong Kong"> Hong Kong </option>
                      <option value="Hungary"> Hungary </option>
                      <option value="Iceland"> Iceland </option>
                      <option value="India"> India </option>
                      <option value="Indonesia"> Indonesia </option>
                      <option value="Iran"> Iran </option>
                      <option value="Iraq"> Iraq </option>
                      <option value="Ireland"> Ireland </option>
                      <option value="Israel"> Israel </option>
                      <option value="Italy"> Italy </option>
                      <option value="Jamaica"> Jamaica </option>
                      <option value="Japan"> Japan </option>
                      <option value="Jersey"> Jersey </option>
                      <option value="Jordan"> Jordan </option>
                      <option value="Kazakhstan"> Kazakhstan </option>
                      <option value="Kenya"> Kenya </option>
                      <option value="Kiribati"> Kiribati </option>
                      <option value="North Korea"> North Korea </option>
                      <option value="South Korea"> South Korea </option>
                      <option value="Kosovo"> Kosovo </option>
                      <option value="Kuwait"> Kuwait </option>
                      <option value="Kyrgyzstan"> Kyrgyzstan </option>
                      <option value="Laos"> Laos </option>
                      <option value="Latvia"> Latvia </option>
                      <option value="Lebanon"> Lebanon </option>
                      <option value="Lesotho"> Lesotho </option>
                      <option value="Liberia"> Liberia </option>
                      <option value="Libya"> Libya </option>
                      <option value="Liechtenstein"> Liechtenstein </option>
                      <option value="Lithuania"> Lithuania </option>
                      <option value="Luxembourg"> Luxembourg </option>
                      <option value="Macau"> Macau </option>
                      <option value="Macedonia"> Macedonia </option>
                      <option value="Madagascar"> Madagascar </option>
                      <option value="Malawi"> Malawi </option>
                      <option value="Malaysia"> Malaysia </option>
                      <option value="Maldives"> Maldives </option>
                      <option value="Mali"> Mali </option>
                      <option value="Malta"> Malta </option>
                      <option value="Marshall Islands"> Marshall Islands </option>
                      <option value="Martinique"> Martinique </option>
                      <option value="Mauritania"> Mauritania </option>
                      <option value="Mauritius"> Mauritius </option>
                      <option value="Mayotte"> Mayotte </option>
                      <option value="Mexico"> Mexico </option>
                      <option value="Micronesia"> Micronesia </option>
                      <option value="Moldova"> Moldova </option>
                      <option value="Monaco"> Monaco </option>
                      <option value="Mongolia"> Mongolia </option>
                      <option value="Montenegro"> Montenegro </option>
                      <option value="Montserrat"> Montserrat </option>
                      <option value="Morocco"> Morocco </option>
                      <option value="Mozambique"> Mozambique </option>
                      <option value="Myanmar"> Myanmar </option>
                      <option value="Nagorno - Karabakh"> Nagorno - Karabakh </option>
                      <option value="Namibia"> Namibia </option>
                      <option value="Nauru"> Nauru </option>
                      <option value="Nepal"> Nepal </option>
                      <option value="Netherlands"> Netherlands </option>
                      <option value="Netherlands Antilles"> Netherlands Antilles </option>
                      <option value="New Caledonia"> New Caledonia </option>
                      <option value="New Zealand"> New Zealand </option>
                      <option value="Nicaragua"> Nicaragua </option>
                      <option value="Niger"> Niger </option>
                      <option value="Nigeria"> Nigeria </option>
                      <option value="Niue"> Niue </option>
                      <option value="Norfolk Island"> Norfolk Island </option>
                      <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                      <option value="Northern Mariana"> Northern Mariana </option>
                      <option value="Norway"> Norway </option>
                      <option value="Oman"> Oman </option>
                      <option value="Pakistan"> Pakistan </option>
                      <option value="Palau"> Palau </option>
                      <option value="Palestine"> Palestine </option>
                      <option value="Panama"> Panama </option>
                      <option value="Papua New Guinea"> Papua New Guinea </option>
                      <option value="Paraguay"> Paraguay </option>
                      <option value="Peru"> Peru </option>
                      <option value="Philippines"> Philippines </option>
                      <option value="Pitcairn Islands"> Pitcairn Islands </option>
                      <option value="Poland"> Poland </option>
                      <option value="Portugal"> Portugal </option>
                      <option value="Puerto Rico"> Puerto Rico </option>
                      <option value="Qatar"> Qatar </option>
                      <option value="Romania"> Romania </option>
                      <option value="Russia"> Russia </option>
                      <option value="Rwanda"> Rwanda </option>
                      <option value="Saint Barthelemy"> Saint Barthelemy </option>
                      <option value="Saint Helena"> Saint Helena </option>
                      <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                      <option value="Saint Lucia"> Saint Lucia </option>
                      <option value="Saint Martin"> Saint Martin </option>
                      <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                      <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                      <option value="Samoa"> Samoa </option>
                      <option value="San Marino"> San Marino </option>
                      <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                      <option value="Saudi Arabia"> Saudi Arabia </option>
                      <option value="Senegal"> Senegal </option>
                      <option value="Serbia"> Serbia </option>
                      <option value="Seychelles"> Seychelles </option>
                      <option value="Sierra Leone"> Sierra Leone </option>
                      <option value="Singapore"> Singapore </option>
                      <option value="Slovakia"> Slovakia </option>
                      <option value="Slovenia"> Slovenia </option>
                      <option value="Solomon Islands"> Solomon Islands </option>
                      <option value="Somalia"> Somalia </option>
                      <option value="Somaliland"> Somaliland </option>
                      <option value="South Africa"> South Africa </option>
                      <option value="South Ossetia"> South Ossetia </option>
                      <option value="Spain"> Spain </option>
                      <option value="Sri Lanka"> Sri Lanka </option>
                      <option value="Sudan"> Sudan </option>
                      <option value="Suriname"> Suriname </option>
                      <option value="Svalbard"> Svalbard </option>
                      <option value="Swaziland"> Swaziland </option>
                      <option value="Sweden"> Sweden </option>
                      <option value="Switzerland"> Switzerland </option>
                      <option value="Syria"> Syria </option>
                      <option value="Taiwan"> Taiwan </option>
                      <option value="Tajikistan"> Tajikistan </option>
                      <option value="Tanzania"> Tanzania </option>
                      <option value="Thailand"> Thailand </option>
                      <option value="Timor - Leste"> Timor - Leste </option>
                      <option value="Togo"> Togo </option>
                      <option value="Tokelau"> Tokelau </option>
                      <option value="Tonga"> Tonga </option>
                      <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                      <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                      <option value="Tristan da Cunha"> Tristan da Cunha </option>
                      <option value="Tunisia"> Tunisia </option>
                      <option value="Turkey"> Turkey </option>
                      <option value="Turkmenistan"> Turkmenistan </option>
                      <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                      <option value="Tuvalu"> Tuvalu </option>
                      <option value="Uganda"> Uganda </option>
                      <option value="Ukraine"> Ukraine </option>
                      <option value="United Arab Emirates"> United Arab Emirates </option>
                      <option value="United Kingdom"> United Kingdom </option>
                      <option value="United States"> United States </option>
                      <option value="Uruguay"> Uruguay </option>
                      <option value="Uzbekistan"> Uzbekistan </option>
                      <option value="Vanuatu"> Vanuatu </option>
                      <option value="Vatican City"> Vatican City </option>
                      <option value="Venezuela"> Venezuela </option>
                      <option value="Vietnam"> Vietnam </option>
                      <option value="British Virgin Islands"> British Virgin Islands </option>
                      <option value="Isle of Man"> Isle of Man </option>
                      <option value="US Virgin Islands"> US Virgin Islands </option>
                      <option value="Wallis and Futuna"> Wallis and Futuna </option>
                      <option value="Western Sahara"> Western Sahara </option>
                      <option value="Yemen"> Yemen </option>
                      <option value="Zambia"> Zambia </option>
                      <option value="Zimbabwe"> Zimbabwe </option>
                    </select>
                    <script type="text/javascript">
                      var country = "<?php echo $country ; ?>" ;
                      document.getElementById("jpc_country").value = country ;
                    </script>                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_state" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_state" name="jpc_state" placeholder="State" value="<?php echo $state ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_city" class="col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_city" name="jpc_city" placeholder="City" value="<?php echo $city ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_countrycode" class="col-sm-2 control-label">Country Code</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jpc_countrycode" name="jpc_countrycode" value="<?php echo $countrycode ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_phone" name="jpc_phone" value="<?php echo $phone ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_zipcode" class="col-sm-2 control-label">Zip Code</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jpc_zipcode" name="jpc_zipcode" value="<?php echo $zipcode ; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_bankname" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_bankname" name="jpc_bankname" value="<?php echo $bankname ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_bankaccountnumber" class="col-sm-2 control-label">Bank Account Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_bankaccountnumber" name="jpc_bankaccountnumber" value="<?php echo $bankaccountnumber ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_bankaccountname" class="col-sm-2 control-label">Bank Account Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_bankaccountname" name="jpc_bankaccountname" value="<?php echo $bankaccountname ; ?>">
                  </div>
                </div>
                
                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <div id="jpc_ChangePassword" name="jpc_ChangePassword" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formchangepassword" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_changepasswordid" name="jpc_changepasswordid" value="<?php echo $id ; ?>">
              <input type="hidden" id="jpc_changepasswordemail" name="jpc_changepasswordemail" value="<?php echo $email ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_password" class="col-sm-2 control-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="jpc_password" name="jpc_password" value="<?php echo $password ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_password2" class="col-sm-2 control-label">Re-Enter Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="jpc_password2" name="jpc_password2">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <div id="jpc_ReferralLink" name="jpc_ReferralLink" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Referral Link</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <input type="hidden" id="jpc_editprofileid" name="jpc_editprofileid" value="<?php echo $id ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_zipcode" class="col-sm-2 control-label">Referral Link <br>(Copy-Paste)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_referrallink" name="jpc_referrallink" value="<?php echo $referrallink ; ?>" readonly>
                  </div>
                  <br>
                </div>
                <div class="box-footer">
                   <button id="jpc_CopyReferralLink" class="btn btn-info pull-right">Copy</button>
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div id="jpc_TransactionHistory" name="jpc_TransactionHistory" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaction history</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Date/Time</th>
                    <th>Description</th>
                    <th>IN (<?php echo $currencyprefix ; ?>)</th>
                    <th>OUT (<?php echo $currencyprefix ; ?>)</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($rows=mysqli_fetch_array($sqltransactionhistory)) { ?> 
                    <tr>
                      <td><?php echo $rows["i_id"]; ?></td>
                      <td><?php echo $rows["i_created"]; ?></td>
                      <td><?php echo $rows["i_description"]; ?></td>
                      <td><?php echo $rows["i_inamount"]; ?></td>
                      <td><?php echo $rows["i_outamount"]; ?></td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
                <?php  
                  $sqlpagination4 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id)
                                              FROM jpc_transactionhistory 
                                              WHERE i_memberid='$memberid'");
                  $row=mysqli_fetch_row($sqlpagination4);
                  $total_records4 = $row[0];  
                  $total_pages4 = ceil($total_records4 / $limit4);  
                  $pagLink4 = "<nav><ul class='pagination'>";  
                  for ($i=1; $i<=$total_pages4; $i++) {  
                               $pagLink4 .= "<li><a href='jpc_main.php?startmodule=" . 'transactionhistory' . "&page4=".$i."'>".$i."</a></li>";  
                  };  
                  echo $pagLink4 . "</ul></nav>";  
                ?>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->

      <!-- Main row -->
      <div id="jpc_Investment" name="jpc_Investment" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Investment history</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Transaction ID</th>
                    <th>Sponsor ID</th>
                    <th>Sponsor Name</th>
                    <th>Pay Amount (<?php echo $currencyprefix ; ?>)</th>
                    <th>Commission Amount (<?php echo $currencyprefix ; ?>)</th>
                    <th>Date/Time</th>
                    <th>Processing Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $xid=1; while ($rows=mysqli_fetch_array($sqlgeneaology)) { ?> 
                    <tr>
                      <td><?php echo $xid ?></td>
                      <td><?php echo $rows["transactionid"]; ?></td>
                      <td><?php echo $rows["i_memberid"]; ?></td>
                      <td><?php echo $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"]; ?></td>
                      <td><?php echo $rows["i_investmentamount"]; ?></td>
                      <td><?php echo $rows["i_commission"]; ?></td>
                      <td><?php echo $rows["join_date"]; ?></td>
                      <td><?php 
                            if ($rows["i_paidstatus"]==0) {
                              $paidstatus = "Pending" ;
                            } else {
                              $paidstatus = "Processed" ;
                            }
                           echo $paidstatus ?></td>
                    </tr>
                  <?php $xid++; }; ?>
                  </tbody>
                </table>
                <?php  
                  $sqlpagination = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id)
                                              FROM jpc_members AS t1 
                                              INNER JOIN jpc_geneaology2 AS t2 
                                              ON t1.i_memberid = t2.i_sponsorid 
                                              WHERE  t2.i_memberid='$memberid'");
                  $row=mysqli_fetch_row($sqlpagination);
                  $total_records = $row[0];  
                  $total_pages = ceil($total_records / $limit);  
                  $pagLink = "<nav><ul class='pagination'>";  
                  for ($i=1; $i<=$total_pages; $i++) {  
                               $pagLink .= "<li><a href='jpc_main.php?startmodule=" . 'investmenthistory' . "&page=".$i."'>".$i."</a></li>";  
                  };  
                  echo $pagLink . "</ul></nav>";  
                ?>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->


      <!-- Main row -->
      <div id="jpc_Geneaology" name="jpc_Geneaology" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Genealogy history</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Join Date/Time</th>
                    <th>Member</th>
                    <th>Member ID</th>
                    <th>Level</th>
                    <th>Upline ID</th>
                    <th>Upline Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($rows=mysqli_fetch_array($sqlgeneaology2)) { ?> 
                    <tr>
                      <td><?php echo $rows["i_id"]; ?></td>
                      <td><?php echo $rows["join_date"]; ?></td>
                      <td><?php echo $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"]; ?></td>
                      <td><?php echo $rows["i_memberid"]; ?></td>
                      <td><?php echo $rows["i_level"]; ?></td>
                      <td><?php echo $rows["i_uplineid"]; ?></td>
                      <td><?php echo $rows["uplinename"]; ?></td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
                <?php  
                  $sqlpagination2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id)
                                              FROM jpc_members AS t1 
                                              INNER JOIN jpc_geneaology2 AS t2 
                                              ON t1.i_memberid = t2.i_sponsorid 
                                              WHERE  t2.i_memberid='$memberid'");
                  $row=mysqli_fetch_row($sqlpagination2);
                  $total_records2 = $row[0];  
                  $total_pages2 = ceil($total_records2 / $limit2);  
                  $pagLink2 = "<nav><ul class='pagination'>";  
                  for ($i=1; $i<=$total_pages2; $i++) {  
                               $pagLink2 .= "<li><a href='jpc_main.php?startmodule=" . 'genealogyhistory' . "&page2=".$i."'>".$i."</a></li>";  
                  };  
                  echo $pagLink2 . "</ul></nav>";  
                ?>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->



      <!-- Main row -->
      <div id="jpc_WithdrawalPayout" name="jpc_WithdrawalPayout" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Withdrawal Payout</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Total Withdrawable Payout (<?php echo $currencyprefix ; ?>)</th>
                    <th>User Payout (<?php echo $currencyprefix ; ?>)</th>
                    <th>Reason</th>
                    <th>Commission</th>
                    <th>Penalty</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($rows=mysqli_fetch_array($sqlwithdrawalpayout)) { ?> 
                    <tr>
                      <td><?php echo $rows["i_id"]; ?></td>
                      <td><?php echo $rows["i_totalpayout"]; ?></td>
                      <td><?php echo $rows["i_userpayout"]; ?></td>
                      <td><?php echo $rows["i_reason"]; ?></td>
                      <td><?php echo $rows["i_commission"]; ?></td>
                      <td><?php echo $rows["i_penalty"]; ?></td>
                      <td><?php echo $rows["i_date"]; ?></td>
                      <td><?php 
                            if ($rows["i_status"]==0) {
                              $status = "Pending" ;
                            } else {
                              $status = "Processed" ;
                            }
                           echo $status ?>
                      </td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
                <?php  
                  $sqlpagination3 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id)
                                              FROM jpc_withdrawalpayout 
                                              WHERE i_memberid='$memberid'");
                  $row=mysqli_fetch_row($sqlpagination3);
                  $total_records3 = $row[0];  
                  $total_pages3 = ceil($total_records3 / $limit3);  
                  $pagLink3 = "<nav><ul class='pagination'>";  
                  for ($i=1; $i<=$total_pages3; $i++) {  
                               $pagLink3 .= "<li><a href='jpc_main.php?startmodule=" . 'withdrawalpayout' . "&page3=".$i."'>".$i."</a></li>";  
                  };  
                  echo $pagLink3 . "</ul></nav>";  
                ?>
              </div>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#jpc_AddNewWithdrawalPayout">
                Add New Withdrawal Payout
              </button>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->
      <div class="modal modal-success fade" id="jpc_AddNewWithdrawalPayout" name="jpc_AddNewWithdrawalPayout">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add New Withdrawal Payout</h4>
                </div>
                  <div class="modal-body">
                    <h3><strong>Current External Wallet Balance (<?php echo $externalwalletbalance ; ?> <?php echo $currencyprefix ; ?>)<br>Current Withdrawable Balance (<?php echo  $externalwalletbalance - $externalwalletmaintainingbalance ; ?> <?php echo $currencyprefix ; ?>)</strong></h3>
                    <div class="form-group">
                      <label for="jpc_addnewwithdrawalpayout_payout" class="control-label">Amount of Payout to be withdrawn</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_addnewwithdrawalpayout_payout" name="jpc_addnewwithdrawalpayout_payout" placeholder="Payout Amount" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_addnewwithdrawalpayout_reason" class="control-label">Reason of withdrawal</label>
                      <div>
                        <input type="text" class="form-control" id="jpc_addnewwithdrawalpayout_reason" name="jpc_addnewwithdrawalpayout_reason" placeholder="Reason" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="jpc_addnewwithdrawalpayout_transferid" class="control-label">Member ID (Payout to->Member Account to be transfered) Leave blank if not applicable.</label>
                      <div>
                        <input type="text" class="form-control" id="jpc_addnewwithdrawalpayout_transferid" name="jpc_addnewwithdrawalpayout_transferid" placeholder="Member ID" value="">
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <div id="jpc_addnewwithdrawalpayoutbutton"><button type="button" class="btn btn-outline pull-left">Save</button></div>
                  <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <!-- /.Main content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021-2022 <a href="https://jpcolecciones.com">JP Colecciones</a></strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script type="text/javascript">

      var vrjpcValidationSettings_Server = "<?php echo $serverdirectory ; ?>";

      var StartModule = "<?php echo $jpc_startmodule ; ?>";
      if (StartModule=="transactionhistory") {
        LoadTransactionHistory() ;  
      } else if (StartModule=="investmenthistory") {
        LoadInvestment() ;
      } else if (StartModule=="withdrawalpayout") {
        LoadWithdrawalPayout() ;
      } else if (StartModule=="genealogyhistory") {
        LoadGeneaology() ;
      }

      var isactive = "<?php echo $isactive ; ?>";
      if (isactive!=8) {
        $('#jpc_Requirements').modal('show');
      } 

      function LoadDashboard() {
        $("#jpc_MemberDashboard").html() ;
        $("#jpc_DashboardWidget").show();
        $("#jpc_MemberProfile").show();
        $("#jpc_PersonalDetails").hide();
        $("#jpc_UploadProfileImage").hide();
        $("#jpc_UploadInvoiceImage").hide(); 
        $("#jpc_EditProfile").hide(); 
        $("#jpc_ChangePassword").hide();         
        $("#jpc_ReferralLink").hide();                    
        $("#jpc_TransactionHistory").hide();   
        $("#jpc_Investment").hide();   
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      }

      function LoadProfile() {
        $("#jpc_MemberDashboard").html("Profile") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").show();
        $("#jpc_PersonalDetails").show();
        $("#jpc_UploadProfileImage").hide();
        $("#jpc_UploadInvoiceImage").hide();    
        $("#jpc_EditProfile").hide();    
        $("#jpc_ChangePassword").hide();             
        $("#jpc_ReferralLink").hide();            
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();    
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadUploadProfileImage() {
        $("#jpc_MemberDashboard").html("Upload Profile Photo") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();
        $("#jpc_UploadProfileImage").show();
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();  
        $("#jpc_ChangePassword").hide();          
        $("#jpc_ReferralLink").hide();                
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();      
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadUploadInvoiceImage() {
        $("#jpc_MemberDashboard").html("Upload Proof of Payment") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();
        $("#jpc_UploadProfileImage").hide();
        $("#jpc_UploadInvoiceImage").show();
        $("#jpc_EditProfile").hide();
        $("#jpc_ChangePassword").hide();         
        $("#jpc_ReferralLink").hide();            
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();    
        $("#jpc_WithdrawalPayout").hide();    
        $("#jpc_Geneaology").hide();
      } 

      function LoadEditProfile() {
        $("#jpc_MemberDashboard").html("Edit Profile") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").show();
        $("#jpc_ChangePassword").hide();         
        $("#jpc_ReferralLink").hide();            
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();        
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadChangePassword() {
        $("#jpc_MemberDashboard").html("Change Password") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();
        $("#jpc_ChangePassword").show();
        $("#jpc_ReferralLink").hide();            
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();        
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadReferralLink() {
        $("#jpc_MemberDashboard").html("Referral Link") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();
        $("#jpc_ChangePassword").hide();         
        $("#jpc_ReferralLink").show();
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();        
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadTransactionHistory() {
        $("#jpc_MemberDashboard").html("Transaction History") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();
        $("#jpc_ChangePassword").hide();            
        $("#jpc_ReferralLink").hide();                 
        $("#jpc_TransactionHistory").show();
        $("#jpc_Investment").hide();        
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadInvestment() {
        $("#jpc_MemberDashboard").html("Investment History") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();  
        $("#jpc_ChangePassword").hide();            
        $("#jpc_ReferralLink").hide();              
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").show();
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").hide();
      } 

      function LoadWithdrawalPayout() {
        $("#jpc_MemberDashboard").html("Withdrawal Payout") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide(); 
        $("#jpc_ChangePassword").hide();          
        $("#jpc_ReferralLink").hide();                  
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();
        $("#jpc_WithdrawalPayout").show();
        $("#jpc_Geneaology").hide();
      } 

      function LoadGeneaology() {
        $("#jpc_MemberDashboard").html("Geneaology History") ;
        $("#jpc_DashboardWidget").hide();
        $("#jpc_MemberProfile").hide();
        $("#jpc_PersonalDetails").hide();    
        $("#jpc_UploadProfileImage").hide();  
        $("#jpc_UploadInvoiceImage").hide();
        $("#jpc_EditProfile").hide();   
        $("#jpc_ChangePassword").hide(); 
        $("#jpc_ReferralLink").hide();    
        $("#jpc_TransactionHistory").hide();
        $("#jpc_Investment").hide();
        $("#jpc_WithdrawalPayout").hide();
        $("#jpc_Geneaology").show();
      } 

      function showPreview(objFileInput,xType) {
        if (objFileInput.files[0]) {
          var fileReader = new FileReader();
          fileReader.onload = function (e) { 
            if (xType==1) {
              $('#jpc_uploadphoto').attr('src',e.target.result); 
              $('#jpc_accountphoto').attr('src',e.target.result); 
              $('#jpc_accountphoto2').attr('src',e.target.result); 
              $('#jpc_accountphoto3').attr('src',e.target.result); 
              $('#jpc_accountphoto4').attr('src',e.target.result); 
            } else if (xType==2) {
              $('#jpc_uploadphoto2').attr('src',e.target.result); 
            } else if (xType==3) {
              $('#jpc_uploadphoto3').attr('src',e.target.result); 
            }
            
          }
          fileReader.readAsDataURL(objFileInput.files[0]);
        }
      }

      $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'jpc_uploadphoto.php' ;
        $("#jpc_form").action = jpc_server ;
        $("#jpc_form").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: jpc_server,
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(){$("#body-overlay").show();},
            contentType: false,
            processData:false,
            success: function(data)
            {  
              AlertMessage("Updated Successfully!");                         
            },
            error: function() 
            {
              AlertMessage("Updated Successfully!");
            }                 
           });
        }));
      });

      $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'jpc_uploadphoto2.php' ;
        $("#jpc_form2").action = jpc_server ;
        $("#jpc_form2").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: jpc_server,
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(){$("#body-overlay").show();},
            contentType: false,
            processData:false,
            success: function(data)
            {  
              AlertMessage("Updated Successfully!");                         
            },
            error: function() 
            {
              AlertMessage("Updated Successfully!");
            }                 
           });
        }));
      });

      $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'jpc_uploadphoto3.php' ;
        $("#jpc_form3").action = jpc_server ;
        $("#jpc_form3").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: jpc_server,
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(){$("#body-overlay2").show();},
            contentType: false,
            processData:false,
            success: function(data)
            {  
              AlertMessage("Updated Successfully!");                         
            },
            error: function() 
            {
              AlertMessage("Updated Successfully!");
            }               
           });
        }));
      });

      $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'jpc_editprofile.php' ;
        $("#jpc_formeditprofile").action = jpc_server ;
        $("#jpc_formeditprofile").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: jpc_server,
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(data)
            {  

            },
            contentType: false,
            processData:false,
            success: function(data)
            {  
              AlertMessage("Updated Successfully!");                         
            },
            error: function() 
            {
              AlertMessage("Updated Successfully!");
            }           
           });
        }));
      });

      $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'jpc_changepassword.php' ;
        $("#jpc_formchangepassword").action = jpc_server ;
        $("#jpc_formchangepassword").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: jpc_server,
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(data)
            {  

            },
            contentType: false,
            processData:false,
            success: function(data)
            {  
              AlertMessage("Updated Successfully!");                         
            },
            error: function() 
            {
              AlertMessage("Updated Successfully!");
            }             
           });
        }));
      });

      $("#jpc_addnewwithdrawalpayoutbutton").click(function() { MainAddNewWithdrawalPayout(); });
      function MainAddNewWithdrawalPayout() {
        var addnewwithdrawalpayoutexternalwalletmaintainingbalance = parseFloat("<?php echo $externalwalletmaintainingbalance ; ?>") ;
        var addnewwithdrawalpayoutexternalwalletbalance = parseFloat("<?php echo $externalwalletbalance ; ?>") ;
        var maintainingbalance = parseFloat(addnewwithdrawalpayoutexternalwalletbalance) - parseFloat(addnewwithdrawalpayoutexternalwalletmaintainingbalance) ;
        var addnewwithdrawalpayoutmemberid = "<?php echo $memberid ; ?>" ;
        var addnewwithdrawalpayout_payout = parseFloat($("#jpc_addnewwithdrawalpayout_payout").val()) ;
        var addnewwithdrawalpayout_reason = $("#jpc_addnewwithdrawalpayout_reason").val() ;
        var addnewwithdrawalpayout_transferid = $("#jpc_addnewwithdrawalpayout_transferid").val() ; 

        $(function () { $('#jpc_AddNewWithdrawalPayout').modal('toggle'); });

        if (addnewwithdrawalpayout_transferid!="") {
          addnewwithdrawalpayout_reason = addnewwithdrawalpayout_reason + " Transfer Amount of " + addnewwithdrawalpayout_payout + " to " + addnewwithdrawalpayout_transferid ;
        } else {
          addnewwithdrawalpayout_transferid = addnewwithdrawalpayoutmemberid ;
        }

        if (addnewwithdrawalpayout_payout=="" || addnewwithdrawalpayout_payout==0) {
           AlertMessage("Please fill-in: Amount of Payout to be withdrawn");
        } else {
          if (maintainingbalance < addnewwithdrawalpayout_payout) {
            AlertMessage("Not enough external wallet balance or <br>you exceed the maximum balance limit!");
          } else {
              AlertMessage("Added Successfully!");
              setTimeout(function() {
              document.location.href = vrjpcValidationSettings_Server + 'jpc_addwithdrawalpayout.php?jpc_addnewwithdrawalpayoutmemberid=' + addnewwithdrawalpayoutmemberid + '&jpc_addnewwithdrawalpayouttotalpayout=' + maintainingbalance + '&jpc_addnewwithdrawalpayout_payout=' + addnewwithdrawalpayout_payout + '&jpc_addnewwithdrawalpayout_reason=' + addnewwithdrawalpayout_reason + '&jpc_addnewwithdrawalpayout_transferid=' + addnewwithdrawalpayout_transferid ;         
              }, 1000);
          }
        }
      }
      
     $('#jpc_CopyReferralLink').click( function() {
       var clipboardText = "";
       clipboardText = $('#jpc_referrallink').val();
       copyToClipboard( clipboardText );
       AlertMessage( "Copied to Clipboard" );
     });

    function copyToClipboard(text) {
      var textArea = document.createElement("textarea");
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      try {
        var successful = document.execCommand( 'copy' );
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Copying text command was ' + msg);
      } catch (err) {
        console.log('Oops, unable to copy');
      }
      document.body.removeChild(textArea);
    }

    function LoadLogout() {
      setTimeout(function() {document.location.href = 'index.php'}, 1000);
    }

    function AlertMessage(xMessage) {
      $('#jpc_alertmessage').html(xMessage);
      $('#jpc_Alert').modal('show');
    } 
       
</script>

</body>
</html>
<?php ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res); ?>