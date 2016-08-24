<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js">                        <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Dashboard</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=500, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/css/bootstrap-responsive.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/Font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/css/calendar.css">
        <link rel="stylesheet" href="<?php echo site_url() ?>/assets/css/theme.css">
        <link rel="stylesheet" href="<?php echo site_url() ?>/assets/css/custom_css.css">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->

        <script src="<?php echo site_url() ?>/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo site_url() ?>assets/plugins/tinymce/tinymce.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url() ?>assets/plugins/tinymce/tinymce.init.js" type="text/javascript"></script>
        <style>
            tr .btn {
                width:20px;
                margin:5px;
            }
            tr .btn img {
                margin: auto;              
            } 


            .modal-body {
                max-height: calc(100vh - 210px);
                overflow-y: auto;
            }

            body{
                background:#FDF4E8;
                background-image: url(<?php echo site_url('assets/uploads/icons/bg.png');?>);
                background-position: top center;
            }

        </style>

        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

    </head>
    <body>
        <!-- BEGIN WRAP -->
        <div id="wrap" class="container">


            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <!-- .topnav -->
                            <div class="btn-toolbar topnav">
                                <div class="btn-group">
                                    <a id="changeSidebarPos" class="btn btn-success" rel="tooltip"
                                       data-original-title="Show / Hide Sidebar" data-placement="bottom">
                                        <i class="icon-resize-horizontal"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-inverse" rel="tooltip" data-original-title="E-mail" data-placement="bottom">
                                        <i class="icon-envelope"></i>
                                        <span class="label label-warning">5</span>
                                    </a>
                                    <a class="btn btn-inverse" rel="tooltip" href="#" data-original-title="Messages"
                                       data-placement="bottom">
                                        <i class="icon-comments"></i>
                                        <span class="label label-important">4</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-inverse" rel="tooltip" href="#" data-original-title="Document"
                                       data-placement="bottom">
                                        <i class="icon-file"></i>
                                    </a>
                                    <a href="#helpModal" class="btn btn-inverse" rel="tooltip" data-placement="bottom"
                                       data-original-title="Help" data-toggle="modal">
                                        <i class="icon-question-sign"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <?php echo anchor("dashboard/authentication/logout", '<i class="icon-off"></i>', array("class" => 'btn btn-inverse', 'data-placement' => 'bottom', 'data-original-title' => "logout", 'rel' => 'tooltip')) ?>


                                    <!--a class="btn btn-inverse" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                                    href="account/logout"><i class="icon-off"></i></a-->


                                </div>
                            </div>
                            <!-- /.topnav -->
                            <div class="nav-collapse collapse">
                                <!-- .nav -->
                                <ul class="nav">

                                    <li><?php echo anchor('home/index', "Home") ?></li>
                                    <li class="active"><?php echo anchor('dashboard/home/index', "Dashboard") ?></li>

                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->


            <!-- BEGIN HEADER.head -->
            <header class="head">
                <div class="search-bar">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="search-bar-inner">
                                <a id="menu-toggle" href="#menu" data-toggle="collapse"
                                   class="accordion-toggle btn btn-inverse visible-phone"
                                   rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu">
                                    <i class="icon-sort"></i>
                                </a>

                                <form class="main-search">
                                    <input class="input-block-level" type="text" placeholder="Live search...">
                                    <button id="searchBtn" type="submit" class="btn btn-inverse"><i class="icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ."main-bar -->
                <div class="main-bar">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <h3><i class="icon-home"></i> Dashboard</h3>
                            </div>
                        </div>
                        <!-- /.row-fluid -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.main-bar -->
            </header>
            <!-- END HEADER.head -->
