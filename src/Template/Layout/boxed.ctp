<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <?php echo $this->Html->css('/plugins/fontawesome-free/css/all.min'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <?php echo $this->Html->css('/plugins/icheck-bootstrap/icheck-bootstrap.min'); ?>
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <?php echo $this->fetch('css'); ?>

</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition sidebar-mini layout-boxed <?= $this->fetch('custom_css_name'); ?>">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php echo $this->element('nav-top'); ?>

        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

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

    <!-- jQuery -->
    <?php echo $this->Html->script('/plugins/jquery/jquery.min'); ?>
    <!-- Bootstrap 4 -->
    <?php echo $this->Html->script('/plugins/bootstrap/js/bootstrap.bundle.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('/js/adminlte.min'); ?>

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
