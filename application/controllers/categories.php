<?php
  class Categories extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('categoriesModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Categories section
    public function index() {
      $data['categories'] = $this->categoriesModel->get();
      $data['title']      = 'Categories';

      $this->view($data,'index');
    }

    //this calls a certian view of the Categories section
    public function detail($id = FALSE) {
      $data['category'] = $this->categoriesModel->get($id);
      if(empty($data['category'])) {
        show_404();
      } else {
        $data['title']         = $data['category']['name'];
        $data['subCategories'] = $this->categoriesModel->getChildrenById($id);
        $this->view($data,'view');
      }
    }

    public function create() {
      if (!$this->session->inAdminMode) {
        redirect('noPermission');
      }
      $data['title'] = 'Create a new category';

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {
        $this->categoriesModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You have succesfully created the category: "'.$this->input->post('name').'"';

        $this->view($data, 'create');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('categories/'.$type, $data);
      $this->load->view('templates/footer');
    }

    private function setValidationRules() {
      $this->form_validation->set_rules(
        'name',
        'Name',
        array(
          'required',
          'callback_categoryNameExists',
        )
      );
    }

    public function categoryNameExists($name) {
      $result = $this->categoriesModel->getByName($name);
      if(empty($result)){
        return TRUE;
      }
      $this->form_validation->set_message(
        'categoryNameExists',
        'There is already a category with the same name'
      );
      return FALSE;
    }
  }
?>