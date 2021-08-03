<?php
  //date_default_timezone_set('Asia/Hong_Kong');
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

  $currencysettings_id = 0 ;
  $currencysettings_currencyvalue = "" ;
  $currencysettings_currencyprefix = "" ;
  $currencysettings_currencysymbol = "" ;
  $currencysettings_specialbonusmonth = 0 ;
  $externalwalletmaintainingbalance = "" ;
  $setannouncements_announcements = "" ;
  $setemailvideo_link = "" ;
  $setemailvideo_message = "" ;
  $sqlcurrencysettings = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_settings LIMIT 1");
  while ($rows=mysqli_fetch_array($sqlcurrencysettings)) {
  	$currencysettings_id = $rows['i_id'] ;
    $currencysettings_currencyvalue = $rows['i_currencyvalue'] ;
    $currencysettings_currencyprefix = $rows['i_currencyprefix'] ;
    $currencysettings_currencyprefix = strtoupper($currencysettings_currencyprefix);
    $currencysettings_currencysymbol = $rows['i_currencysymbol'] ;
    $currencysettings_specialbonusmonth = $rows['i_specialbonusmonth'] ;
    $externalwalletmaintainingbalance = $rows['i_externalwalletmaintainingbalance'] ;
    $setannouncements_announcements = $rows['i_announcements'] ;
    $setemailvideo_link = $rows['i_emailvideolink'] ;
    $setemailvideo_message = $rows['i_emailvideomessage'] ;
  }

  $commissionrates_membershipplan = "" ;
  $sqlcommissionrates = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_commissionrates ORDER BY i_membershipplan");
  while ($rows=mysqli_fetch_array($sqlcommissionrates)) {
    $commissionrates_id = $rows['i_id'] ;
    $commissionrates_membershipplan = $rows['i_membershipplan'] ;

    if ($commissionrates_id==0) {
      $package1 = $commissionrates_membershipplan ;
      $package1totalmembers = 0 ;
      $sqlp1total = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS package1totalmembers FROM jpc_members WHERE i_membershipplan = '$package1'");
      while ($rows=mysqli_fetch_array($sqlp1total)) {
        $package1totalmembers = $rows['package1totalmembers'] ;
      }
    } else if ($commissionrates_id==1)  {
      $package2 = $commissionrates_membershipplan ;
      $package2totalmembers = 0 ;
      $sqlp2total = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS package2totalmembers FROM jpc_members WHERE i_membershipplan = '$package2'");
      while ($rows=mysqli_fetch_array($sqlp2total)) {
        $package2totalmembers = $rows['package2totalmembers'] ;
      }
    } else if ($commissionrates_id==2)  {
      $package3 = $commissionrates_membershipplan ;
      $package3totalmembers = 0 ;
      $sqlp3total = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS package3totalmembers FROM jpc_members WHERE i_membershipplan = '$package3'");
      while ($rows=mysqli_fetch_array($sqlp3total)) {
        $package3totalmembers = $rows['package3totalmembers'] ;
      }
    } else if ($commissionrates_id==3)  {
      $package4 = $commissionrates_membershipplan ;
      $package4totalmembers = 0 ;
      $sqlp4total = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS package4totalmembers FROM jpc_members WHERE i_membershipplan = '$package4'");
      while ($rows=mysqli_fetch_array($sqlp4total)) {
        $package4totalmembers = $rows['package4totalmembers'] ;
      }
    } else if ($commissionrates_id==4)  {
      $package5 = $commissionrates_membershipplan ;
      $package5totalmembers = 0 ;
      $sqlp5total = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS package5totalmembers FROM jpc_members WHERE i_membershipplan = '$package5'");
      while ($rows=mysqli_fetch_array($sqlp5total)) {
        $package5totalmembers = $rows['package5totalmembers'] ;
      }
    }
  }

  if (isset($_GET["jpc_searchmember"])) {
    $jpc_searchmember = $_GET['jpc_searchmember'];
  } else {
    $jpc_searchmember = "";
  }

  $limit = 5;
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  $start_from = ($page-1) * $limit;
  if ($jpc_searchmember=="") {
    $sqlactivatemembers = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members
     ORDER BY i_id ASC LIMIT $start_from, $limit");
  } else {
    $sqlactivatemembers = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members
     WHERE concat(i_firstname,' ',i_middlename,' ',i_lastname) LIKE '%$jpc_searchmember%'
     ORDER BY i_id ASC LIMIT $start_from, $limit");
  }
  $sqltotalactivatemembers = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS totalactivemembers FROM jpc_members WHERE i_isactive=8 AND i_membershipplan<>'Referral Bonus For Package 4' ");
  while ($rows=mysqli_fetch_array($sqltotalactivatemembers)) {
    $totalactivemembers = $rows["totalactivemembers"] ;
  }
  $sqltotalinactivatemembers = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS totalinactivemembers FROM jpc_members WHERE i_isactive<>8 AND i_membershipplan<>'Referral Bonus For Package 4' ");
  while ($rows=mysqli_fetch_array($sqltotalinactivatemembers)) {
    $totalinactivemembers = $rows["totalinactivemembers"] ;
  }

  $jpc_filtermembername = "";
  $jpc_membershipplan = "";
  if (isset($_GET["jpc_filtermembergeneaology"])) {
    $jpc_filtermembergeneaology = $_GET['jpc_filtermembergeneaology'];
    $sqlfiltermember= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT concat(i_firstname,' ',i_middlename,' ',i_lastname) AS membername, i_membershipplan AS membershipplan FROM jpc_members WHERE i_memberid = '$jpc_filtermembergeneaology' ");
    while ($rows=mysqli_fetch_array($sqlfiltermember)) {
      $jpc_filtermembername = $rows['membername'] ;
      $jpc_membershipplan = $rows['membershipplan'] ;
    }

  } else {
    $jpc_filtermembergeneaology = "";
  }

  if (isset($_GET["startmodule"])) {
    $jpc_startmodule = $_GET['startmodule'];
  } else {
    $jpc_startmodule = "";
  }

  if ($jpc_filtermembergeneaology=="") {
    $limit2 = 5;
    if (isset($_GET["page2"])) { $page2  = $_GET["page2"]; } else { $page2=1; };
    $start_from2 = ($page2-1) * $limit2;
    $sqlviewallgeneaology = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_email, t1.i_password, t1.i_firstname, t1.i_lastname, t1.i_middlename, t1.i_memberid, t1.i_sponsorid, t1.i_placementid, t1.i_membershipplan, t1.i_investmentamount, t1.i_personalwalletbalance, t1.i_externalwalletbalance, t1.i_stockbonus, t1.i_specialbonus, t1.i_withdrawamount, t1.i_commission, t1.i_isactive, t1.i_thumbnailphoto, t1.i_profilephoto, t2.i_id AS transactionid, t2.i_id, t2.i_uplineid, t2.i_sponsorid, t2.i_level, t2.i_commission, t2.i_paidstatus, t2.i_created AS join_date, t2.i_updated AS last_login, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS uplinename
      FROM jpc_members AS t1
      INNER JOIN jpc_geneaology2 AS t2
      ON t1.i_memberid = t2.i_sponsorid
      INNER JOIN jpc_members AS t3
      ON t2.i_uplineid = t3.i_memberid
      ORDER BY t2.i_level, t2.i_id
      ASC LIMIT $start_from2, $limit2");
  } else {
    $limit2 = 5;
    if (isset($_GET["page2"])) { $page2  = $_GET["page2"]; } else { $page2=1; };
    $start_from2 = ($page2-1) * $limit2;
    $sqlviewallgeneaology = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_email, t1.i_password, t1.i_firstname, t1.i_lastname, t1.i_middlename, t1.i_memberid, t1.i_sponsorid, t1.i_placementid, t1.i_membershipplan, t1.i_investmentamount, t1.i_personalwalletbalance, t1.i_externalwalletbalance, t1.i_stockbonus, t1.i_specialbonus, t1.i_withdrawamount, t1.i_commission, t1.i_isactive, t1.i_thumbnailphoto, t1.i_profilephoto, t2.i_id AS transactionid, t2.i_id, t2.i_uplineid, t2.i_sponsorid, t2.i_level, t2.i_commission, t2.i_paidstatus, t2.i_created AS join_date, t2.i_updated AS last_login, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS uplinename
    FROM jpc_members AS t1
    INNER JOIN jpc_geneaology2 AS t2
    ON t1.i_memberid = t2.i_sponsorid
    INNER JOIN jpc_members AS t3
    ON t2.i_uplineid = t3.i_memberid
    WHERE  t2.i_memberid='$jpc_filtermembergeneaology'
    ORDER BY t2.i_level, t2.i_id
    ASC LIMIT $start_from2, $limit2");
  }

  $limit3 = 5;
  if (isset($_GET["page3"])) { $page3  = $_GET["page3"]; } else { $page3=1; };
  $start_from3 = ($page3-1) * $limit3;
  $sqlwithdrawalpayout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT t1.i_id, t1.i_memberid, t1.i_transferid, t1.i_totalpayout, t1.i_userpayout, t1.i_reason, t1.i_commission, t1.i_penalty, t1.i_date, t1.i_status,
    t2.i_thumbnailphoto, t2.i_profilephoto, t2.i_invoicephoto, t2.i_isactive, t2.i_bankname, t2.i_bankaccountnumber, t2.i_bankaccountname, t2.i_memberid AS memberid, concat(t2.i_firstname,' ', t2.i_middlename,' ', t2.i_lastname) AS membername, t2.i_externalwalletbalance-$externalwalletmaintainingbalance AS withdrawablebalance, t3.i_memberid AS transferid, concat(t3.i_firstname,' ', t3.i_middlename,' ', t3.i_lastname) AS transfername
      FROM jpc_withdrawalpayout AS t1
      INNER JOIN jpc_members AS t2
      ON t1.i_memberid = t2.i_memberid
      INNER JOIN jpc_members AS t3
      ON t1.i_transferid = t3.i_memberid
      WHERE t1.i_status=0
      ORDER BY t1.i_date, t1.i_id
      ASC LIMIT $start_from3, $limit3");


  $sqltotals = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(i_investmentamount) AS totalinvestment,
                                                                SUM(i_personalwalletbalance) AS totalpersonalwalletbalance,
                                                                SUM(i_externalwalletbalance) AS totalexternalwalletbalance,
                                                                SUM(i_stockbonus) AS totalstockbonus,
                                                                COUNT(i_id) AS totalmembers FROM jpc_members WHERE i_isactive=8 AND i_membershipplan<>'Referral Bonus For Package 4' LIMIT 1");
  while ($rows=mysqli_fetch_array($sqltotals)) {
    $jpc_totalinvestment = $rows['totalinvestment'] ;
    $jpc_totalpersonalwalletbalance = $rows['totalpersonalwalletbalance'] ;
    $jpc_totalexternalwalletbalance = $rows['totalexternalwalletbalance'] ;
    $jpc_totalstockbonus = $rows['totalstockbonus'] ;
    $jpc_totalmembers = $rows['totalmembers'] ;
  }

  $limit4 = 5;
  if (isset($_GET["page4"])) { $page4  = $_GET["page4"]; } else { $page4=1; };
  $start_from4 = ($page4-1) * $limit4;
  $sqltransferfunds = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members
                                                                WHERE i_personalwalletbalance>99 AND i_isactive=8
                                                                ORDER BY i_personalwalletbalance, i_lastname
                                                                ASC LIMIT $start_from4, $limit4");
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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
      <span class="logo-lg"><img src="../images/newlogo.png" width="40" height="40"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" id="jpc_searchmember" name="jpc_searchmember" class="form-control" placeholder="Search Member...">
          <span class="input-group-btn">
                <button name="search-btn" id="search-btn" class="btn btn-flat" onclick="SearchMemberNow();"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="#" onclick="LoadDashboard();">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadActivateMembers();">
            <i class="fa fa-check-square-o"></i>
            <span>Member Activation</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadMemberGeneaology();">
            <i class="fa fa-sitemap"></i> <span>Member Wallet Genealogy</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadPayoutApproval();">
            <i class="fa fa-credit-card"></i> <span>Payout Withdrawal Approval</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadSendPackageFunds();">
            <i class="fa fa-money"></i> <span>Send Package Funds</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadTransferFunds();">
            <i class="fa fa-refresh"></i> <span>Transfer Funds</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadCommissionRates();">
            <i class="fa fa-calculator"></i> <span>Commission Rates</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadCurrencySettings();">
            <i class="fa fa-euro"></i> <span>Currency Settings</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadSetAnnouncements();">
            <i class="fa fa-commenting-o"></i> <span>Set Announcements</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadSetEmailVideo();">
            <i class="fa fa-video-camera"></i> <span>Set Email Video</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadMessageMembers();">
            <i class="fa fa-comments-o"></i> <span>Message Members</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#" onclick="LoadChangeAdminPassword();">
            <i class="fa fa-unlock-alt"></i>
            <span>Change Admin password</span>
          </a>
        </li>

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
        Administrator Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" onclick="LoadDashboard();"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Administrator Dashboard</li>
        <li><span id="jpc_AdministratorDashboard"></span></li>
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

      <div id="jpc_DashboardWidget" name="jpc_DashboardWidget" class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Investments</span>
              <span class="info-box-number"><?php echo $jpc_totalinvestment . " (" . $currencysettings_currencyprefix ; ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-euro"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Stock <br>Wallet</span>
              <span class="info-box-number"><?php echo $jpc_totalpersonalwalletbalance . " (" . $currencysettings_currencyprefix ; ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-euro"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total External <br>Wallet</span>
              <span class="info-box-number"><?php echo $jpc_totalexternalwalletbalance . " (" . $currencysettings_currencyprefix ; ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Members</span>
              <span class="info-box-number"><?php echo $jpc_totalmembers ; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Monthly Investment Recap Report For The Year <span id="jpc_monthlyrecapyear"></span></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:250px"></canvas>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-12">
            &nbsp;&nbsp;&nbsp;<button type="button" onclick="document.location.href ='jpc_main.php'">Reload</button>
          </div>
        </div>
        <!-- /.row -->
      </div>

      <!-- Main row -->
      <div id="jpc_ActivateMembers" name="jpc_ActivateMembers" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Member Activation <strong>(Total Active Members = <font color=green><?php echo $totalactivemembers ; ?></font> Total Inactive Members = <font color=red><?php echo $totalinactivemembers ; ?></font>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table class="table">
                  <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Member ID</th>
                    <th class="text-center">Member Name</th>
                    <th class="text-center">Membership Plan</th>
                    <th class="text-center">ID (POP)</th>
                    <th class="text-center">Invoice (POP)</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $xid=1; while ($rows=mysqli_fetch_array($sqlactivatemembers)) {
                       $activatemembers_thumbnailphoto = $rows["i_thumbnailphoto"];
                      if ($activatemembers_thumbnailphoto=="") {
                        $activatemembers_thumbnailphoto = "nouser.png";
                      } else {
                        $activatemembers_thumbnailphoto = $rows["i_thumbnailphoto"];
                      }
                      $activatemembers_profilephoto = $rows["i_profilephoto"];
                      if ($activatemembers_profilephoto=="") {
                        $activatemembers_profilephoto = "noid.jpg";
                      } else {
                        $activatemembers_profilephoto = $rows["i_profilephoto"];
                      }
                      $activatemembers_invoicephoto = $rows["i_invoicephoto"];
                      if ($activatemembers_invoicephoto=="") {
                        $activatemembers_invoicephoto = "invoice.png";
                      } else {
                        $activatemembers_invoicephoto = $rows["i_invoicephoto"];
                      }
                      if ($rows["i_isactive"]==8) {
                        $activatemembers_activationstatus = '<span class="label label-success">Active</span>' ;
                      } else {
                        $activatemembers_activationstatus = '<span class="label label-danger">Inactive</span>' ;
                      }
                      $MemberInfoValue = $rows["i_id"] . "~" .
                                         $activatemembers_thumbnailphoto . "~" .
                                         $rows["i_memberid"] . "~" .
                                         $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"] . "~" .
                                         $rows["i_created"] . "~" .
                                         $activatemembers_profilephoto . "~" .
                                         $activatemembers_invoicephoto . "~" .
                                         $rows["i_isactive"]  ;
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $xid ?></td>
                      <td class="text-center"><img src="<?php echo '../images/photos/' . $activatemembers_thumbnailphoto ; ?>" width="60px" height="60px" class="img-circle" alt="Member Photo"></td>
                      <td class="text-center"><?php echo $rows["i_memberid"]; ?></td>
                      <td class="text-center"><?php echo $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"]; ?></td>
                      <td class="text-center"><?php echo $rows["i_membershipplan"]; ?></td>
                      <td class="text-center"><img src="<?php echo '../images/photos/' . $activatemembers_profilephoto ; ?>" width="60px" height="60px" class="img-circle" alt="ID Proof of Payment"></td>
                      <td class="text-center"><img src="<?php echo '../images/photos/' . $activatemembers_invoicephoto ; ?>" width="60px" height="60px" class="img-circle" alt="Invoice Proof of Payment"></td>
                      <td class="text-center"><?php echo $activatemembers_activationstatus ?></td>
                      <td class="text-center"><button type="button" class="btn btn-info showActivateMembers" data-toggle="modal" data-target="#jpc_ActivateMembersConfirmation" data-activatemembers="<?php echo $MemberInfoValue ; ?>"><i class="fa fa-check-square"></i> Activate
                      </button></td>
                      <td><button type="button" class="btn btn-danger showDeleteMember" data-toggle="modal" data-target="#jpc_DeleteMemberConfirmation" data-deletemember="<?php echo $MemberInfoValue ; ?>"><i class="fa fa-trash"></i> Delete</button></td>
                    </tr>
                  <?php $xid++; }; ?>
                  </tbody>
                </table>
                <?php
                  if ($jpc_searchmember=="") {
                    $sqlpagination = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) FROM jpc_members");
                  } else {
                    $sqlpagination = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) FROM jpc_members WHERE concat(i_firstname,' ',i_middlename,' ',i_lastname) LIKE '%$jpc_searchmember%'");
                  }

                  $row=mysqli_fetch_row($sqlpagination);
                  $total_records = $row[0];
                  $total_pages = ceil($total_records / $limit);
                  $pagLink = "<nav><ul class='pagination'>";
                  for ($i=1; $i<=$total_pages; $i++) {
                    $pagLink .= "<li><a href='jpc_main.php?startmodule=" . 'activatemember' . "&page=".$i."'>".$i."</a></li>";
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
       <!-- /.row (main row) -->
       
      <div class="modal modal-success fade" id="jpc_ActivateMembersConfirmation" name="jpc_ActivateMembersConfirmation">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Member Activation</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td>
                            <input type="hidden" id="jpc_activatemembers_id" name="jpc_activatemembers_id">
                            <img src="" id="jpc_activatemembers_profilephoto" name="jpc_activatemembers_profilephoto" width="160px" height="160px" class="img-circle" alt="Member Photo"><br><br>
                            <div id="jpc_activatemembers_memberid" name="jpc_activatemembers_memberid"></div>
                            <div id="jpc_activatemembers_membername" name="jpc_activatemembers_membername"></div>
                            <div id="jpc_activatemembers_created" name="jpc_activatemembers_created"></div>
                            <div id="jpc_activatemembers_activationstatus" name="jpc_activatemembers_activationstatus"></div>
                          </td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>
                            <img src="" id="jpc_activatemembers_idphoto" name="jpc_activatemembers_idphoto" width="380px" height="200px" alt="ID Photo"><p>ID Proof of Payment Note: Right-Click then "Save image as"</p>
                            <img src="" id="jpc_activatemembers_invoicephoto" name="jpc_activatemembers_invoicephoto" width="380px" height="200px" alt="Invoice Photo"><p>Invoice Proof of Payment Note: Right-Click then "Save image as"</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                  <table border=0 align="center">
                    <tr>
                      <td><div id="jpc_activatemembersbutton"><button type="button" class="btn btn-outline pull-left">Activate</button></div></td>
                      <td>&nbsp;&nbsp;</td>
                      <td><div id="jpc_deactivatemembersbutton"><button type="button" class="btn btn-outline pull-left">Deactivate</button></div></td>
                      <td>&nbsp;&nbsp;</td>
                      <td><button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button></td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
      </div>

      <div class="modal modal-danger fade" id="jpc_DeleteMemberConfirmation" name="jpc_DeleteMemberConfirmation">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Are you sure you want to Delete this user - <span id="member_name"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group text-center">
                    <button type="button" class="btn btn-outline" id="jpc_deletememberbutton"><i class="fa fa-check-circle"></i> Yes</button> &nbsp;
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                  </div>
                </div>
            </div>
          </div>
      </div>

      <!-- Main row -->
      <div id="jpc_MemberGeneaology" name="jpc_MemberGeneaology" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Member Wallet Genealogy <span id="jpc_MemberGenealogyHistoryFilteredMember"></span></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <div class="form-group">
                  <label for="jpc_viewallgeneaology_memberid" class="col-sm-2 control-label">Filter Member (Active)</label>
                  <div class="col-sm-10">
                    <input type="text" id="jpc_viewallgeneaology_memberid" name="jpc_viewallgeneaology_memberid" class="form-control" list="jpc_viewallgeneaology_list" >
                     <datalist id="jpc_viewallgeneaology_list">
                      <?php
                        $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT i_memberid, concat(i_firstname,' ',i_middlename,' ',i_lastname) AS i_membername, i_membershipplan FROM jpc_members WHERE i_isactive=8 ORDER BY i_membername");
                        while ($rows=mysqli_fetch_array($sql)) {
                          echo "<option value='" . $rows['i_memberid'] . "'>" . $rows['i_membername'] . " (" . $rows['i_membershipplan'] . ") </option>";
                        }
                     ?>
                    </datalist>
                    <script type="text/javascript">
                      var filtermembergeneaology = "<?php echo $jpc_filtermembergeneaology ; ?>" ;
                      var filtermembername = "<?php echo $jpc_filtermembername ; ?>" ;
                      var filtermembershipplan = "<?php echo $jpc_membershipplan ; ?>" ;
                      document.getElementById("jpc_viewallgeneaology_memberid").value = filtermembergeneaology ;
                      if (filtermembergeneaology!="") {
                        document.getElementById("jpc_MemberGenealogyHistoryFilteredMember").innerHTML = 'filtered by "<strong><font color=green>' + filtermembername + '</font> (' + filtermembergeneaology + ') <font color=green>' + filtermembershipplan + '</font></strong>"' ;
                      }
                    </script>
                     <div class="box-footer">
                        <table border=0>
                          <tr>
                            <td><button class="btn btn-info pull-right" onclick="FilterMemberGeneaology();">Filter Member</button></td>
                          </tr>
                        </table>
                    </div>
                  </div>
                </div>
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Join <br>Date/Time</th>
                    <th class="text-center">Member <br>Name</th>
                    <th class="text-center">Member ID</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Upline <br>Name</th>
                    <th class="text-center">Upline <br>ID</th>
                    <th class="text-center">Pay <br>Amount (<?php echo $currencysettings_currencyprefix ; ?>)</th>
                    <th class="text-center">Commission <br>Amount (<?php echo $currencysettings_currencyprefix ; ?>)</th>
                    <th class="text-center">Processing<br>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($rows=mysqli_fetch_array($sqlviewallgeneaology)) { ?>
                    <tr>
                      <td><?php echo $rows["i_id"]; ?></td>
                      <td><?php echo $rows["join_date"]; ?></td>
                      <td><?php echo $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"] ; ?></td>
                      <td><?php echo $rows["i_memberid"]; ?></td>
                      <td><?php echo $rows["i_level"]; ?></td>
                      <td><?php echo $rows["uplinename"] ; ?></td>
                      <td><?php echo $rows["i_uplineid"] ; ?></td>
                      <td><?php echo $rows["i_investmentamount"]; ?></td>
                      <td><?php echo $rows["i_commission"]; ?></td>
                      <td><?php
                            if ($rows["i_paidstatus"]==0) {
                              $paidstatus = "Pending" ;
                            } else {
                              $paidstatus = "Processed" ;
                            }
                           echo $paidstatus ?></td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
                <?php
                  if ($jpc_filtermembergeneaology=="") {
                    $sqlpagination2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id)
                                                FROM jpc_members AS t1
                                                INNER JOIN jpc_geneaology2 AS t2
                                                ON t1.i_memberid = t2.i_sponsorid");
                    $sqlpagination2totalpending = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id) AS totalpending,
                    SUM(t2.i_commission) AS totalpendingcommission
                    FROM jpc_members AS t1
                    INNER JOIN jpc_geneaology2 AS t2
                    ON t1.i_memberid = t2.i_sponsorid
                    WHERE i_paidstatus<>8");
                    while ($rows=mysqli_fetch_array($sqlpagination2totalpending)) {
                      $totalpending = $rows["totalpending"] ;
                      $totalpendingcommission = $rows["totalpendingcommission"] ;
                    }
                    $sqlpagination2totalprocessed = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id) AS totalprocessed,
                    SUM(t2.i_commission) AS totalprocessedcommission
                    FROM jpc_members AS t1
                    INNER JOIN jpc_geneaology2 AS t2
                    ON t1.i_memberid = t2.i_sponsorid
                    WHERE i_paidstatus=8");
                    while ($rows=mysqli_fetch_array($sqlpagination2totalprocessed)) {
                      $totalprocessed = $rows["totalprocessed"] ;
                      $totalprocessedcommission = $rows["totalprocessedcommission"] ;
                    }
                  } else {
                    $sqlpagination2 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id)
                                                FROM jpc_members AS t1
                                                INNER JOIN jpc_geneaology2 AS t2
                                                ON t1.i_memberid = t2.i_sponsorid
                                                WHERE  t2.i_memberid='$jpc_filtermembergeneaology'");
                    $sqlpagination2totalpending = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id) AS totalpending,
                    SUM(t2.i_commission) AS totalpendingcommission
                    FROM jpc_members AS t1
                    INNER JOIN jpc_geneaology2 AS t2
                    ON t1.i_memberid = t2.i_sponsorid
                    WHERE  t2.i_memberid='$jpc_filtermembergeneaology' AND i_paidstatus<>8");
                    while ($rows=mysqli_fetch_array($sqlpagination2totalpending)) {
                      $totalpending = $rows["totalpending"] ;
                      $totalpendingcommission = $rows["totalpendingcommission"] ;
                    }
                    $sqlpagination2totalprocessed = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(t2.i_id) AS totalprocessed,
                    SUM(t2.i_commission) AS totalprocessedcommission
                    FROM jpc_members AS t1
                    INNER JOIN jpc_geneaology2 AS t2
                    ON t1.i_memberid = t2.i_sponsorid
                    WHERE  t2.i_memberid='$jpc_filtermembergeneaology' AND i_paidstatus=8");
                    while ($rows=mysqli_fetch_array($sqlpagination2totalprocessed)) {
                      $totalprocessed = $rows["totalprocessed"] ;
                      $totalprocessedcommission = $rows["totalprocessedcommission"] ;
                    }
                  }
                  $row=mysqli_fetch_row($sqlpagination2);
                  $total_records2 = $row[0];
                  $total_pages2 = ceil($total_records2 / $limit2);
                  $pagLink2 = "<nav><ul class='pagination'>";
                  for ($i=1; $i<=$total_pages2; $i++) {
                    $pagLink2 .= "<li><a href='jpc_main.php?startmodule=" . 'viewallgeneaology' . "&page2=".$i."&jpc_filtermembergeneaology=".$jpc_filtermembergeneaology."'>".$i."</a></li>";
                  };
                  echo $pagLink2 . "</ul></nav>";

                  if ($jpc_filtermembergeneaology!="") {
                    $sqlmemberwalletprocessing = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jpc_members WHERE i_memberid = '$jpc_filtermembergeneaology'");
                    while ($rows=mysqli_fetch_array($sqlmemberwalletprocessing)) {
                      $memberwalletprocessing_thumbnailphoto = $rows["i_thumbnailphoto"];
                      if ($memberwalletprocessing_thumbnailphoto=="") {
                        $memberwalletprocessing_thumbnailphoto = "noid.jpg";
                      } else {
                        $memberwalletprocessing_thumbnailphoto = $rows["i_thumbnailphoto"];
                      }
                      $memberwalletprocessing_profilephoto = $rows["i_profilephoto"];
                      if ($memberwalletprocessing_profilephoto=="") {
                        $memberwalletprocessing_profilephoto = "nouser.png";
                      } else {
                        $memberwalletprocessing_profilephoto = $rows["i_profilephoto"];
                      }
                      $memberwalletprocessing_invoicephoto = $rows["i_invoicephoto"];
                      if ($memberwalletprocessing_invoicephoto=="") {
                        $memberwalletprocessing_invoicephoto = "invoice.png";
                      } else {
                        $memberwalletprocessing_invoicephoto = $rows["i_invoicephoto"];
                      }
                      if ($rows["i_isactive"]==8) {
                        $memberwalletprocessing_activationstatus = '<span class="label label-success">Active</span>' ;
                      } else {
                        $memberwalletprocessing_activationstatus = '<span class="label label-danger">Inactive</span>' ;
                      }
                      $MemberWalletInfoValue = $rows["i_id"] . "~" .
                                         $memberwalletprocessing_thumbnailphoto . "~" .
                                         $rows["i_memberid"] . "~" .
                                         $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"] . "~" .
                                         $rows["i_created"] . "~" .
                                         $memberwalletprocessing_profilephoto . "~" .
                                         $memberwalletprocessing_invoicephoto . "~" .
                                         $rows["i_isactive"] . "~" .
                                         $rows["i_bankname"] . "~" .
                                         $rows["i_bankaccountnumber"] . "~" .
                                         $rows["i_bankaccountname"] ;

                    }
                  }

                ?>
              </div>
              <!-- /.table-responsive -->
              <div class="box-footer">
                  <table border=0>
                    <tr>
                      <td><strong>Total Pending = <font color=red><?php echo $totalpending ; ?></font> (<?php echo $totalpendingcommission . " " . $currencysettings_currencyprefix ;?>) Total Processed = <font color=green><?php echo $totalprocessed ; ?></font> (<?php echo $totalprocessedcommission . " " . $currencysettings_currencyprefix ;?>)</strong></td>
                      <td>&nbsp;&nbsp;</td>
                      <td><button type="button" class="btn btn-info pull-right showMemberWalletProcessing" data-toggle="modal" data-target="#jpc_MemberWalletProcessing" data-processmemberwallet="<?php echo $MemberWalletInfoValue ; ?>">
                        Process Member <?php echo $jpc_filtermembername ; ?> Wallet
                  </button></td>
                    </tr>
                  </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->
      <!-- /.row (main row) -->
      <div class="modal modal-success fade" id="jpc_MemberWalletProcessing" name="jpc_MemberWalletProcessing">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Member Wallet Processing</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td>
                            <input type="hidden" id="jpc_memberwalletprocessing_id" name="jpc_memberwalletprocessing_id">
                            <input type="hidden" id="jpc_memberwalletprocessing_memberid2" name="jpc_memberwalletprocessing_memberid2">
                            <input type="hidden" id="jpc_memberwalletprocessing_activationstatus2" name="jpc_memberwalletprocessing_activationstatus2">
                            <img src="" id="jpc_memberwalletprocessing_profilephoto" name="jpc_memberwalletprocessing_profilephoto" width="160px" height="160px" class="img-circle" alt="Member Photo">
                            <div id="jpc_memberwalletprocessing_memberid" name="jpc_memberwalletprocessing_memberid"></div>
                            <div id="jpc_memberwalletprocessing_membername" name="jpc_memberwalletprocessing_membername"></div>
                            <div id="jpc_memberwalletprocessing_created" name="jpc_memberwalletprocessing_created"></div>
                            <div id="jpc_memberwalletprocessing_activationstatus" name="jpc_memberwalletprocessing_activationstatus"></div>
                            <div id="jpc_memberwalletprocessing_bankname" name="jpc_memberwalletprocessing_bankname"></div>
                            <div id="jpc_memberwalletprocessing_bankaccountnumber" name="jpc_memberwalletprocessing_bankaccountnumber"></div>
                            <div id="jpc_memberwalletprocessing_bankaccountname" name="jpc_memberwalletprocessing_bankaccountname"></div>

                          </td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>
                             <img src="" id="jpc_memberwalletprocessing_idphoto" name="jpc_memberwalletprocessing_idphoto" width="380px" height="200px" alt="ID Photo"><p>ID Proof of Payment Note: Right-Click then "Save image as"</p>
                            <img src="" id="jpc_memberwalletprocessing_invoicephoto" name="jpc_memberwalletprocessing_invoicephoto" width="380px" height="200px" alt="Invoice Photo"><p>Invoice Proof of Payment Note: Right-Click then "Save image as"</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                  <div id="jpc_memberwalletprocessingbutton"><button type="button" class="btn btn-outline pull-left">Process</button></div>
                  <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Main row -->
      <div id="jpc_PayoutApproval" name="jpc_PayoutApproval" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Payout Withdrawal Approval</h3>
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
                    <th class="text-center">No.</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Member Name/ID</th>
                    <th class="text-center">Withdrawable<br>Balance (<?php echo $currencysettings_currencyprefix ; ?>)</th>
                    <th class="text-center">Withdraw Amount (<?php echo $currencysettings_currencyprefix ; ?>)</th>
                    <th class="text-center">Reason</th>
                    <th class="text-center">Transfer Name/ID</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while ($rows=mysqli_fetch_array($sqlwithdrawalpayout)) {
                       $withdrawalpayout_thumbnail = $rows["i_thumbnailphoto"];
                      if ($withdrawalpayout_thumbnail=="") {
                        $withdrawalpayout_thumbnail = "nouser.png";
                      } else {
                        $withdrawalpayout_thumbnail = $rows["i_thumbnailphoto"];
                      }
                      $withdrawalpayout_profilephoto = $rows["i_profilephoto"];
                      if ($withdrawalpayout_profilephoto=="") {
                        $withdrawalpayout_profilephoto = "nouser.png";
                      } else {
                        $withdrawalpayout_profilephoto = $rows["i_profilephoto"];
                      }
                      $withdrawalpayout_invoicephoto = $rows["i_invoicephoto"];
                      if ($withdrawalpayout_invoicephoto=="") {
                        $withdrawalpayout_invoicephoto = "invoice.png";
                      } else {
                        $withdrawalpayout_invoicephoto = $rows["i_invoicephoto"];
                      }
                      if ($rows["i_isactive"]==8) {
                        $withdrawalpayout_activationstatus = '<span class="label label-success">Active</span>' ;
                      } else {
                        $withdrawalpayout_activationstatus = '<span class="label label-danger">Inactive</span>' ;
                      }
                      $MemberPayoutValue = $rows["i_id"] . "~" .
                                           $rows["i_memberid"] . "~" .
                                           $rows["membername"] . "~" .
                                           $rows["i_transferid"] . "~" .
                                           $rows["transfername"] . "~" .
                                           $rows["withdrawablebalance"] . "~" .
                                           $rows["i_userpayout"] . "~" .
                                           $rows["i_reason"] . "~" .
                                           $rows["i_date"] . "~" .
                                           $withdrawalpayout_thumbnail . "~" .
                                           $withdrawalpayout_profilephoto . "~" .
                                           $withdrawalpayout_invoicephoto . "~" .
                                           $rows["i_isactive"] . "~" .
                                           $rows["i_bankname"] . "~" .
                                           $rows["i_bankaccountnumber"] . "~" .
                                           $rows["i_bankaccountname"]  ;
                    ?>
                    <tr>
                      <td><?php echo $rows["i_id"]; ?></td>
                      <td><?php echo $rows["i_date"]; ?></td>
                      <td><?php echo $rows["membername"] . "<br>(". $rows["i_memberid"] . ")"; ?></td>
                      <td><?php echo $rows["withdrawablebalance"]; ?></td>
                      <td><?php echo $rows["i_userpayout"]; ?></td>
                      <td><?php echo $rows["i_reason"]; ?></td>
                      <td><?php echo $rows["transfername"] . "<br>(". $rows["i_transferid"] . ")"; ?></td>
                      <td><button type="button" class="btn btn-info showWithdrawalPayout" data-toggle="modal" data-target="#jpc_WithdrawalPayoutConfirmation" data-withdrawalpayout="<?php echo $MemberPayoutValue ; ?>">
                        Process
                      </button></td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
                <?php
                  $sqlpagination3 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id)
                                              FROM jpc_withdrawalpayout
                                              WHERE i_status=0");
                  $row=mysqli_fetch_row($sqlpagination3);
                  $total_records3 = $row[0];
                  $total_pages3 = ceil($total_records3 / $limit3);
                  $pagLink3 = "<nav><ul class='pagination'>";
                  for ($i=1; $i<=$total_pages3; $i++) {
                               $pagLink3 .= "<li><a href='jpc_main.php?startmodule=" . 'withdrawalpayout' . "&page3=".$i."'>".$i."</a></li>";
                  };
                  echo $pagLink3 . "</ul></nav>";
                  $sqlpagination3payoutwithdrawalapproval = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) AS totalpayoutwithdrawalapproval,
                                              SUM(i_userpayout) AS totalpayoutwithdrawalapprovaluserpayout
                                              FROM jpc_withdrawalpayout
                                              WHERE i_status=0");
                  while ($rows=mysqli_fetch_array($sqlpagination3payoutwithdrawalapproval)) {
                    $totalpayoutwithdrawalapprovaluserpayout = $rows["totalpayoutwithdrawalapprovaluserpayout"] ;
                    $totalpayoutwithdrawalapproval = $rows["totalpayoutwithdrawalapproval"] ;
                  }
                ?>
              </div>
              <!-- /.table-responsive -->
              <div class="box-footer">
                  <table border=0>
                    <tr>
                      <td><strong>Total Payout Withdrawal Approval = <font color=red><?php echo $totalpayoutwithdrawalapproval ; ?></font> (<?php echo $totalpayoutwithdrawalapprovaluserpayout . " " . $currencysettings_currencyprefix ;?>) </strong></td>
                    </tr>
                  </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->
         <!-- /.row (main row) -->
      <div class="modal modal-success fade" id="jpc_WithdrawalPayoutConfirmation" name="jpc_WithdrawalPayoutConfirmation">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Witdrawal Payout Confirmation</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td>
                            <small>
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_id" name="jpc_withdrawalpayoutconfirmation_id">
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_memberid2" name="jpc_withdrawalpayoutconfirmation_memberid2">
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_transferid2" name="jpc_withdrawalpayoutconfirmation_transferid2">
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_activationstatus2" name="jpc_withdrawalpayoutconfirmation_activationstatus2">
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_withdrawablebalance2" name="jpc_withdrawalpayoutconfirmation_withdrawablebalance2">
                            <input type="hidden" id="jpc_withdrawalpayoutconfirmation_userpayout2" name="jpc_withdrawalpayoutconfirmation_userpayout2">

                            <img src="" id="jpc_withdrawalpayoutconfirmation_profilephoto" name="jpc_withdrawalpayoutconfirmation_profilephoto" width="130px" height="130px" class="img-circle" alt="Member Photo">
                            <div id="jpc_withdrawalpayoutconfirmation_memberid" name="jpc_withdrawalpayoutconfirmation_memberid"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_membername" name="jpc_withdrawalpayoutconfirmation_membername"></div>

                            <div id="jpc_withdrawalpayoutconfirmation_activationstatus" name="jpc_withdrawalpayoutconfirmation_activationstatus"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_bankname" name="jpc_withdrawalpayoutconfirmation_bankname"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_bankaccountnumber" name="jpc_withdrawalpayoutconfirmation_bankaccountnumber"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_bankaccountname" name="jpc_withdrawalpayoutconfirmation_bankaccountname"></div>

                            <div id="jpc_withdrawalpayoutconfirmation_transferid" name="jpc_withdrawalpayoutconfirmation_transferid"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_transfername" name="jpc_withdrawalpayoutconfirmation_transfername"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_withdrawablebalance" name="jpc_withdrawalpayoutconfirmation_withdrawablebalance"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_userpayout" name="jpc_withdrawalpayoutconfirmation_userpayout"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_reason" name="jpc_withdrawalpayoutconfirmation_reason"></div>
                            <div id="jpc_withdrawalpayoutconfirmation_date" name="jpc_withdrawalpayoutconfirmation_date"></div>
                            </small>
                          </td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>
                            <img src="" id="jpc_withdrawalpayoutconfirmation_idphoto" name="jpc_withdrawalpayoutconfirmation_idphoto" width="380px" height="200px" alt="ID Photo"><p>Invoice ID of Payment Note: Right-Click then "Save image as"</p>
                            <img src="" id="jpc_withdrawalpayoutconfirmation_invoicephoto" name="jpc_withdrawalpayoutconfirmation_invoicephoto" width="380px" height="200px" alt="Invoice Photo"><p>Invoice Proof of Payment Note: Right-Click then "Save image as"</p>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="modal-footer">
                  <div id="jpc_withdrawalpayoutconfirmationbutton"><button type="button" class="btn btn-outline pull-left">Process</button></div>
                  <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div id="jpc_CurrencySettings" name="jpc_CurrencySettings" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Currency Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formcurrencysettings" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_currencysettings_id" name="jpc_currencysettings_id" value="<?php echo $currencysettings_id ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_currencysettings_currencyvalue" class="col-sm-2 control-label">Currency Value</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_currencysettings_currencyvalue" name="jpc_currencysettings_currencyvalue" value="<?php echo $currencysettings_currencyvalue ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_currencysettings_currencyprefix" class="col-sm-2 control-label">Currency Prefix</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_currencysettings_currencyprefix" name="jpc_currencysettings_currencyprefix" value="<?php echo $currencysettings_currencyprefix ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_currencysettings_currencysymbol" class="col-sm-2 control-label">Currency Symbol</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jpc_currencysettings_currencysymbol" name="jpc_currencysettings_currencysymbol" value="<?php echo $currencysettings_currencysymbol ; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_externalwalletmaintainingbalance" class="col-sm-2 control-label">External Wallet Maintaining Balance</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jpc_externalwalletmaintainingbalance" name="jpc_externalwalletmaintainingbalance" value="<?php echo $externalwalletmaintainingbalance ; ?>">
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

      <div id="jpc_SendPackageFunds" name="jpc_SendPackageFunds" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Send Package Funds</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formsendpackagefunds" class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                      <div class="inner">
                        <h3><?php echo $package1totalmembers ; ?></h3>
                        <p>Members Package 1</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-body"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                      <div class="inner">
                        <h3><?php echo $package2totalmembers ; ?></h3>
                        <p>Members Package 2</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-body"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3><?php echo $package3totalmembers ; ?></h3>
                        <p>Members Package 3</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-body"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                      <div class="inner">
                        <h3><?php echo $package4totalmembers ; ?></h3>
                        <p>Members Package 4</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-body"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                      <div class="inner">
                        <h3><?php echo $package5totalmembers ; ?></h3>
                        <p>Members Package 5</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-ios-body"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <div class="form-group">
                  <label for="jpc_package" class="col-sm-2 control-label">Select Package</label>
                  <div class="col-sm-10">
                    <select id="jpc_package" name="jpc_package" class="form-control">
                    <?php
                      echo "<option value='" . $package1 . "'>Package 1</option>" ;
                      echo "<option value='" . $package2 . "'>Package 2</option>" ;
                      echo "<option value='" . $package3 . "'>Package 3</option>" ;
                      echo "<option value='" . $package4 . "'>Package 4</option>" ;
                      echo "<option value='" . $package5 . "'>Package 5</option>" ;
                    ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_sendpackagefundsamount" class="col-sm-2 control-label">Amount to Send</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jpc_sendpackagefundsamount" name="jpc_sendpackagefundsamount" value="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#jpc_SendPackageFundsConfirmation">Send</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <div class="modal modal-success fade" id="jpc_SendPackageFundsConfirmation" name="jpc_SendPackageFundsConfirmation">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Send Package Confirmation</h4>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <h3>Are you sure you want to send this funds <span id="jpc_fundsamount"></span> ?</h3>
                    </div>
                </div>
                <div class="modal-footer">
                  <table border=0 align="center">
                    <tr>
                      <td><div id="jpc_sendpackagefundsbutton"><button type="button" class="btn btn-outline pull-left">Yes</button></div></td>
                      <td>&nbsp;&nbsp;</td>
                      <td><button type="button" class="btn btn-outline" data-dismiss="modal">No</button></td>
                    </tr>
                  </table>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div id="jpc_TransferFunds" name="jpc_TransferFunds" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transfer Funds <strong>(All members with stock wallet balance above 100)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Photo</th>
                      <th class="text-center">Member ID</th>
                      <th class="text-center">Member Name</th>
                      <th class="text-center">Membership Plan</th>
                      <th class="text-center">Stock Wallet Balance</th>
                      <th class="text-center">External Wallet Balance</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $xid=1; while ($rows=mysqli_fetch_array($sqltransferfunds)) {
                         $transferfunds_thumbnailphoto = $rows["i_thumbnailphoto"];
                        if ($transferfunds_thumbnailphoto=="") {
                          $transferfunds_thumbnailphoto = "nouser.png";
                        } else {
                          $transferfunds_thumbnailphoto = $rows["i_thumbnailphoto"];
                        }
                        $MemberTransferFundValue = $rows["i_id"] . "~" .
                                           $transferfunds_thumbnailphoto . "~" .
                                           $rows["i_memberid"] . "~" .
                                           $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"] . "~" .
                                           $rows["i_membershipplan"] . "~" .
                                           $rows["i_personalwalletbalance"] . "~" .
                                           $rows["i_externalwalletbalance"] ;
                      ?>
                      <tr>
                        <td><?php echo $xid ?></td>
                        <td><img src="<?php echo '../images/photos/' . $transferfunds_thumbnailphoto ; ?>" width="60px" height="60px" class="img-circle" alt="Member Photo"></td>
                        <td><?php echo $rows["i_memberid"]; ?></td>
                        <td><?php echo $rows["i_firstname"] . " " . $rows["i_middlename"] . " " . $rows["i_lastname"]; ?></td>
                        <td><?php echo $rows["i_membershipplan"]; ?></td>
                        <td><?php echo $rows["i_personalwalletbalance"]; ?></td></td>
                        <td><?php echo $rows["i_externalwalletbalance"]; ?></td></td>
                        <td><button type="button" class="btn btn-info showTransferFunds" data-toggle="modal" data-target="#jpc_ActivateTransferFundsConfirmation" data-transferfunds="<?php echo $MemberTransferFundValue ; ?>">
                          Transfer Funds
                        </button></td>
                      </tr>
                    <?php $xid++; }; ?>
                    </tbody>
                  </table>
                  <?php
                    $sqlpagination = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(i_id) FROM jpc_members WHERE i_personalwalletbalance>99 AND i_isactive=8");

                    $row=mysqli_fetch_row($sqlpagination);
                    $total_records4 = $row[0];
                    $total_pages4 = ceil($total_records4 / $limit4);
                    $pagLink4 = "<nav><ul class='pagination'>";
                    for ($i=1; $i<=$total_pages4; $i++) {
                      $pagLink4 .= "<li><a href='jpc_main.php?startmodule=" . 'transferfunds' . "&page4=".$i."'>".$i."</a></li>";
                    };
                    echo $pagLink4 . "</ul></nav>";
                  ?>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->
      <div class="modal modal-success fade" id="jpc_ActivateTransferFundsConfirmation" name="jpc_ActivateTransferFundsConfirmation">
         <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Transfer Funds Confirmation</h4>
               </div>
                 <div class="modal-body">
                   <div class="form-group">
                     <table>
                       <tr>
                         <td>
                            <img src="" id="jpc_transferfunds_profilephoto" name="jpc_transferfunds_profilephoto" width="160px" height="160px" class="img-circle" alt="Member Photo">
                         </td>
                         <td width="20px"></td>
                         <td>
                           <input type="hidden" id="jpc_transferfunds_id" name="jpc_transferfunds_id">
                           <div id="jpc_transferfunds_memberid" name="jpc_transferfunds_memberid"></div>
                           <div id="jpc_transferfunds_membername" name="jpc_transferfunds_membername"></div>
                           <div id="jpc_transferfunds_membershipplan" name="jpc_transferfunds_membershipplan"></div>
                           <div id="jpc_transferfunds_personalwalletbalance" name="jpc_transferfunds_personalwalletbalance"></div>
                           <div id="jpc_transferfunds_externalwalletbalance" name="jpc_transferfunds_externalwalletbalance"></div>
                         </td>
                         <td width="20px"></td>
                         <td>
                            Amount to Transfer:<br>
                            <input type="number" class="form-control" id="jpc_transferfunds_amount" name="jpc_transferfunds_amount" value=""><br><br><br>
                            Note: This amount will be deducted from the member stock wallet.
                         </td>
                       </tr>
                     </table>
                   </div>
               </div>
               <div class="modal-footer">
                 <table border=0 align="center">
                   <tr>
                     <td><div id="jpc_transferfundsbutton"><button type="button" class="btn btn-outline pull-left">Yes</button></div></td>
                     <td>&nbsp;&nbsp;</td>
                     <td><button type="button" class="btn btn-outline" data-dismiss="modal">No</button></td>
                   </tr>
                 </table>
               </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div id="jpc_SetAnnouncements" name="jpc_SetAnnouncements" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Set Announcements</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formsetannouncements" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_setannouncements_id" name="jpc_setannouncements_id" value="<?php echo $currencysettings_id ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_setannouncements_announcements" class="col-sm-2 control-label">Type your announcement here</label>
                  <div class="col-sm-10">
                  <textarea id="jpc_setannouncements_announcements" name="jpc_setannouncements_announcements" class="form-control" rows="3" placeholder="Set Announcements"><?php echo $setannouncements_announcements ; ?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <div id="jpc_SetEmailVideo" name="jpc_SetEmailVideo" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Set Email Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formsetemailvideo" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_setemailvideo_id" name="jpc_setemailvideo_id" value="<?php echo $currencysettings_id ; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_setemailvideo_emailvideolink" class="col-sm-2 control-label">Type your video link here</label>
                  <div class="col-sm-10">
                  <textarea id="jpc_setemailvideo_emailvideolink" name="jpc_setemailvideo_emailvideolink" class="form-control" rows="3" placeholder="Set Email Video Link"><?php echo $setemailvideo_link ; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_setemailvideo_emailvideomessage" class="col-sm-2 control-label">Type your video message  or copy and paste from youtube by selecting the video then click share and click embed</label>
                  <div class="col-sm-10">
                  <textarea id="jpc_setemailvideo_emailvideomessage" name="jpc_setemailvideo_emailvideomessage" class="form-control" rows="3" placeholder="Set Email Video Message"><?php echo $setemailvideo_message ; ?></textarea>
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

      <div id="jpc_MessageMembers" name="jpc_MessageMembers" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Message Members</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formmessagemembers" class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="jpc_messagemembers_memberid" class="col-sm-2 control-label">Select Member</label>
                  <div class="col-sm-10">
                    <input type="text" id="jpc_messagemembers_memberid" name="jpc_messagemembers_memberid" class="form-control" list="jpc_messagemembers_list" >
                     <datalist id="jpc_messagemembers_list">
                      <?php
                        $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT i_memberid, concat(i_firstname,' ',i_middlename,' ',i_lastname) AS i_membername FROM jpc_members ORDER BY i_membername");
                        while ($rows=mysqli_fetch_array($sql)) {
                          echo "<option value='" . $rows['i_memberid'] . "'>" . $rows['i_membername'] . "</option>";
                        }
                     ?>
                    </datalist>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jpc_messagemembers_message" class="col-sm-2 control-label">Type your message here</label>
                  <div class="col-sm-10">
                    <textarea id="jpc_messagemembers_message" name="jpc_messagemembers_message" class="form-control" rows="3" placeholder="Message"></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Send</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <div id="jpc_ChangeAdminPassword" name="jpc_ChangeAdminPassword" class="row" style="display: none">
        <div class="col-md-24">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="jpc_formchangepassword" class="form-horizontal" action="" method="post">
              <input type="hidden" id="jpc_changepasswordid" name="jpc_changepasswordid" value="<?php echo $currencysettings_id ; ?>">
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

      <!-- Main row -->
      <div id="jpc_CommissionRates" name="jpc_CommissionRates" class="row" style="display: none">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Commission Rates</h3>
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
                    <th class="text-center">Membership Plan</th>
                    <th class="text-center">Level 1 (%)</th>
                    <th class="text-center">Level 2 (%)</th>
                    <th class="text-center">Level 3 (%)</th>
                    <th class="text-center">Level 4 (%)</th>
                    <th class="text-center">Level 5 (%)</th>
                    <th class="text-center">Level 6 (%)</th>
                    <th class="text-center">Level 7 (%)</th>
                    <th class="text-center">Level 8 (%)</th>
                    <th class="text-center">Level 9 (%)</th>
                    <th class="text-center">Level 10 (%)</th>
                    <th class="text-center">Investment Amount</th>
                    <th class="text-center">Stock Bonus Share</th>
                    <th class="text-center">Special Bonus</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     $sqlcommissionrates = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *
                                                            FROM jpc_commissionrates
                                                            ORDER BY i_membershipplan");
                    while ($rows=mysqli_fetch_array($sqlcommissionrates)) {
                      $ComissionRatesValue = $rows["i_id"] . "~" .
                                             $rows["i_membershipplan"] . "~" .
                                             $rows["i_level1percentage"] . "~" .
                                             $rows["i_level2percentage"] . "~" .
                                             $rows["i_level3percentage"] . "~" .
                                             $rows["i_level4percentage"] . "~" .
                                             $rows["i_level5percentage"] . "~" .
                                             $rows["i_level6percentage"] . "~" .
                                             $rows["i_level7percentage"] . "~" .
                                             $rows["i_level8percentage"] . "~" .
                                             $rows["i_level9percentage"] . "~" .
                                             $rows["i_level10percentage"] . "~" .
                                             $rows["i_investmentamount"] . "~" .
                                             $rows["i_stockbonusshare"] . "~" .
                                             $rows["i_specialbonus"] ;
                    ?>
                    <tr>
                      <td><?php echo $rows["i_membershipplan"]; ?></td>
                      <td><?php echo $rows["i_level1percentage"]; ?></td>
                      <td><?php echo $rows["i_level2percentage"]; ?></td>
                      <td><?php echo $rows["i_level3percentage"]; ?></td>
                      <td><?php echo $rows["i_level4percentage"]; ?></td>
                      <td><?php echo $rows["i_level5percentage"]; ?></td>
                      <td><?php echo $rows["i_level6percentage"]; ?></td>
                      <td><?php echo $rows["i_level7percentage"]; ?></td>
                      <td><?php echo $rows["i_level8percentage"]; ?></td>
                      <td><?php echo $rows["i_level9percentage"]; ?></td>
                      <td><?php echo $rows["i_level10percentage"]; ?></td>
                      <td><?php echo $rows["i_investmentamount"]; ?></td>
                      <td><?php echo $rows["i_stockbonusshare"]; ?></td>
                      <td><?php echo $rows["i_specialbonus"]; ?></td>
                      <td><button type="button" class="btn btn-info showCommissionRates" data-commissionrates="<?php echo $ComissionRatesValue ; ?>"  data-toggle="modal" data-target="#jpc_EditCommissionRates">
                        Update
                      </button></td>
                    </tr>
                  <?php }; ?>
                  </tbody>
                </table>
              </div>

              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->
      <div class="modal modal-success fade" id="jpc_EditCommissionRates" name="jpc_EditCommissionRates">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Update Commission Rates</h4>
                </div>
                  <div class="modal-body">
                    <input type="hidden" class="form-control" id="jpc_editcommissionrates_id" name="jpc_editcommissionrates_id"  value="">
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_membershipplan" class="control-label">Membership Plan</label>
                      <div>
                        <input type="text" class="form-control" id="jpc_editcommissionrates_membershipplan" name="jpc_editcommissionrates_membershipplan" placeholder="Membership Plan" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level1percentage" class="control-label">Level 1 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level1percentage" name="jpc_editcommissionrates_level1percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level2percentage" class="control-label">Level 2 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level2percentage" name="jpc_editcommissionrates_level2percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level3percentage" class="control-label">Level 3 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level3percentage" name="jpc_editcommissionrates_level3percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level4percentage" class="control-label">Level 4 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level4percentage" name="jpc_editcommissionrates_level4percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level5percentage" class="control-label">Level 5 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level5percentage" name="jpc_editcommissionrates_level5percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level6percentage" class="control-label">Level 6 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level6percentage" name="jpc_editcommissionrates_level6percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level7percentage" class="control-label">Level 7 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level7percentage" name="jpc_editcommissionrates_level7percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level8percentage" class="control-label">Level 8 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level8percentage" name="jpc_editcommissionrates_level8percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level9percentage" class="control-label">Level 9 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level9percentage" name="jpc_editcommissionrates_level9percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_level10percentage" class="control-label">Level 10 (%)</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_level10percentage" name="jpc_editcommissionrates_level10percentage" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_investmentamount" class="control-label">Investment Amount</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_investmentamount" name="jpc_editcommissionrates_investmentamount" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_stockbonusshare" class="control-label">Stock Bonus Share</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_stockbonusshare" name="jpc_editcommissionrates_stockbonusshare" placeholder="0.00" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jpc_editcommissionrates_specialbonus" class="control-label">Special Bonus</label>
                      <div>
                        <input type="number" class="form-control" id="jpc_editcommissionrates_specialbonus" name="jpc_editcommissionrates_specialbonus" placeholder="0.00" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div id="jpc_savecommissionratesbutton"><button type="button" class="btn btn-outline pull-left">Save</button></div>
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
    <strong>Copyright &copy; 2021-2022 <a href="https://jpcolecciones.com">JP Colecciones</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- ChartJS -->
<script src="../plugins/Charts.js"></script>
<script type="text/javascript">

  jQuery(function(){
    <?php
      $january = 0 ;
      $february = 0 ;
      $march = 0;
      $april = 0;
      $may = 0 ;
      $june =0 ;
      $july = 0 ;
      $august = 0 ;
      $september = 0 ;
      $october = 0 ;
      $november = 0 ;
      $december = 0 ;

      $currentyear = date("Y") ;

      $sqlcharts = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(i_investmentamount) AS totalinvestment,
                                                             DATE_FORMAT(i_created, '%Y %M') AS yearmonth,
                                                             MONTH(i_created) AS currentmonth,
                                                             YEAR(i_created) AS currentyear FROM jpc_members
                                                             WHERE i_isactive=8 AND i_membershipplan<>'Referral Bonus For Package 4'
                                                             GROUP BY DATE_FORMAT(i_created, '%Y %M')
                                                             ORDER BY DATE_FORMAT(i_created, '%Y %M')");
        while ($rows=mysqli_fetch_array($sqlcharts)) {
          $jpc_investment = $rows['totalinvestment'] ;
          $jpc_yearmonth = $rows['yearmonth'] ;
          $jpc_currentmonth = $rows['currentmonth'] ;
          $jpc_currentyear = $rows['currentyear'] ;

          if ($jpc_currentmonth==1 && $jpc_currentyear==$currentyear) {
            $january = $jpc_investment ;
          } else if ($jpc_currentmonth==2 && $jpc_currentyear==$currentyear) {
            $february = $jpc_investment ;
          } else if ($jpc_currentmonth==3 && $jpc_currentyear==$currentyear) {
            $march = $jpc_investment ;
          } else if ($jpc_currentmonth==4 && $jpc_currentyear==$currentyear) {
            $april = $jpc_investment ;
          } else if ($jpc_currentmonth==5 && $jpc_currentyear==$currentyear) {
            $may = $jpc_investment ;
          } else if ($jpc_currentmonth==6 && $jpc_currentyear==$currentyear) {
            $june = $jpc_investment ;
          } else if ($jpc_currentmonth==7 && $jpc_currentyear==$currentyear) {
            $july = $jpc_investment ;
          } else if ($jpc_currentmonth==8 && $jpc_currentyear==$currentyear) {
            $august = $jpc_investment ;
          } else if ($jpc_currentmonth==9 && $jpc_currentyear==$currentyear) {
            $september = $jpc_investment ;
          } else if ($jpc_currentmonth==10 && $jpc_currentyear==$currentyear) {
            $october = $jpc_investment ;
          } else if ($jpc_currentmonth==11 && $jpc_currentyear==$currentyear) {
            $november = $jpc_investment ;
          } else if ($jpc_currentmonth==12 && $jpc_currentyear==$currentyear) {
            $december = $jpc_investment ;
          }
    ?>
    <?php } ?>
    $("#jpc_monthlyrecapyear").html("<?php echo $currentyear ; ?>");
  })
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    var jan = "<?php echo $january ; ?>" ;
    var feb = "<?php echo $february ; ?>" ;
    var mar = "<?php echo $march ; ?>" ;
    var apr = "<?php echo $april ; ?>" ;
    var may = "<?php echo $may ; ?>" ;
    var jun = "<?php echo $june ; ?>" ;
    var jul = "<?php echo $july ; ?>" ;
    var aug = "<?php echo $august ; ?>" ;
    var sep = "<?php echo $september ; ?>" ;
    var oct = "<?php echo $october ; ?>" ;
    var nov = "<?php echo $november ; ?>" ;
    var dec = "<?php echo $december ; ?>" ;

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script type="text/javascript">

  var vrjpcValidationSettings_Server = "<?php echo $serverdirectory ; ?>";

  var StartModule = "<?php echo $jpc_startmodule ; ?>";
  var SearchMember = "<?php echo $jpc_searchmember ; ?>" ;
  if (StartModule=="activatemember" || SearchMember!="") {
    LoadActivateMembers() ;
  } else if (StartModule=="viewallgeneaology") {
    LoadMemberGeneaology() ;
  } else if (StartModule=="transferfunds") {
    LoadTransferFunds() ;
  }

  function LoadDashboard() {
    $("#jpc_AdministratorDashboard").html() ;
    $("#jpc_DashboardWidget").show();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadActivateMembers() {
    $("#jpc_AdministratorDashboard").html("Member Activation") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").show();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadMemberGeneaology() {
    $("#jpc_AdministratorDashboard").html("Member Wallet Genealogy") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").show();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadPayoutApproval() {
    $("#jpc_AdministratorDashboard").html("Payout Withdrawal Approval") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").show();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadSendPackageFunds() {
    $("#jpc_AdministratorDashboard").html("Send Package Funds") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").show();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadTransferFunds() {
    $("#jpc_AdministratorDashboard").html("Transfer Funds") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").show();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadCommissionRates() {
    $("#jpc_AdministratorDashboard").html("Commission Rates") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").show();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadCurrencySettings() {
    $("#jpc_AdministratorDashboard").html("Currency Settings") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").show();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadSetAnnouncements() {
    $("#jpc_AdministratorDashboard").html("Set Announcements") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").show();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadSetEmailVideo() {
    $("#jpc_AdministratorDashboard").html("Set Email Video") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").show();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadMessageMembers() {
    $("#jpc_AdministratorDashboard").html("Message Members") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").show();
    $("#jpc_ChangeAdminPassword").hide();
  }

  function LoadChangeAdminPassword() {
    $("#jpc_AdministratorDashboard").html("Change Admin Password") ;
    $("#jpc_DashboardWidget").hide();
    $("#jpc_ActivateMembers").hide();
    $("#jpc_MemberGeneaology").hide();
    $("#jpc_PayoutApproval").hide();
    $("#jpc_SendPackageFunds").hide();
    $("#jpc_TransferFunds").hide();
    $("#jpc_CommissionRates").hide();
    $("#jpc_CurrencySettings").hide();
    $("#jpc_SetAnnouncements").hide();
    $("#jpc_SetEmailVideo").hide();
    $("#jpc_MessageMembers").hide();
    $("#jpc_ChangeAdminPassword").show();
  }

  function SearchMemberNow() {
    var searchstring = $("#jpc_searchmember").val();
    setTimeout(function() {
          document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_main.php?jpc_searchmember=' + searchstring + '&startmodule=activatemember';
        }, 1000);
  }
  $('.showActivateMembers').each(function () {
    var $this = $(this);
    $this.on("click", function () {
        var data = $(this).data('activatemembers');
        var arr = data.split('~');
        var status = "" ;
        $("#jpc_activatemembers_id").val(arr[0]) ;
        $('#jpc_activatemembers_profilephoto').attr('src', '../images/photos/' + arr[1]);
        $("#jpc_activatemembers_memberid").html("Member ID: <br><span class='label label-warning'>" + arr[2] + "</span>") ;
        $("#jpc_activatemembers_membername").html("Member Name: <br><span class='label label-warning'>" + arr[3]+ "</span>") ;
        $("#jpc_activatemembers_created").html("Register Date/Time: <br><span class='label label-warning'>" + arr[4]+ "</span>") ;
        $('#jpc_activatemembers_idphoto').attr('src', '../images/photos/' + arr[5]);
        $('#jpc_activatemembers_invoicephoto').attr('src', '../images/photos/' + arr[6]);
        if (arr[7]==8) {
            status = '<span class="label label-warning">Active</span>' ;
        } else {
            status = '<span class="label label-danger">Inactive</span>' ;
        }
        $("#jpc_activatemembers_activationstatus").html("Status: <br>" + status) ;
        if (arr[5]=="noid.jpg" || arr[6]=="invoice.png") {
          $(function () { $('#jpc_ActivateMembersConfirmation').modal('toggle'); });
          AlertMessage("ID or Invoice Proof of Payment (POP) is incomplete or missing!");
        }
    });
  });
  $('.showDeleteMember').each(function () {
    var $this = $(this);
    $this.on("click", function () {
        var data = $(this).data('deletemember') ;
        var arr = data.split('~') ;
        var status = "" ;
        $("#jpc_activatemembers_id").val(arr[0]) ;
        $("#member_name").html(arr[3]) ;
    });
  });
  $("#jpc_deletememberbutton").click(function() { AdminDeleteMember(); });
  function AdminDeleteMember() {
    var id = $("#jpc_activatemembers_id").val() ;
    $('#jpc_DeleteMemberConfirmation').modal('hide');
    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_deletemembers.php?jpc_deletemembers_id=' + id ;
    }, 1000);
  }
  $("#jpc_activatemembersbutton").click(function() { AdminActivateMembers(); });
  function AdminActivateMembers() {
    var id = $("#jpc_activatemembers_id").val() ;
    $(function () { $('#jpc_ActivateMembersConfirmation').modal('toggle'); });
    AlertMessage("Activated Successfully!");
    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_activatemembers.php?jpc_activatemembers_id=' + id ;
    }, 1000);
  }
  $("#jpc_deactivatemembersbutton").click(function() { AdminDeactivateMembers(); });
  function AdminDeactivateMembers() {
    var id = $("#jpc_activatemembers_id").val() ;
    $(function () { $('#jpc_ActivateMembersConfirmation').modal('toggle'); });
    AlertMessage("Deactivated Successfully!");
    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_deactivatemembers.php?jpc_deactivatemembers_id=' + id ;
    }, 1000);
  }

  function FilterMemberGeneaology() {
    var id = $("#jpc_viewallgeneaology_memberid").val() ;
    AlertMessage("Filtered Successfully!");
    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_main.php?jpc_filtermembergeneaology=' + id + '&startmodule=viewallgeneaology';
    }, 1000);
  }
  $('.showMemberWalletProcessing').each(function () {
    var $this = $(this);
    $this.on("click", function () {
      try {
        var data = $(this).data('processmemberwallet');
        var arr = data.split('~');
        var status = "" ;

        if (arr.length==1) {
            $(function () {
              $('#jpc_MemberWalletProcessing').modal('toggle');
            });
        }

        $("#jpc_memberwalletprocessing_id").val(arr[0]) ;
        $('#jpc_memberwalletprocessing_profilephoto').attr('src', '../images/photos/' + arr[1]);
        $("#jpc_memberwalletprocessing_memberid").html("Member ID: <br><span class='label label-warning'>" + arr[2] + "</span>") ;
        $("#jpc_memberwalletprocessing_memberid2").val(arr[2]) ;
        $("#jpc_memberwalletprocessing_membername").html("Member Name: <br><span class='label label-warning'>" + arr[3]+ "</span>") ;
        $("#jpc_memberwalletprocessing_created").html("Register Date/Time: <br><span class='label label-warning'>" + arr[4]+ "</span>") ;
        $('#jpc_memberwalletprocessing_idphoto').attr('src', '../images/photos/' + arr[5]);
        $('#jpc_memberwalletprocessing_invoicephoto').attr('src', '../images/photos/' + arr[6]);
        if (arr[7]==8) {
            status = '<span class="label label-warning">Active</span>' ;
        } else {
            status = '<span class="label label-danger">Inactive</span>' ;
        }
        $("#jpc_memberwalletprocessing_activationstatus2").val(arr[7]) ;
        $("#jpc_memberwalletprocessing_activationstatus").html("Status: <br>" + status) ;
        $("#jpc_memberwalletprocessing_bankname").html("Bank Name: <br><span class='label label-warning'>" + arr[8] + "</span>") ;
        $("#jpc_memberwalletprocessing_bankaccountnumber").html("Bank Account Number: <br><span class='label label-warning'>" + arr[9] + "</span>") ;
        $("#jpc_memberwalletprocessing_bankaccountname").html("Bank Account Name: <br><span class='label label-warning'>" + arr[10] + "</span>") ;
      }
      catch(err) {

      }
    });
  });
   $("#jpc_memberwalletprocessingbutton").click(function() { AdminProcessMemberWallet(); });
  function AdminProcessMemberWallet() {
    var id = $("#jpc_memberwalletprocessing_id").val() ;
    var memberid = $("#jpc_memberwalletprocessing_memberid2").val() ;
    var activationstatus = $("#jpc_memberwalletprocessing_activationstatus2").val() ;

    $(function () { $('#jpc_MemberWalletProcessing').modal('toggle'); });

    if (activationstatus==0) {
      AlertMessage("Member is not yet activated!");
    } else {
      AlertMessage("Processed Successfully!");
      setTimeout(function() {
        document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_memberwalletprocessing.php?jpc_memberwalletprocessing_id=' + id + '&memberwalletprocessing_memberid=' + memberid ;
      }, 1000);
    }
  }

  $('.showWithdrawalPayout').each(function () {
    var $this = $(this);
    $this.on("click", function () {
        var data = $(this).data('withdrawalpayout');
        var arr = data.split('~');
        var status = "" ;
        $("#jpc_withdrawalpayoutconfirmation_id").val(arr[0]) ;
        $("#jpc_withdrawalpayoutconfirmation_memberid2").val(arr[1]) ;
        $("#jpc_withdrawalpayoutconfirmation_transferid2").val(arr[3]) ;
        $("#jpc_withdrawalpayoutconfirmation_activationstatus2").val(arr[11]) ;
        $("#jpc_withdrawalpayoutconfirmation_withdrawablebalance2").val(arr[5]) ;
        $("#jpc_withdrawalpayoutconfirmation_userpayout2").val(arr[6]) ;
        $('#jpc_withdrawalpayoutconfirmation_profilephoto').attr('src', '../images/photos/' + arr[9]);
        $("#jpc_withdrawalpayoutconfirmation_memberid").html("Member ID: <br><span class='label label-warning'>" + arr[1] + "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_membername").html("Member Name: <br><span class='label label-warning'>" + arr[2] + "</span>") ;
        if (arr[12]==8) {
            status = '<span class="label label-warning">Active</span>' ;
        } else {
            status = '<span class="label label-danger">Inactive</span>' ;
        }
        $("#jpc_withdrawalpayoutconfirmation_activationstatus").html("Status: <br>" + status) ;

        $("#jpc_withdrawalpayoutconfirmation_bankname").html("Bank Name: <br><span class='label label-warning'>" + arr[13]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_bankaccountnumber").html("Bank Account Number: <br><span class='label label-warning'>" + arr[14]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_bankaccountname").html("Bank Account Name: <br><span class='label label-warning'>" + arr[15]+ "</span>") ;

        $("#jpc_withdrawalpayoutconfirmation_transferid").html("Transfer ID: <br><span class='label label-warning'>" + arr[3]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_transfername").html("Transfer Name: <br><span class='label label-warning'>" + arr[4]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_withdrawablebalance").html("Withdrawable Balance: <br><span class='label label-warning'>" + arr[5]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_userpayout").html("Withdraw Amount: <br><span class='label label-warning'>" + arr[6]+ "</span>") ;
        $("#jpc_withdrawalpayoutconfirmation_reason").html("Reason: <br><span class='label label-warning'>" + arr[7]+ "</span>") ;
        $('#jpc_withdrawalpayoutconfirmation_idphoto').attr('src', '../images/photos/' + arr[10]);
        $('#jpc_withdrawalpayoutconfirmation_invoicephoto').attr('src', '../images/photos/' + arr[11]);
    });
  });
   $("#jpc_withdrawalpayoutconfirmationbutton").click(function() { AdminWithdrawalPayoutConfirmation(); });
  function AdminWithdrawalPayoutConfirmation() {
    var id = $("#jpc_withdrawalpayoutconfirmation_id").val() ;
    var memberid = $("#jpc_withdrawalpayoutconfirmation_memberid2").val() ;
    var transferid = $("#jpc_withdrawalpayoutconfirmation_transferid2").val() ;
    var activationstatus = $("#jpc_withdrawalpayoutconfirmation_activationstatus2").val() ;
    var withdrawablebalance = parseFloat($("#jpc_withdrawalpayoutconfirmation_withdrawablebalance2").val()) ;
    var userpayout = parseFloat($("#jpc_withdrawalpayoutconfirmation_userpayout2").val()) ;
    $(function () { $('#jpc_WithdrawalPayoutConfirmation').modal('toggle'); });
    if (withdrawablebalance < userpayout) {
      AlertMessage("Not enough external wallet balance or <br>already exceed the maximum balance limit!");
    } else {
      if (activationstatus==0) {
        AlertMessage("Member is not yet activated!");
      } else {
        AlertMessage("Processed Successfully!");
        setTimeout(function() {
          document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_withdrawalpayoutconfirmation.php?jpc_withdrawalpayoutconfirmation_id=' + id + '&jpc_withdrawalpayoutconfirmation_memberid=' + memberid + '&jpc_withdrawalpayoutconfirmation_transferid=' + transferid + '&jpc_withdrawalpayoutconfirmation_withdrawablebalance=' + withdrawablebalance + '&jpc_withdrawalpayoutconfirmation_userpayout=' + userpayout ;
        }, 1000);
      }
    }
  }

  $('.showCommissionRates').each(function () {
    var $this = $(this);
    $this.on("click", function () {
        var data = $(this).data('commissionrates');
        var arr = data.split('~');
        $("#jpc_editcommissionrates_id").val(arr[0]) ;
        $("#jpc_editcommissionrates_membershipplan").val(arr[1]) ;
        $("#jpc_editcommissionrates_level1percentage").val(arr[2]) ;
        $("#jpc_editcommissionrates_level2percentage").val(arr[3]) ;
        $("#jpc_editcommissionrates_level3percentage").val(arr[4]) ;
        $("#jpc_editcommissionrates_level4percentage").val(arr[5]) ;
        $("#jpc_editcommissionrates_level5percentage").val(arr[6]) ;
        $("#jpc_editcommissionrates_level6percentage").val(arr[7]) ;
        $("#jpc_editcommissionrates_level7percentage").val(arr[8]) ;
        $("#jpc_editcommissionrates_level8percentage").val(arr[9]) ;
        $("#jpc_editcommissionrates_level9percentage").val(arr[10]) ;
        $("#jpc_editcommissionrates_level10percentage").val(arr[11]) ;
        $("#jpc_editcommissionrates_investmentamount").val(arr[12]) ;
        $("#jpc_editcommissionrates_stockbonusshare").val(arr[13]) ;
        $("#jpc_editcommissionrates_specialbonus").val(arr[14]) ;
    });
  });
  $("#jpc_savecommissionratesbutton").click(function() { AdminSaveCommissionRates(); });
  function AdminSaveCommissionRates() {
    var id = $("#jpc_editcommissionrates_id").val() ;
    var membershipplan = $("#jpc_editcommissionrates_membershipplan").val() ;
    var level1percentage =$("#jpc_editcommissionrates_level1percentage").val() ;
    var level2percentage =$("#jpc_editcommissionrates_level2percentage").val() ;
    var level3percentage =$("#jpc_editcommissionrates_level3percentage").val() ;
    var level4percentage =$("#jpc_editcommissionrates_level4percentage").val() ;
    var level5percentage =$("#jpc_editcommissionrates_level5percentage").val() ;
    var level6percentage =$("#jpc_editcommissionrates_level6percentage").val() ;
    var level7percentage =$("#jpc_editcommissionrates_level7percentage").val() ;
    var level8percentage =$("#jpc_editcommissionrates_level8percentage").val() ;
    var level9percentage =$("#jpc_editcommissionrates_level9percentage").val() ;
    var level10percentage =$("#jpc_editcommissionrates_level10percentage").val() ;
    var investmentamount =$("#jpc_editcommissionrates_investmentamount").val() ;
    var stockbonusshare =$("#jpc_editcommissionrates_stockbonusshare").val() ;
    var specialbonus =$("#jpc_editcommissionrates_specialbonus").val() ;

    AlertMessage("Added Successfully!");
    setTimeout(function() {
      document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_savecommissionrates.php?jpc_editcommissionrates_id=' + id + '&jpc_editcommissionrates_membershipplan=' + membershipplan + '&jpc_editcommissionrates_level1percentage=' + level1percentage + '&jpc_editcommissionrates_level2percentage=' + level2percentage + '&jpc_editcommissionrates_level3percentage=' + level3percentage + '&jpc_editcommissionrates_level4percentage=' + level4percentage + '&jpc_editcommissionrates_level5percentage=' + level5percentage + '&jpc_editcommissionrates_level6percentage=' + level6percentage + '&jpc_editcommissionrates_level7percentage=' + level7percentage + '&jpc_editcommissionrates_level8percentage=' + level8percentage + '&jpc_editcommissionrates_level9percentage=' + level9percentage + '&jpc_editcommissionrates_level10percentage=' + level10percentage + '&jpc_editcommissionrates_investmentamount=' + investmentamount + '&jpc_editcommissionrates_stockbonusshare=' + stockbonusshare + '&jpc_editcommissionrates_specialbonus=' + specialbonus ;
    }, 1000);
  }

	$(document).ready(function (e) {
		var jpc_server = vrjpcValidationSettings_Server + 'admin/jpc_currencysettings.php' ;
		$("#jpc_formcurrencysettings").action = jpc_server ;
		$("#jpc_formcurrencysettings").on('submit',(function(e) {
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
		var jpc_server = vrjpcValidationSettings_Server + 'admin/jpc_setannouncements.php' ;
		$("#jpc_formsetannouncements").action = jpc_server ;
		$("#jpc_formsetannouncements").on('submit',(function(e) {
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
		      AlertMessage("Sent Successfully!");
		    },
		    error: function()
		    {
		      AlertMessage("Sent Successfully!");
		    }
		   });
		}));
	});

  $(document).ready(function (e) {
		var jpc_server = vrjpcValidationSettings_Server + 'admin/jpc_setvideoemail.php' ;
		$("#jpc_formsetemailvideo").action = jpc_server ;
		$("#jpc_formsetemailvideo").on('submit',(function(e) {
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
		      AlertMessage("Sent Successfully!");
		    },
		    error: function()
		    {
		      AlertMessage("Sent Successfully!");
		    }
		   });
		}));
	});

  $(document).ready(function (e) {
    var jpc_server = vrjpcValidationSettings_Server + 'admin/jpc_messagemembers.php' ;
    $("#jpc_formmessagemembers").action = jpc_server ;
    $("#jpc_formmessagemembers").on('submit',(function(e) {
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
          AlertMessage("Sent Successfully!");
        },
        error: function()
        {
          AlertMessage("Sent Successfully!");
        }
       });
    }));
  });

  $(document).ready(function (e) {
        var jpc_server = vrjpcValidationSettings_Server + 'admin/jpc_changepassword.php' ;
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

  $("#jpc_sendpackagefundsbutton").click(function() { SendPackageConfirmation(); });
  function SendPackageConfirmation() {
     var package = $("#jpc_package").val() ;
     var funds = $("#jpc_sendpackagefundsamount").val() ;
     $(function () { $('#jpc_SendPackageFundsConfirmation').modal('toggle'); });
     AlertMessage("Successfully Processed " + package + " funds amount of " +  funds + " !");
     setTimeout(function() {
       document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_sendpackgefundsconfirmation.php?jpc_package=' + package + '&jpc_funds=' + funds ;
     }, 1000);
  }

  $('.showTransferFunds').each(function () {
   var $this = $(this);
   $this.on("click", function () {
       var data = $(this).data('transferfunds');
       var arr = data.split('~');
       var status = "" ;
       $("#jpc_transferfunds_id").val(arr[0]) ;
       $('#jpc_transferfunds_profilephoto').attr('src', '../images/photos/' + arr[1]);
       $("#jpc_transferfunds_memberid").html("Member ID: <br><span class='label label-warning'>" + arr[2] + "</span>") ;
       $("#jpc_transferfunds_membername").html("Member Name: <br><span class='label label-warning'>" + arr[3]+ "</span>") ;
       $("#jpc_transferfunds_membershipplan").html("Membership Plan: <br><span class='label label-warning'>" + arr[4]+ "</span>") ;
       $("#jpc_transferfunds_personalwalletbalance").html("Stock Wallet Balance: <br><span class='label label-warning'>" + arr[5]+ "</span>") ;
       $("#jpc_transferfunds_externalwalletbalance").html("External Wallet Balance: <br><span class='label label-warning'>" + arr[6]+ "</span>") ;

       if (arr[5]<100) {
         $(function () { $('#jpc_ActivateTransferFundsConfirmation').modal('toggle'); });
         AlertMessage("Stock Wallet Balance is below 100!");
       }
   });
  });
  $("#jpc_transferfundsbutton").click(function() { AdminTransferFunds(); });
  function AdminTransferFunds() {
     var id = $("#jpc_transferfunds_id").val() ;
     var amount = $("#jpc_transferfunds_amount").val() ;
     $(function () { $('#jpc_ActivateTransferFundsConfirmation').modal('toggle'); });
     AlertMessage("Transfer Funds Successfully!");
     setTimeout(function() {
       document.location.href = vrjpcValidationSettings_Server + 'admin/jpc_transferfunds.php?jpc_transferfunds_id=' + id + '&jpc_transferfunds_amount=' + amount ;
     }, 1000);
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
