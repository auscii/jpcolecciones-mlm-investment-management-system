<?php

  include "include/jpc_common.php" ;
  //date_default_timezone_set('Asia/Hong_Kong');
  date_default_timezone_set('Asia/Manila');
  
  ob_start();
  @session_start();

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
  $_SESSION['jpcvar_created'] = "" ;
  $_SESSION['jpcvar_code'] = "00001000000101001";

  $jpc_mainlink = "jpc_main.php" ;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>jpc | Investment MLM System<</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="images/jpc_logo.png" width="70" height="40"></span>
  </div>

  <div class="register-box-body">
    <h4>Terms and Condition</h4>
    <p>
      Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern jpc.biz’s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.
    </p>
    <p>The term ‘jpc.biz or ‘us’ or ‘we’ refers to the owner of the website. The term ‘you’ refers to the user or viewer of our website.
    </p>
    <p>The use of this website is subject to the following terms of use:</p>
    <p>The content of the pages of this website is for your general information and use only. It is subject to change without notice.
    </p>
    <p>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
    Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
    </p>
    <p>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.
    </p>
    <p>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).
Your use of this website and any dispute arising out of such use of the website is subject to the laws of The Belgium.</p>
    </p>
    <a href="<?php echo $jpc_mainlink ; ?>" class="text-center">I already read the terms and condition</a>
  </div>
  <!-- /.form-box -->
  </form>
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
