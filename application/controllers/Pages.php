<?php
class Pages extends CI_Controller {

  public function view($page = 'home')
  {
    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
      // Whoops, we don't have a page for that!
      show_404();
    }
    $data['title'] = ucfirst($page); // Capitalize the first letter

//    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
//    $this->load->view('templates/footer', $data);
  }

  public function loadGameTable()
  {
//    $result = [];
    $this->load->library(array('datatables'));
//    $test = $this->db->query('SELECT * FROM `game`');
//    foreach ($test->result_array() as $row)
//    {
//      $result[] = $row;
//    }
//    echo json_encode($result);
    $this->datatables
      ->from('game');
//    $data['result'] = $this->datatables->generate();
//    $this->load->view('ajax', $data);
    echo $this->datatables->generate();
  }
}