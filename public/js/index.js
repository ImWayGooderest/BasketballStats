var $currentUser = "";

$(document).ready(function() {
  "use strict";

  var $signup = document.getElementById("signup");
  var $signin =  document.getElementById("signin");
  var $logOut = document.getElementById("logOut");
  var $greeting = document.getElementById("greeting");
  var $errorMsg = document.getElementById("errorMsg");

  var initialLoad = false;
  if(!initialLoad){ //what to do on initial load
    initialLoad = true;
  }

  // initialize input widgets first
  $("#createModal .time").timepicker({
      "timeFormat": "h:i a",
      "disableTextInput": true
  });

  $("#createModal .date").datepicker({
      "format": "mm/dd/yyyy",
      "autoclose": true,
      "todayHighlight": true,
      "todayBtn": "linked",
      "startDate": "today"
  });

  $("#addStats").click(function(){
    $("#addStatsModal").modal();
  });

  $("#addStats-form").submit(function() {
    ////disable the default form submission
    //event.preventDefault();
    //var formData = new FormData(this);
    //$.ajax({
    //  url: "/upload",
    //  type: "POST",
    //  data: formData,
    //  async: false,
    //  cache: false,
    //  contentType: false,
    //  processData: false,
    //  success: function () {
    //    $("#createModal").modal("hide");
    //    $("#title").val("");
    //    $("#recName").val("");
    //    $("#recEmail").val("");
    //    $("#date").val("");
    //    $("#time").val("");
    //    $("#demands").val("");
    //    $("#imageUpload").val("");
    //    makeMyBlackmails();
    //    return false;
    //  }
    //});
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
      "serverSide": true,
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
    $("#mainHeader").empty().append('Cal State Fullerton Men\'s Basketball Statistics');
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
      "serverSide": true,
      "ajax": {
        "url": "index.php/pages/loadPlayerTable"
      },
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

    $.get("http://localhost:3000/accounts", {"username": registrationData.email,"password": registrationData.password}, function(data) {

      if (data.length <= 0) { // if account doesn't exist
        $.post("http://localhost:3000/accounts", {
          "username": registrationData.email,
          "password": registrationData.password
        }, function() {
          //put an alert in here for now
          $("#registerSignIn").modal("hide");
          $("#inputEmail").val("");
          $("#inputPassword").val("");
        });
      }
      else {
        $("#errorMsg").text("Sign up failed. Account exists, please try again!");
        $errorMsg.style.display = "block";
      }

    });
  });

  $("#signin").click(function() {
    $("#registerButton").hide();
    $("#signinButton").show();
    $("#registerSignin-title").empty().append("Sign in");
    $("#registerSignIn").modal();
  });





  $("#signinButton").click(function() {
    var signinData = _.object($("#registerSignIn-form").serializeArray().map(function(v) {return [v.name, v.value];} ));//converts form data to associative array
      $.get("server.php", {"username": signinData.email,"password": signinData.password}, function(data) {

        if (data.length <= 0) { // if account doesn't exist
          $("#errorMsg").text("Account does not exist. Please try again!");
          $errorMsg.style.display = "block"; //show error message
        }
        else { // if account exist
          $("#registerSignIn").modal("hide");
          $signup.style.display = "none";
          $signin.style.display = "none";
          $createBlackmail.style.display = "list-item";
          $viewBlackmail.style.display = "list-item";
          $logOut.style.display = "list-item";

          var $greeting = '<span class="text-primary" id="greeting">Hello, ' + data[0].username + '!</li>';
          $currentUser = data[0].username;
          $("#navbar").append($greeting);
          makeMyBlackmails();
        }

      });
  });




  $("#logOut").click(function() {
    $currentUser = "";
    $signup.style.display = "list-item";
    $signin.style.display = "list-item";
    $createBlackmail.style.display = "none";
    $viewBlackmail.style.display = "none";
    $logOut.style.display = "none";
    $("#greeting").remove();
    makeGallery();
  });

  $("#brand").click(function() {//clicking on title

  });

  $("#home").click(function() {
  });

  $("#about").click(function() {
    showAbout();
  });

  function showAbout(){
    $("#mainHeader").empty().append('<span class="glyphicon glyphicon-glass" aria-hidden="true"></span> About');
    $("#centerDisp").empty();
    var $aboutContents ='<div>Hello!<br><br>BasketballStats is a convenient way to get up to date CSUF Basketball statistics.</div>';

    $("#centerDisp").append($aboutContents);
  }

  $("#contact").click(function() {
    showContact();
  });

  function showContact(){
    $("#mainHeader").empty().append('<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Contact');
    $("#centerDisp").empty();
    var $contactInfo ="<div>Please address all complaints and legal threats to:<br><br>";
    $contactInfo += "Former Vice President Dick Cheney<br>";
    $contactInfo += "The American Enterprise Institute<br>";
    $contactInfo += "1150 Seventeenth Street, N.W.<br>";
    $contactInfo += "Washington, DC 20036</div>";

    $("#centerDisp").append($contactInfo);
  }



}); //End of document.ready
