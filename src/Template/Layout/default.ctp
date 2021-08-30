<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <?php echo $this->Html->css('/plugins/fontawesome-free/css/all.min'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    
    <?php echo $this->Html->css('Chart.min.css'); ?>
    <?php echo $this->Html->css('icheck-bootstrap.min.css'); ?>
    <?php echo $this->Html->css('jqvmap.min.css'); ?>
    <?php echo $this->Html->css('OverlayScrollbars.min.css'); ?>
    <?php echo $this->Html->css('daterangepicker.css'); ?>
    <?php echo $this->Html->css('summernote-bs4.css'); ?>
    <?php echo $this->Html->css('select2.min.css'); ?>
    <?php echo $this->Html->css('select2-bootstrap4.min.css'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php echo $this->Html->css('adminlte.min.css'); ?>
    <?php  echo $this->Html->css('PNotify'); ?>
    <?php  echo $this->Html->css('Material'); ?>
    <?php  echo $this->Html->css('BrightTheme'); ?>
    <?php  echo $this->Html->css('Angeler'); ?>
    <?= $this->Html->script(['jquery-3.6.0.js']) ?>
    
    <?= $this->Html->script(['PNotify']) ?>
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <?php echo $this->fetch('css'); ?>

    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
</head>
<body class="sidebar-mini layout-fixed  <?= $this->fetch('custom_css_name'); ?>">
<div class="container">
        <p>Weeeeeeeeeeeeeeee</p>
    </div>
    <div class="wrapper">
        <?php echo $this->element('nav-top'); ?>

        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>

        </div>
        <!-- /.content-wrapper -->

        <?php echo $this->element('footer'); ?>

        <!-- Control Sidebar -->
        <?php echo $this->element('aside-control-sidebar'); ?>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- Bootstrap 4 -->
    <?php echo $this->Html->script('bootstrap.bundle.min'); ?>
    <!-- overlayScrollbars -->
    <?php echo $this->Html->script('jquery.overlayScrollbars.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('adminlte.min'); ?>

    <!-- jQuery UI 1.11.4 -->
    <?php echo $this->Html->script('jquery-ui.min'); ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        //$.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Sparkline -->
    <?php echo $this->Html->script('sparkline'); ?>
    <!-- jQuery Knob Chart -->
    <?php echo $this->Html->script('jquery.knob.min'); ?>
    <!-- daterangepicker -->
    <?php echo $this->Html->script('moment.min'); ?>
    <?php echo $this->Html->script('daterangepicker'); ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?php echo $this->Html->script('tempusdominus-bootstrap-4.min'); ?>
    <!-- Summernote -->
    <?php echo $this->Html->script('summernote-bs4.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('fastclick'); ?>
    <!-- Select2 -->
    <?php echo $this->Html->script('select2.full.min'); ?>

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
