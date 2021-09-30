<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $this->Html->css('../plugins/fontawesome-free/css/all.min'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <?php echo $this->Html->css('../plugins/chart.js/Chart.min'); ?>
    <?php echo $this->Html->css('../plugins/icheck-bootstrap/icheck-bootstrap.min'); ?>
    <?php echo $this->Html->css('../plugins/jqvmap/jqvmap.min'); ?>
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <?php echo $this->Html->css('../plugins/overlayScrollbars/css/OverlayScrollbars.min'); ?>
    <?php echo $this->Html->css('../plugins/daterangepicker/daterangepicker'); ?>
    <?php echo $this->Html->css('../plugins/summernote/summernote-bs4'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $this->fetch('css'); ?>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> layout-top-nav  <?= $this->fetch('custom_css_name'); ?>">
<div class="wrapper">

  <header class="main-header">
    <?php echo $this->element('nav-top', ['layout' => 'top']); ?>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

    <?php echo $this->Flash->render(); ?>
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->fetch('content'); ?>

    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo $this->element('footer', ['layout' => 'top']); ?>

</div>
<!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <?php echo $this->Html->script('../plugins/jquery/jquery.min'); ?>
    <!-- Bootstrap 4 -->
    <?php echo $this->Html->script('../plugins/bootstrap/js/bootstrap.min'); ?>
    <!-- overlayScrollbars -->
    <?php echo $this->Html->script('../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('adminlte.min'); ?>

    <!-- jQuery UI 1.11.4 -->
    <?php echo $this->Html->script('../plugins/jquery-ui/jquery-ui.min'); ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Sparkline -->
    <?php echo $this->Html->script('../plugins/sparklines/sparkline'); ?>
    <!-- jQuery Knob Chart -->
    <?php echo $this->Html->script('../plugins/jquery-knob/jquery.knob.min'); ?>
    <!-- daterangepicker -->
    <?php echo $this->Html->script('../plugins/moment/moment.min'); ?>
    <?php echo $this->Html->script('../plugins/daterangepicker/daterangepicker'); ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?php echo $this->Html->script('../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min'); ?>
    <!-- Summernote -->
    <?php echo $this->Html->script('../plugins/summernote/summernote-bs4.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('../plugins/fastclick/fastclick'); ?>

    <?php
    $pageJs = $this->fetch('page_js');
    if(!empty($pageJs)) {
        if(is_string($pageJs)) {
            echo $this->Html->script($pageJs);
        } else {
            foreach($pageJs as $js) {
                echo $this->Html->script($js);
            }
        }
    }
    ?>

    <?php echo $this->fetch('script'); ?>
    <?php echo $this->fetch('scriptBottom'); ?>

</body>
</html>
