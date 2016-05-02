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
}