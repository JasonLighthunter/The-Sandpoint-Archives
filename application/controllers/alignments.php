<?php
  class Alignments extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('alignmentsModel');
      $this->load->model('navItemsModel');
    }

    //CREATE
    public function create() {
      $data['title'] = 'Create a new alignment for "The Sandpoint Archives"';

      $this->setValidationRules();

      if ($this->form_validation->run() === TRUE && $this->postIsFull()) {
        $this->view($data, 'create');
      } else {
        $this->accountsModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You have created an alignment';

        $this->view($data, 'create');
      }
    }

    //READ
    public function index() {
      $data['alignments'] = $this->alignmentsModel->get();
      $data['title']      = 'Alignments';

      $this->view($data,'index');
    }

    public function detail($id = FALSE) {
      $data['alignment'] = $this->alignmentsModel->get($id);
      if(empty($data['alignment'])) {
        show_404();
      } else {
        $data['title'] = $data['alignment']['name'];

        $this->view($data,'view');
      }
    }

    private function view($data, string $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('alignments/'.$type, $data);
      $this->load->view('templates/footer');
    }

    private function postIsFull(): bool {
      if(empty($this->input->post('name')) ||
         empty($this->input->post('abbreviation'))
        ) {
        return FALSE;
      }
      return TRUE;
    }
  }
?>