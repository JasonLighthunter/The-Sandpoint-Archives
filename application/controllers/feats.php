<?php
  class Feats extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('featsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Feats section
    public function index() {
      $data['feats'] = $this->featsModel->get();
      $data['title'] = 'Feats';

      $this->view($data, 'index');
    }

    //this calls a certian view of the Feats section
    public function detail($id = FALSE) {
      $data['feat'] = $this->featsModel->get($id);
      
      if(empty($data['feat'])) {
        show_404();
      } else {
        $data['title'] = $data['feat']['name'];

        $this->view($data, 'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('feats/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>