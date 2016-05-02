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
      $this->db->insert('game',$gameStats);

      echo $this->db->affected_rows();
    }
//    $this->load->library(array('datatables'));
//    $this->datatables
//      ->from('player');
//    echo $this->datatables->generate();
  }
}