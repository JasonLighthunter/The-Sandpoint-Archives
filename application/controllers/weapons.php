<?php
  class Weapons extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('weaponsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Weapons section
    public function index() {
      $data['weapons'] = $this->weaponsModel->get();
      $data['title']   = 'Weapons';

      $this->view($data, 'index');
    }

    //this calls a certian view of the Weapons section
    public function detail($id = FALSE) {
      $data['weapon'] = $this->weaponsModel->get($id);
      if(empty($data['weapon'])) {
        show_404();
      } else {
        $data['title'] = $data['weapon']['name'];

        $this->view($data, 'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('weapons/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>