<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>IIG - Hiwi Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sebastian Sebald">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      .table .progress { margin-bottom: 0; }
      span.bad { color: #B94A48; }
      span.overtime { color: #468847; }
    </style>
    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://www.telematik.uni-freiburg.de/">IIG</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li<?php if( $this->uri->segment(1) == '' ) echo ' class="active"'; ?>><?php echo anchor('', 'Home'); ?></li>
              <li<?php if( $this->uri->segment(1) == 'work' ) echo ' class="active"'; ?>><?php echo anchor('work', 'Add Work'); ?></li>
              <li<?php if( $this->uri->segment(1) == 'manage' ) echo ' class="active"'; ?>><?php echo anchor('manage', 'Manage Hiwis'); ?></li>            
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">