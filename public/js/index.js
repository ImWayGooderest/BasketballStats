$(document).ready(function() {
  "use strict";


  var initialLoad = false;
  if(!initialLoad){ //what to do on initial load
    showHome();
    initialLoad = true;
  }


  $("#addStatsModal .date").datepicker({
      "format": "yyyy-mm-dd",
      "autoclose": true,
      "todayHighlight": true,
      "todayBtn": "linked",
      "startDate": "today"
  });

  $("#addStats").click(function(){
    $("#addStatsModal").modal();
  });

  $("#addPlayer").click(function(){
    $("#addPlayerModal").modal();
  });

  $("#addPlayerStats").click(function(){
    $.get("index.php/pages/getPlayersAndGames", function(data) {
      $("#player_id").empty();
      $("#game_id").empty();
      data = JSON.parse(data);
      $.each(data['games'], function(index, value) {
        $("#game_id").append('<option value="' + value.id + '">' + value.opponent + ' ' + value.date + '</option>"');
      });
      $.each(data['players'], function(index, value) {
        $("#player_id").append('<option value="' + value.number + '">' + value.number + ' ' + value.first_name + ' ' + value.last_name + '</option>"');
      });
      $("#addPlayerStatsModal").modal();
    });

  });

  $("#addStats-form").submit(function() {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "index.php/pages/submitGameStats",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        //clear all the values in addStats
        $("#addStatsModal").modal("hide");
        $(".form-control").val("");
        return false;
      }
    });
  });

  $("#addPlayer-form").submit(function(){
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "index.php/pages/addNewPlayer",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        //clear all the values in addStats
        $("#addPlayerModal").modal("hide");
        $(".form-control").val("");
        return false;
      }
    });
  });

  $("#addPlayerStats-form").submit(function(){
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('player_id', $('#player_id option:selected').val());
    formData.append('game_id', $('#game_id option:selected').val());
    $.ajax({
      url: "index.php/pages/submitPlayerStats",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        //clear all the values in addStats
        $("#addPlayerStatsModal").modal("hide");
        $(".form-control").val("");
        return false;
      }
    });
  });


  $("#viewGameStats").click(function(){
    showGameStats()
  });
  function showGameStats(){
    $("#mainHeader").empty().append('Cal State Fullerton Men\'s Basketball Statistics');
    $("#centerDisp").empty().append(
      '<table id="gameTable" class="display" cellspacing="0" width="100%">\
        <thead>\
            <tr>\
              <th></th>\
              <th>Date</th>\
              <th>Opponent</th>\
              <th>Position</th>\
              <th>FG</th>\
              <th>PCT</th>\
              <th>3PT</th>\
              <th>PCT</th>\
              <th>FT</th>\
              <th>PCT</th>\
              <th>OFF</th>\
              <th>DEF</th>\
              <th>REB</th>\
              <th>AST</th>\
              <th>TO</th>\
              <th>STL</th>\
              <th>BLK</th>\
              <th>PF</th>\
              <th>PTS</th>\
            </tr>\
        </thead>\
      </table>');
    $('#gameTable').DataTable( {
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "index.php/pages/loadGameTable"
      },
      "columns": [
        { "data": "id" },
        { "data": "date" },
        { "data": "opponent" },
        { "data": "score" },
        { "data": "field_goals" },
        { "data": "field_goals_percentage" },
        { "data": "3pointers"},
        { "data": "3pointers_percentage" },
        { "data": "free_throws" },
        { "data": "free_throws_percentage" },
        { "data": "offensive_rebounds" },
        { "data": "defensive_rebounds" },
        { "data": "total_rebounds"},
        { "data": "assists" },
        { "data": "turnovers" },
        { "data": "steals" },
        { "data": "blocks" },
        { "data": "personal_fouls" },
        { "data": "points"}
      ],
      "columnDefs": [
        {
          "targets": [ 0 ],
          "visible": false,
          "searchable": false
        }
      ]
    } );

  }

  $("#viewPlayerStats").click(function(){
    showPlayerStats()
  });
  function showPlayerStats(){
    $("#mainHeader").empty().append('Cal State Fullerton Men\'s Basketball Player Statistics');
    $("#centerDisp").empty().append(
      '<table id="playerTable" class="display" cellspacing="0" width="100%">\
        <thead>\
            <tr>\
              <th>#</th>\
              <th>First Name</th>\
              <th>Last Name</th>\
              <th>GP</th>\
              <th>GS</th>\
              <th>MIN</th>\
              <th>MIN/G</th>\
              <th>FGM</th>\
              <th>FGA</th>\
              <th>FG%</th>\
              <th>FTM</th>\
              <th>FTA</th>\
              <th>FT%</th>\
              <th>3PTM</th>\
              <th>3PTA</th>\
              <th>3PT%</th>\
              <th>OFF</th>\
              <th>DEF</th>\
              <th>REB</th>\
              <th>REB/G</th>\
              <th>PF</th>\
              <th>DIS</th>\
              <th>AST</th>\
              <th>TO</th>\
              <th>AST/TO</th>\
              <th>STL</th>\
              <th>BLK</th>\
              <th>PTS</th>\
              <th>PTS/G</th>\
              <th>PTS/40</th>\
            </tr>\
        </thead>\
      </table>');
    $('#playerTable').DataTable( {
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "index.php/pages/loadPlayerTable"
      },
      "scrollX" : true,
      "columns": [
        { "data": "number" },
        { "data": "first_name" },
        { "data": "last_name" },
        { "data": "games" },
        { "data": "games_started" },
        { "data": "minutes" },
        { "data": "minutes_per_game"},
        { "data": "field_goals_made" },
        { "data": "field_goals_attempted" },
        { "data": "free_throws_made" },
        { "data": "free_throws_attempted" },
        { "data": "free_throw_percent" },
        { "data": "total_rebounds"},
        { "data": "3pointers_made" },
        { "data": "3pointers_attempted" },
        { "data": "3pointer_percent" },
        { "data": "offensive_rebounds" },
        { "data": "defensive_rebounds" },
        { "data": "total_rebounds"},
        { "data": "rebounds_per_game" },
        { "data": "personal_fouls" },
        { "data": "disqualifications"},
        { "data": "assists" },
        { "data": "turnovers" },
        { "data": "assist_turnover_ratio" },
        { "data": "steals" },
        { "data": "blocks" },
        { "data": "points"},
        { "data": "points_per_game" },
        { "data": "points_per_40" }
      ]
    } );

  }


  $("#signup").click(function() {
    $("#signinButton").hide();
    $("#registerButton").show();
    $("#registerSignin-title").empty().append("Sign up");
    $("#registerSignIn").modal();
  });

  $("#registerButton").click(function() {
    var registrationData = _.object($("#registerSignIn-form").serializeArray().map(function(v) {return [v.name, v.value];} ));  //returns form values as key value pairs
  });

  $("#signin").click(function() {
    $("#registerButton").hide();
    $("#signinButton").show();
    $("#registerSignin-title").empty().append("Sign in");
    $("#registerSignIn").modal();
  });





  $("#signinButton").click(function() {
    var signinData = _.object($("#registerSignIn-form").serializeArray().map(function(v) {return [v.name, v.value];} ));//converts form data to associative array

  });




  $("#logOut").click(function() {

  });

  $("#brand").click(function() {//clicking on title
    showHome();
  });

  $("#home").click(function() {
    showHome();
  });

  function showHome() {
    $("#mainHeader").empty().append('CSUF Basketball Gallery');
    $("#centerDisp").empty();
    var $galleryContents ='<div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">\
      <a class="thumbnail" href="#">\
      <img class="img-responsive" src="http://placehold.it/400x300" alt="">\
      </a>\
      </div>\
      </div>';

    $("#centerDisp").append($galleryContents);
  }
  $("#about").click(function() {
    showAbout();
  });

  function showAbout(){
    $("#mainHeader").empty().append('<span class="glyphicon glyphicon-glass" aria-hidden="true"></span> About');
    $("#centerDisp").empty();
    var $aboutContents ='<div>Hello!<br><br>BasketballStats is a convenient way to get up to date CSUF Basketball statistics.</div>';

    $("#centerDisp").append($aboutContents);
  }




}); //End of document.ready
