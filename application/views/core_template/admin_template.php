<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/libraries/datatables/datatables.min.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components') ?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components') ?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components') ?>/Ionicons/css/ionicons.min.css">
 <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte') ?>/plugins/iCheck/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist') ?>/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist') ?>/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins') ?>/pace/pace.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/libraries/sweetalert/sweetalert.css') ?>">
  

  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist') ?>/css/skins/skin-blue.min.css">
  <link href="<?= BASE_ASSET; ?>/libraries/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/libraries/toastr/build/toastr.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/libraries/fancy-box/source/jquery.fancybox.css?v=2.1.5') ?>" media="screen" />
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>libraries/chosen/chosen.css">
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>libraries/jquery-switch-button/jquery.switchButton.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<!-- <script src="<?= base_url('assets/adminlte/bower_components') ?>/jquery/dist/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Fine Uploader Gallery CSS file

====================================================================== -->
<!-- Fine Uploader jQuery JS file
====================================================================== -->
<script src="<?= BASE_ASSET; ?>js/custom.js" ></script>

<script src="<?= BASE_ASSET; ?>/libraries/fine-upload/jquery.fine-uploader.js"></script>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script src="<?= BASE_ASSET; ?>/libraries/sweetalert/sweetalert.min.js"></script>
<script src="<?= BASE_ASSET; ?>libraries/fancy-box/source/jquery.fancybox.js?v=2.1.5"></script>
<script src="<?= BASE_ASSET; ?>libraries/chosen/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?= BASE_ASSET; ?>libraries/jquery-ui/jquery-ui.js"></script>
<script src="<?= BASE_ASSET; ?>libraries/jquery-switch-button/jquery.switchButton.js"></script>
<script type="text/javascript">
    var HTTP_REFERER = "<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/' ; ?>";
    var csrf = '<?= $this->security->get_csrf_token_name(); ?>';
    var token = '<?= $this->security->get_csrf_hash(); ?>';
    var BASE_URL = '<?= base_url() ?>';
    var csrfData = {};

    csrfData['<?= $this->security->get_csrf_token_name(); ?>'] = token;
    

     $(document).ready(function(){

      toastr.options = {
        "positionClass": "toast-top-center",
      }

      var f_message = '<?= $this->session->flashdata('f_message'); ?>';
      var f_type = '<?= $this->session->flashdata('f_type'); ?>';

      if (f_message.length > 0) {
        toastr[f_type](f_message);
      }
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
    });
</script>
</head>

<body class="hold-transition skin-green-light fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
        
          <!-- Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= user('photo') ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= user('fullname') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= user('photo') ?>" class="img-circle" alt="User Image">

                <p>
                  <?= user('fullname') ?> - <?= user('role') ?>
                  <small>Member since <?= user('created_at') ?></small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('admin/users/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('logout') ?> " class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= user('photo') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= user('fullname') ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

   

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php print_r( display_menu_admin(0,1) ); ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <?= $contents ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminlte/bower_components') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/libraries/datatables/datatables.min.js') ?>"></script>  
<!-- PACE -->
<script src="<?= base_url('assets/adminlte/bower_components') ?>/PACE/pace.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/iCheck/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist') ?>/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/libraries/toastr/build/toastr.min.js') ?>"></script>


<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  //Flat red color scheme for iCheck

   

</script>

</body>
</html>