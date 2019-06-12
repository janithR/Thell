<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>


<html>
<head>

    <title>Thel.LK</title>
    <link rel="shortcut icon" href="../assets/images/gs.png" type="image/png">
    <style type="text/css">

        .un {text-decoration: none; }


    </style>


    <script src="<?php echo base_url();?>assets/crud-assets/js/jquery-1.11.2.min.js"></script>

    <script type = "text/javascript" src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js')?>"></script>

    <script src="<?php echo base_url('assets/js/parsely.js')?>"></script>
    <link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/AdminLTE.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/skin-green.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/bootstrap.min.css" />

    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



</head>

<body class="skin-green">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">


        <!-- Logo -->
        <a href="" style="text-decoration:none"class="un logo"><b>Thel.LK</b></a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- User Account Menu -->
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="<?php echo site_url('BManager/logout') ?>"> <i class="fa fa-sign-out"></i>
                            Log out </a>

                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <?php $this->load->view('pages/BManager/BManager_navigation_bar');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!--     <h3 class="box-title">Data Contractor</h3>-->
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <!-- Main content -->
                            <section class="content">
                                
                                <?php $this->load->view('Pages/Admin/content');?>
                                <!-- Your Page Content Here -->

                                


                            </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->



                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>&copy; 2018 Thel.LK  &middot; <a href="<?php echo base_url();?>About">About</a> &middot; <a href="<?php echo base_url(); ?>Blog">Blog</a> &middot; <a href="#">Privacy Policy</a> &middot; <a href="#">Terms</a>
        </strong> All rights reserved.
    </footer>

</div><!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/adminlte.min.js"></script>

</body>
</html>