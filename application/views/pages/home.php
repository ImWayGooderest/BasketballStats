<!DOCTYPE html>
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
  <!---bootstrap-datepicker.min.js: This software is made available under the Apache License Version 2.0, January 2004: Copyright 2013, eternicode.-->
  <!---jquery.timepicker.min.js: This software is made available under the open source MIT License. © 2014 Jon Thornton and contributors.-->
  <link rel="stylesheet" type="text/css" href="public/css/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap-datepicker.min.css" />
  <script type="text/javascript" src="public/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="public/js/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
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
        <li><a href="#" id="signup">Sign Up!</a></li>
        <li><a href="#" id="signin">Sign In</a></li>
        <li><a href="#" id="addStats">Add Basketball Stats</a></li>
        <li><a href="#" id="viewStats">View Basketball Stats</a></li>
        <li><a href="#" id="about">About</a></li>
        <li><a href="#" id="contact">Contact</a></li>
        <!--<li><a href="#" id="logOut">Log Out</a></li>-->
      </ul>
    </div>
  </div>
</nav>


<div class="container">
  <div class="col-lg-12">
    <h1 class="page-header" id="mainHeader"><span class="glyphicon glyphicon-envelope " aria-hidden="true"></span>CSUF Basketball Gallery</h1>
  </div>
  <div class="container-fluid" id ="centerDisp"></div>




  <hr>

  <!-- Footer -->
  <footer>
    <div class="row">
      <div class="col-lg-12">
        <p>Cal State Fullerton Basketball Stats</p>
      </div>
    </div>
  </footer>

</div>
<!-- /.container -->

<div class="modal fade" id="registerSignIn" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registerSignin-title">Sign up</h4>
      </div>
      <div class="modal-body">
        <p class="bg-danger" id="errorMsg"></p>
        <form role="form" id="registerSignIn-form">
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control"
                   id="inputEmail" placeholder="Enter email" name="email"/>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control"
                   id="inputPassword" placeholder="Password" name="password"/>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="registerSignIn-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="registerButton">Register</button>
        <button type="button" class="btn btn-primary" id="signinButton">Sign In</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addStatsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-title">Create Blackmail</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="addStats-form">
          <div class="form-group">
            <label for="title">Title of blackmail</label>
            <input type="text" class="form-control"
                   id="title" placeholder="Enter Title" name="title"/>
          </div>
          <div class="form-group">
            <label for="recName">Name of blackmail recipient</label>
            <input type="text" class="form-control"
                   id="recName" placeholder="Recipient Name" name="recName"/>
          </div>
          <div class="form-group">
            <label for="recEmail">Email address of blackmail recipient</label>
            <input type="email" class="form-control"
                   id="recEmail" placeholder="Recipient Email" name="recEmail"/>
          </div>
          <div class="form-group">
            <label for="date">Set release date</label>
            <input type="text" class="form-control date"
                   id="date" placeholder="dd/mm/yyyy" name="date"/>
          </div>
          <div class="form-group">
            <label for="time">Set release time</label>
            <input type="text" class="form-control time"
                   id="time" placeholder="12:00 am" name="time"/>
          </div>
          <div class="form-group">
            <label for="demands">Enter your demands</label>
            <input type="text" class="form-control"
                   id="demands" placeholder="Demands" name="demands"/>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="addStats-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

</script>
</body>
</html>