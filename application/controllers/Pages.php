<?php
class Pages extends CI_Controller {

  public function view($page = 'home')
  {
    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
      // Whoops, we don't have a page for that!
      show_404();
    }

    $this->load->view('pages/'.$page);
  }

  public function loadGameTable()
  {
    $this->load->library(array('datatables'));
    $this->datatables
      ->from('game');
    echo $this->datatables->generate();
  }

  public function loadPlayerTable()
  {
    $this->load->library(array('datatables'));
    $this->datatables
      ->from('player');
    echo $this->datatables->generate();
  }

  public function submitGameStats()
  {
    $gameStats = $this->input->post();
    

    if ($gameStats){
      $errors = $this->checkErrors($gameStats);
      if(count($errors) > 0)
      {
        echo json_encode($errors);

      } else {
        $gameStats['field_goals_percentage'] = round(($gameStats['field_goals']/$gameStats['field_goals_attempted'])*100, 1);
        $gameStats['3pointers_percentage'] = round(($gameStats['3pointers']/$gameStats['3pointers_attempted'])*100, 1);
        $gameStats['free_throws_percentage'] = round(($gameStats['free_throws']/$gameStats['free_throws_attempted'])*100, 1);
        $gameStats['total_rebounds'] = $gameStats['offensive_rebounds'] + $gameStats['defensive_rebounds'];
        $this->db->insert('game',$gameStats);

        echo $this->db->affected_rows();
      }

    }
  }


  public function submitPlayerStats()//todo
  {
    $playerStats = $this->input->post();

    if ($playerStats){
      $errors = $this->checkErrors($playerStats);
      if(count($errors) > 0) {
        echo json_encode($errors);
      } else {
        //$playerStats['field_goals_percentage'] = round(($playerStats['field_goals']/$playerStats['field_goals_attempted'])*100, 1);
        //$playerStats['3pointers_percentage'] = round(($playerStats['3pointers']/$playerStats['3pointers_attempted'])*100, 1);
        //$playerStats['free_throws_percentage'] = round(($playerStats['free_throws']/$playerStats['free_throws_attempted'])*100, 1);
        $playerStats['rebounds'] = $playerStats['offensive_rebounds'] + $playerStats['defensive_rebounds'];
        $this->db->insert('stats', $playerStats);



        $this->db->where('number', $playerStats['player_id']);
        $current = $this->db->get('player');
        $data = $current->result_array();
        $data[0]['games']++;
        $data[0]['minutes'] += $playerStats['minutes'];
        $data[0]['minutes_per_game'] = round(($data[0]['minutes'] / $data[0]['games']), 1);
        $data[0]['field_goals_made'] += $playerStats['field_goals_made'];
        $data[0]['field_goals_attempted'] += $playerStats['field_goals_attempted'];
        $data[0]['field_goal_percent'] = round(($data[0]['field_goals_made'] / $data[0]['field_goals_attempted'] * 100), 1);
        $data[0]['free_throws_made'] += $playerStats['free_throws_made'];
        $data[0]['free_throws_attempted'] += $playerStats['free_throws_attempted'];
        $data[0]['free_throw_percent'] = round(($data[0]['free_throws_made'] / $data[0]['free_throws_attempted'] * 100), 1);
        $data[0]['3pointers_made'] += $playerStats['3pointers_made'];
        $data[0]['3pointers_attempted'] += $playerStats['3pointers_attempted'];
        $data[0]['3pointer_percent'] = round(($data[0]['3pointers_made'] / $data[0]['3pointers_attempted'] * 100), 1);
        $data[0]['offensive_rebounds'] += $playerStats['offensive_rebounds'];
        $data[0]['defensive_rebounds'] += $playerStats['defensive_rebounds'];
        $data[0]['total_rebounds'] += $playerStats['rebounds'];
        $data[0]['rebounds_per_game'] = round(($data[0]['total_rebounds'] / $data[0]['games']), 1);
        $data[0]['personal_fouls'] += $playerStats['personal_fouls'];
        $data[0]['assists'] += $playerStats['assists'];
        $data[0]['turnovers'] += $playerStats['turnovers'];
        $data[0]['assist_turnover_ratio'] = round(($data[0]['assists'] / $data[0]['turnovers']), 1);
        $data[0]['steals'] += $playerStats['steals'];
        $data[0]['blocks'] += $playerStats['blocks'];
        $data[0]['points'] += $playerStats['points'];
        $data[0]['points_per_game'] = round(($data[0]['points'] / $data[0]['games']), 1);
        $data[0]['points_per_40'] = round($data[0]['points'] / (round($data[0]['minutes'] / 40, 1)), 1);
        if ($playerStats['personal_fouls'] == 5) {
          $data['disqualifications']++;
        }
        $this->db->update('player', $data[0], "number = " . $playerStats['player_id']);
        echo $this->db->affected_rows();
      }
    }
  }

  public function addNewPlayer()
  {
    $newPlayer = $this->input->post();

    if ($newPlayer){
      $errors = $this->checkErrors($newPlayer);
      if(count($errors) > 0) {
        echo json_encode($errors);
      } else {
        $this->db->insert('player', $newPlayer);
        echo $this->db->affected_rows();
      }
    }
  }

  public function getPlayersAndGames()
  {
    $this->db->select('id, date, opponent');
    $games = $this->db->get('game');
    $games = $games->result_array();
    $this->db->select('number, first_name, last_name');
    $players = $this->db->get('player');
    $players = $players->result_array();
    echo json_encode(array("games" => $games, "players" => $players));
  }

  public function getGamePlayerStats() {
    $this->load->library(array('datatables'));
    $newPlayer = $this->input->post();

    if ($newPlayer) {
      $this->datatables
        ->from('player');
      echo $this->datatables->generate();
    }
  }

  public function register() {
    $newUser = $this->input->post();
    $newUser["password"] = password_hash($newUser["password"], PASSWORD_DEFAULT);
    $current = $this->db->get('users');
    $data = $current->result_array();

    $repeat = false;

    foreach ($data as $value) {
      if ($value['username'] == $newUser['username']){
        $repeat = true;
      }
    }
    if ($repeat == false) {
      $this->db->insert('users',$newUser);
    }
    echo !$repeat;
  }

  public function signIn() {
    $user = $this->input->post();

    $current = $this->db->get('users');
    $data = $current->result_array();

    $valid = false;

    foreach ($data as $value) {
      if ($value['username'] == $user['username'] && password_verify($user['password'], $value['password'])) {
        $valid = true;
      }
    }
    echo $valid;
  }

  /**
   * @param $gameStats
   * @return array
   */
  public function checkErrors($stats)
  {
    $errors = [];
    foreach ($stats as $key => $value) {
      if ($key == "date") {
        $dateParts = explode("-", $value);
        if(count($dateParts) == 3) {
          if (!checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
            array_push($errors, "Invalid date format!");
          }
        } else {
          array_push($errors, "Invalid date format!");
        }

      } else if ($key == "score") {
        $scoreParts = explode(",", $value);
        if(count($scoreParts) == 2) {
          if (strtoupper($scoreParts[0]) == "W" || strtoupper($scoreParts[0]) == "L") {
            $scoreParts = explode("-", $scoreParts[1]);
            if (count($scoreParts) == 2) {
              if (!(is_numeric($scoreParts[0]) && is_numeric($scoreParts[1]))) {
                array_push($errors, "Invalid score format!");
              }
            } else {
              array_push($errors, "Invalid score format!");
            }
          }
        } else {
          array_push($errors, "Invalid score format!");
        }

      } else if ($key == "opponent") {
        if ($value == "") {
          array_push($errors, "Opponent must not be empty!");
        }
      } else if ($key == "first_name") {
        if ($value == "") {
          array_push($errors, "First name must not be empty!");
        }
      } else if ($key == "last_name") {
        if ($value == "") {
          array_push($errors, "Last Name must not be empty!");
        }
      } else {
        if (!is_numeric($value)) {
          array_push($errors, $key . " must be a number and not be empty!");
        }
      }
    }
    return $errors;
  }


}