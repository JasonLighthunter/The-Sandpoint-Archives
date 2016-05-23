<?php
  class Armor extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('armorModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Armor section
    public function index() {
      $data['armor_items'] = $this->armorModel->get();
      $data['title']       = 'Armor';

      $this->view($data, 'index');
    }

    //this calls a certian view of the Armor section
    public function detail($id = FALSE) {
      $data['armor'] = $this->armorModel->get($id);
      if(empty($data['armor'])) {
        show_404();
      } else {
        $data['title'] = $data['armor']['name'];

        $this->view($data, 'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('armor/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>