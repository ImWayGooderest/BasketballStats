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
  <img src="public/images/header_tablet.png" id="headerImg">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" id="brand" href="#"> BasketballStats </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" id="navigationBar">
        <li class="active" id="home"><a href="#">Home</a></li>
        <li><a href="#" id="signup">Sign Up!</a></li>
        <li><a href="#" id="signin">Sign In</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="addStats">Basketball Game</a></li>
            <li><a href="#" id="addPlayer">Player</a></li>
            <li><a href="#" id="addPlayerStats">Player Stats</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Basketball Statistics<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="viewGameStats">View Game Stats</a></li>
            <li><a href="#" id="viewPlayerStats">View Player Stats</a></li>
          </ul>
        </li>
        <li><a href="#" id="about">About</a></li>
        <!--<li><a href="#" id="logOut">Log Out</a></li>-->
      </ul>
    </div>
  </div>
</nav>


<div class="container">
  <div class="col-lg-12">
    <h1 class="page-header" id="mainHeader">CSUF Basketball Gallery</h1>
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
        <h4 class="modal-title" id="create-title">Add Game</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="index.php/pages/submitGameStats" role="form" id="addStats-form">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control"
                   id="date" placeholder="yyyy-mm-dd" name="date"/>
          </div>
          <div class="form-group">
            <label for="opponent">Opponent</label>
            <input type="text" class="form-control"
                   id="opponent" placeholder="Opponent Name" name="opponent"/>
          </div>
          <div class="form-group">
            <label for="score">Score</label>
            <input type="text" class="form-control"
                   id="score" placeholder="W, 100-50" name="score"/>
          </div>
          <div class="form-group">
            <label for="FG">Field Goals</label>
            <input type="text" class="form-control"
                   id="FG" placeholder="00" name="field_goals"/>
          </div>
          <div class="form-group">
            <label for="FGA">Field Goals Attempted</label>
            <input type="text" class="form-control"
                   id="FGA" placeholder="00" name="field_goals_attempted"/>
          </div>
          <div class="form-group">
            <label for="3P">3 Pointers</label>
            <input type="text" class="form-control"
                   id="3P" placeholder="00" name="3pointers"/>
          </div>
          <div class="form-group">
            <label for="3PA">3 Pointers Attempted</label>
            <input type="text" class="form-control"
                   id="3PA" placeholder="00" name="3pointers_attempted"/>
          </div>
          <div class="form-group">
            <label for="FT">Free Throws</label>
            <input type="text" class="form-control"
                   id="FT" placeholder="00" name="free_throws"/>
          </div>
          <div class="form-group">
            <label for="FTA">Free Throws Attempted</label>
            <input type="text" class="form-control"
                   id="FTA" placeholder="00" name="free_throws_attempted"/>
          </div>
          <div class="form-group">
            <label for="OR">Offensive Rebounds</label>
            <input type="text" class="form-control"
                   id="OR" placeholder="00" name="offensive_rebounds"/>
          </div>
          <div class="form-group">
            <label for="DR">Defensive Rebounds</label>
            <input type="text" class="form-control"
                   id="DR" placeholder="00" name="defensive_rebounds"/>
          </div>
          <div class="form-group">
            <label for="AST">Assists</label>
            <input type="text" class="form-control"
                   id="AST" placeholder="00" name="assists"/>
          </div>
          <div class="form-group">
            <label for="TO">Turnovers</label>
            <input type="text" class="form-control"
                   id="TO" placeholder="00" name="turnovers"/>
          </div>
          <div class="form-group">
            <label for="steal">Steals</label>
            <input type="text" class="form-control"
                   id="steal" placeholder="00" name="steals"/>
          </div>
          <div class="form-group">
            <label for="block">Blocks</label>
            <input type="text" class="form-control"
                   id="block" placeholder="00" name="blocks"/>
          </div>
          <div class="form-group">
            <label for="PF">Personal Fouls</label>
            <input type="text" class="form-control"
                   id="PF" placeholder="00" name="personal_fouls"/>
          </div>
          <div class="form-group">
            <label for="points">Points</label>
            <input type="text" class="form-control"
                   id="points" placeholder="00" name="points"/>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="addStats-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" form="addStats-form" id="submitStatsButton">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addPlayerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-title">Add Player</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="addPlayer-form">
          <div class="form-group">
            <label for="number">Player Number</label>
            <input type="text" class="form-control"
                   id="number" placeholder="00" name="number"/>
          </div>
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control"
                   id="first_name" placeholder="First Name" name="first_name"/>
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control"
                   id="last_name" placeholder="Last Name" name="last_name"/>
          </div>
          
        </form>
      </div>
      <div class="modal-footer" id="addPlayer-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" form="addPlayer-form" id="submitPlayerButton">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addPlayerStatsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-title">Add Game</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="addStats-form">
          <div class="form-group">
            <label for="player_id">Player Number</label>
            <input type="text" class="form-control"
                   id="player_id" placeholder="00" name="player_id"/>
          </div>
          <div class="form-group">
            <label for="game_id">Game Number</label>
            <input type="text" class="form-control"
                   id="game_id" placeholder="00" name="game_id"/>
          </div>
          <div class="form-group">
            <label for="minutes">Minutes Played</label>
            <input type="text" class="form-control"
                   id="minutes" placeholder="00" name="minutes"/>
          </div>
          <div class="form-group">
            <label for="field_goals_made">Field Goals</label>
            <input type="text" class="form-control"
                   id="field_goals_made" placeholder="00" name="field_goals_made"/>
          </div>
          <div class="form-group">
            <label for="field_goals_attempted">Field Goals Attempted</label>
            <input type="text" class="form-control"
                   id="field_goals_attempted" placeholder="00" name="field_goals_attempted"/>
          </div>
          <div class="form-group">
            <label for="3pointers_made">3 Pointers</label>
            <input type="text" class="form-control"
                   id="3pointers_made" placeholder="00" name="3pointers_made"/>
          </div>
          <div class="form-group">
            <label for="3pointers_attempted">3 Pointers Attempted</label>
            <input type="text" class="form-control"
                   id="3pointers_attempted" placeholder="00" name="3pointers_attempted"/>
          </div>
          <div class="form-group">
            <label for="free_throws_made">Free Throws</label>
            <input type="text" class="form-control"
                   id="free_throws_made" placeholder="00" name="free_throws_made"/>
          </div>
          <div class="form-group">
            <label for="free_throws_attempted">Free Throws Attempted</label>
            <input type="text" class="form-control"
                   id="free_throws_attempted" placeholder="00" name="free_throws_attempted"/>
          </div>
          <div class="form-group">
            <label for="offensive_rebounds">Offensive Rebounds</label>
            <input type="text" class="form-control"
                   id="offensive_rebounds" placeholder="00" name="offensive_rebounds"/>
          </div>
          <div class="form-group">
            <label for="defensive_rebounds">Defensive Rebounds</label>
            <input type="text" class="form-control"
                   id="defensive_rebounds" placeholder="00" name="defensive_rebounds"/>
          </div>
          <div class="form-group">
            <label for="rebounds">Total Rebounds</label>
            <input type="text" class="form-control"
                   id="rebounds" placeholder="00" name="rebounds"/>
          </div>
          <div class="form-group">
            <label for="assists">Assists</label>
            <input type="text" class="form-control"
                   id="assists" placeholder="00" name="assists"/>
          </div>
          <div class="form-group">
            <label for="steals">Steals</label>
            <input type="text" class="form-control"
                   id="steals" placeholder="00" name="steals"/>
          </div>
          <div class="form-group">
            <label for="blocks">Blocks</label>
            <input type="text" class="form-control"
                   id="blocks" placeholder="00" name="blocks"/>
          </div>
          <div class="form-group">
            <label for="turnovers">Turnovers</label>
            <input type="text" class="form-control"
                   id="turnovers" placeholder="00" name="turnovers"/>
          </div>
          <div class="form-group">
            <label for="personal_fouls">Personal Fouls</label>
            <input type="text" class="form-control"
                   id="personal_fouls" placeholder="00" name="personal_fouls"/>
          </div>
          <div class="form-group">
            <label for="points">Points</label>
            <input type="text" class="form-control"
                   id="points" placeholder="00" name="points"/>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="addPlayerStats-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" form="addPlayerStats-form" id="submitPlayerStatsButton">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

</script>
</body>
</html>