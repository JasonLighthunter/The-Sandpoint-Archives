<?php
  class Pages extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
    }

    public function view($page = 'home') {
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
        show_404();
      }
      switch ($page) {
        case 'loggedIn':
          $data['title'] = "Already Logged In";
          break;
        case 'noPermissions':
          $data['title'] = "Access Forbidden";
          break;
        default:
          $data['title'] = ucfirst($page);
          break;
      }
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }

    public function viewDashboard(){
      if(!$this->session->has_userdata('loggedInUser')) {
        redirect('login/admin');
      }
      if(!$this->session->loggedInUser['role_value'] > 1) {
        redirect('noPermissions');
      }
      $this->view('dashboard');
    }
  }
?>