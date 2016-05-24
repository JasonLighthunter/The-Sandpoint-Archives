<?php
  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
      $this->load->model('loginModel');
    }

    public function view($page = 'login') {
      if(!file_exists(APPPATH.'views/login/'.$page.'.php')) {
        show_404();
      }
      $data['title']    = ucfirst($page);
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('login/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }
  }
?>