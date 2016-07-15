<?php
  class Pages extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
    }

    public function view($page = 'home') {
      $data['title'] = $this->getTitle($page);
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }

    private function getTitle($page = 'home') {
      switch ($page) {
        case 'loggedIn':
          return "Already Logged In";
        case 'noPermissions':
          return "Access Forbidden";
        default:
          return ucfirst($page);
      }
    }
  }
?>