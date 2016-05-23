<?php
  class Alignments extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('alignmentsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Alignments section
    public function index() {
      $data['alignments'] = $this->alignmentsModel->get();
      $data['title']      = 'Alignments';

      $this->view($data,'index');
    }

    //this calls a certian view of the Alignments section
    public function detail($id = FALSE) {
      $data['alignment'] = $this->alignmentsModel->get($id);
      if(empty($data['alignment'])) {
        show_404();
      } else {
        $data['title'] = $data['alignment']['name'];

        $this->view($data,'view');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data,$type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('alignments/'.$type, $data);
      $this->load->view('templates/footer');
    }
  }
?>