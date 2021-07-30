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

  $jpc_postlink = "jpc_captcha3.php" ;
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
  <div class="register-logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="images/jpc_logo.png" width="70" height="40"></span>
  </div>

  <div class="register-box-body">
    <center><img src="images/newlogo.png" alt="" width="150" height="150"></center><br>
    <form id="jpc_formforgotpassword" class="form-horizontal" action="<?php echo $jpc_postlink ; ?>" method="post">
    <p class="login-box-msg">Forgot password</p>
      <div class="form-group has-feedback">
        <input type="email" id="jpc_email" name="jpc_email" class="form-control" placeholder="Type your Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.col -->
      </div>
      <center>
        <!-- /.col -->
        <?php
        require_once 'securimage/securimage.php';
          echo Securimage::getCaptchaHtml();
        ?>
        </center>
      <a href="<?php echo $jpc_mainlink ; ?>" class="text-center">I changed my mind. I remembered my password.</a>
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

  function AlertMessage(xMessage) {
      $('#jpc_alertmessage').html(xMessage);
      $('#jpc_Alert').modal('show');
  } 
</script>
</body>
</html>
