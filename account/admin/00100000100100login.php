<?php
  include "../include/jpc_common.php" ;
  //date_default_timezone_set('Asia/Hong_Kong');
  date_default_timezone_set('Asia/Manila');
  
  ob_start();
  @session_start();
  $_SESSION['jpcvar_codered'] = "11111001010100111";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JP Colecciones  | Investment MLM System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="author" content="Walter Aquino Narvasa">  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="../images/jpc_logo.png" width="70" height="40"></span>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><a href="https://www.jpcolecciones.com/"><img src="../images/newlogo.png" alt="" width="150" height="150"></a></center><br>
    <p class="login-box-msg"><strong>JP Colecciones Administrator Login</strong></p>
      <div class="form-group has-feedback">
        <input type="text" id="jpc_username" name="jpc_username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="jpc_password" name="jpc_password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <div id="jpc_signinbutton"><button class="btn btn-primary btn-block btn-flat">Sign In</button></div>
        </div>
        <!-- /.col -->
      </div>

      <br><a href="https://www.jpcolecciones.com/">Back to Main Site..</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  var vrjpcValidationSettings_Server = '<?php echo $serverdirectory ; ?>' ;
  localStorage.setItem('lsjpcValidationSettings_Server', vrjpcValidationSettings_Server);
  
  $("#jpc_signinbutton").click(function() { SystemSignIn(); });

  function SystemSignIn() {
    var vrjpcValidationSettings_Server = localStorage.getItem("lsjpcValidationSettings_Server");
    var inputjpc_username = $("#jpc_username").val() ;
    var inputjpc_password = $("#jpc_password").val() ;

    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'authentication/jpc_verification2.php?i_username=' + inputjpc_username + '&i_password=' + inputjpc_password  
    }, 1000);
  }
</script>
</body>
</html>
