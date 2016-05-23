<?php
  class Goods extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('goodsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Goods section
    public function index() {
      $data['goods'] = $this->goodsModel->get();
      $data['title'] = 'Goods';

      $this->view($data, 'index');
    }

    //this calls a certian view of the Goods section
    public function detail($id = FALSE) {
      $data['good'] = $this->goodsModel->get($id);
      if(empty($data['good'])) {
        show_404();
      } else {
        $data['title'] = $data['good']['name'];

        $this->view($data, 'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('Goods/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>