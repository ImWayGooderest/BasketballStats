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
      $gameStats['field_goals_percentage'] = round(($gameStats['field_goals']/$gameStats['field_goals_attempted'])*100, 1);
      $gameStats['3pointers_percentage'] = round(($gameStats['3pointers']/$gameStats['3pointers_attempted'])*100, 1);
      $gameStats['free_throws_percentage'] = round(($gameStats['free_throws']/$gameStats['free_throws_attempted'])*100, 1);
      $gameStats['total_rebounds'] = $gameStats['offensive_rebounds'] + $gameStats['defensive_rebounds'];
      $this->db->insert('game',$gameStats);

      echo $this->db->affected_rows();
    }
  }

  public function updatePlayer($player){
    //$this->db->where('number', 1);
    //$current = $this->db->get('player');
    /*$data = $current->result_array();/*
    $data['games']++;
    $data['minutes'] += $player['minutes'];
    $data['minutes_per_game'] = round(($player['minutes']/$data['games']),1);
    $data['field_goals_made'] += $player['field_goals_made'];
    $data['field_goals_attempted'] += $player['field_goals_attempted'];
    $data['field_goals_percent'] = round(($data['field_goals_made']/$data['field_goals_attempted']*100),1);
    $data['free_throws_made'] += $player['free_throws_made'];
    $data['free_throws_attempted'] += $player['free_throws_attempted'];
    $data['free_throws_percent'] = round(($data['free_throws_made']/$data['free_throws_attempted']*100),1);
    $data['3pointers_made'] += $player['3pointers_made'];
    $data['3pointers_attempted'] += $player['3pointers_attempted'];
    $data['3pointers_percent'] = round(($data['3pointers_made']/$data['3pointers_attempted']*100),1);
    $data['offensive_rebounds'] += $player['offensive_rebounds'];
    $data['defensive_rebounds'] += $player['defensive_rebounds'];
    $data['total_rebounds'] += $player['rebounds'];
    $data['rebounds_per_game'] = round(($data['total_rebounds']/$data['games']),1);
    $data['personal_fouls'] += $player['personal_fouls'];
    $data['steals'] += $player['steals'];
    $data['blocks'] += $player['blocks'];
    $data['points'] += $player['points'];
    $data['points_per_game'] = round(($data['points']/$data['games']),1);
    $data['points_per_40'] = round($data['points']/(round($data['minutes']/40,1)),1);
    $this->db->update('player');*/
  }

  public function submitPlayerStats()//todo
  {
    $playerStats = $this->input->post();

    if ($playerStats){
      //$playerStats['field_goals_percentage'] = round(($playerStats['field_goals']/$playerStats['field_goals_attempted'])*100, 1);
      //$playerStats['3pointers_percentage'] = round(($playerStats['3pointers']/$playerStats['3pointers_attempted'])*100, 1);
      //$playerStats['free_throws_percentage'] = round(($playerStats['free_throws']/$playerStats['free_throws_attempted'])*100, 1);
      $playerStats['rebounds'] = $playerStats['offensive_rebounds'] + $playerStats['defensive_rebounds'];
      $this->db->insert('stats',$playerStats);

      echo $this->db->affected_rows();

      //$this->load->library(array('datatables'));
      //$this->datatables
      //->from('player')
      //->where('number', <playerNumber>);
      $this->db->where('number', $playerStats['player_id']);
      $current = $this->db->get('player');
      $data = $current->result_array();
      $data[0]['games']++;
      $data[0]['minutes'] += $playerStats['minutes'];
      $data[0]['minutes_per_game'] = round(($data[0]['minutes']/$data[0]['games']),1);
      $data[0]['field_goals_made'] += $playerStats['field_goals_made'];
      $data[0]['field_goals_attempted'] += $playerStats['field_goals_attempted'];
      $data[0]['field_goal_percent'] = round(($data[0]['field_goals_made']/$data[0]['field_goals_attempted']*100),1);
      $data[0]['free_throws_made'] += $playerStats['free_throws_made'];
      $data[0]['free_throws_attempted'] += $playerStats['free_throws_attempted'];
      $data[0]['free_throw_percent'] = round(($data[0]['free_throws_made']/$data[0]['free_throws_attempted']*100),1);
      $data[0]['3pointers_made'] += $playerStats['3pointers_made'];
      $data[0]['3pointers_attempted'] += $playerStats['3pointers_attempted'];
      $data[0]['3pointer_percent'] = round(($data[0]['3pointers_made']/$data[0]['3pointers_attempted']*100),1);
      $data[0]['offensive_rebounds'] += $playerStats['offensive_rebounds'];
      $data[0]['defensive_rebounds'] += $playerStats['defensive_rebounds'];
      $data[0]['total_rebounds'] += $playerStats['rebounds'];
      $data[0]['rebounds_per_game'] = round(($data[0]['total_rebounds']/$data[0]['games']),1);
      $data[0]['personal_fouls'] += $playerStats['personal_fouls'];
      $data[0]['assists'] += $playerStats['assists'];
      $data[0]['turnovers'] += $playerStats['turnovers'];
      $data[0]['assist_turnover_ratio'] = round(($data[0]['assists']/$data[0]['turnovers']),1);
      $data[0]['steals'] += $playerStats['steals'];
      $data[0]['blocks'] += $playerStats['blocks'];
      $data[0]['points'] += $playerStats['points'];
      $data[0]['points_per_game'] = round(($data[0]['points']/$data[0]['games']),1);
      $data[0]['points_per_40'] = round($data[0]['points']/(round($data[0]['minutes']/40,1)),1);
      if ($playerStats['personal_fouls'] == 5){
        $data['disqualifications']++;
      }
      $this->db->update('player',$data[0], "number = ". $playerStats['player_id']);
      $test = 0;
      //updatePlayer($playerStats);
    }
  }

  public function addNewPlayer()
  {
    $newPlayer = $this->input->post();

    if ($newPlayer){
      $this->db->insert('player',$newPlayer);

      echo $this->db->affected_rows();
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

  
}