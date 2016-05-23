<?php
  class SpellComponents extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('spellComponentsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the SpellComponents section
    public function index() {
      $data['spellComponents'] = $this->spellComponentsModel->get();
      $data['title']           = 'Spell Components';

      $this->view($data, 'index');
    }

    //this calls a certian view of the SpellComponents section
    public function detail($id = FALSE) {
      $data['spellComponent'] = $this->spellComponentsModel->get($id);
      if(empty($data['spellComponent'])) {
        show_404();
      } else {
        $data['title'] = $data['spellComponent']['name'];
        $this->view($data, 'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('spellComponents/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>