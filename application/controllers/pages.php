<?php
  class Pages extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
      $this->load->model('pagesModel');
      // webs
      $this->load->model('itemsModel');
      //webs
    }

    public function view($page = 'home') {
      $data['title'] = $this->getTitle($page);
      switch ($page) {
        // case 'home':
        case 'loggedIn':
        case 'noPermissions':
          $data['page'] = $this->pagesModel->getByName($page);
          if(empty($data['page'])){
            show_404();
          }
          $page = 'view';
          break;
        default:
          if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
          }
          break;
      }
      //webs
      if($page === 'home') {
        $data['weapons'] = $this->itemsModel->getThreeRandomWeapons();
      }
      //webs

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
        case 'shoppingBag':
          return "Shopping bag";
        default:
          return ucfirst($page);
      }
    }
  }
?>