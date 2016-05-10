<?php
  class Alignments extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('alignmentsModel');
      $this->load->helper('url_helper');
    }

    //this calls the index pages of the Alignments section
    public function index() {
      $data['alignments'] = $this->alignmentsModel->getAll();
      $data['title']      = 'Alignments';

      $this->load->view('templates/header', $data);
      $this->load->view('alignments/index', $data);
      $this->load->view('templates/footer');
    }

    //this calls a certian view of the Alignments section
    public function view($id = FALSE) {
      $data['alignment'] = $this->alignmentsModel->getById($id);
      if(empty($data['alignment'])) {
        show_404();
      } else {
        $data['title'] = $data['alignment']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('alignments/view', $data);
        $this->load->view('templates/footer');
      }
    }
  }
?>