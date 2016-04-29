<html>
<head>
  <meta charset="utf-8"/>
  <base href="<?=base_url();?>">
  <script src="public/js/jquery-2.0.3.min.js"></script>
  <script src="public/js/jquery-ui.js"></script>
  <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="public/css/index.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
  <script src="public/js/underscore-min.js"></script>
  <script src="public/js/index.js"></script>
  <link rel="stylesheet" type="text/css" href="public/css/clock.css" />
  <script type="text/javascript" src="public/js/countdownClock.js"></script>
  <!---bootstrap-datepicker.min.js: This software is made available under the Apache License Version 2.0, January 2004: Copyright 2013, eternicode.-->
  <!---jquery.timepicker.min.js: This software is made available under the open source MIT License. © 2014 Jon Thornton and contributors.-->
  <link rel="stylesheet" type="text/css" href="public/css/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap-datepicker.min.css" />
  <script type="text/javascript" src="public/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="public/js/jquery.timepicker.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <img src="public/images/header_tablet.png">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" id="brand" href="#"> BasketballStats </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" id="navigationBar">
        <li class="active" id="home"><a href="#">Home</a></li>
        <!--<li><a href="#" id="signup">Sign Up!</a></li>-->
        <!--<li><a href="#" id="signin">Sign In</a></li>-->
        <li><a href="#" id="addStats">Add Basketball Stats</a></li>
        <li><a href="#" id="viewStats">View Basketball Stats</a></li>
        <li><a href=<?php echo site_url("about")?> id="about">About</a></li>
        <li><a href="#" id="contact">Contact</a></li>
        <!--<li><a href="#" id="logOut">Log Out</a></li>-->
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="col-lg-12">
    <!--<form class="form-inline" role="form" id="viewCodeBlackmail-form">-->
    <!--<div class="form-group">-->
    <!--<label for="mycode">Recieved a Blackmail? Enter your code here: </label>-->
    <!--<input type="text" class="form-control" id="mycode">-->
    <!--</div>-->
    <!--<button type="submit" class="btn btn-danger" id="viewCodeBlackmail">View Blackmail</button>-->
    <!--</form>-->
    <h1 class="page-header" id="mainHeader"><span class="glyphicon glyphicon-envelope " aria-hidden="true"></span>CSUF Basketball Gallery</h1>
  </div>
  <div class="container-fluid" id ="centerDisp"></div>