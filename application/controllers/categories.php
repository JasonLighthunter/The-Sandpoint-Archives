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
      $data['title']           = 'Create a new category';
      $data['possibleParents'] = $this->resultArrayToOptionsArray($this->categoriesModel->getAllExcept());

      // echo '<pre>';
      // var_dump($data['possibleParents']);
      // echo '</pre>';

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {
        $this->categoriesModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You have succesfully created the category: "'.
                               $this->input->post('name').'"';

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

    private function resultArrayToOptionsArray($resultArray) {
      $optionsArray = array (0 => 'no parent');
      foreach ($resultArray as $category) {
        $optionsArray[$category['id']] = $category['name'];
      }
      return $optionsArray;
    }

    //validation
    private function setValidationRules() {
      //parent
      $this->form_validation->set_rules(
        'parent',
        'Parent Category',
        array (
          'required',
          'callback_createsEndlessLoop'
        )
      );

      //name
      $this->form_validation->set_rules(
        'name',
        'Name',
        array (
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

    public function createsEndlessLoop($id) {
      if(intval($id) === 0) {
        return TRUE;
      }

      $parents       = array();
      $currentParent = $this->categoriesModel->get($id);
      $counter       = 1;

      while($currentParent['parent_id'] !== NULL) {
        if($counter > 4) {
          $this->form_validation->set_message(
            'createsEndlessLoop',
            'A subcategory of this depth is not allowed'
          );
          return FALSE;
        }

        $newParent = $this->categoriesModel->get($currentParent['parent_id']);

        if(array_search($newParent['name'], $parents) !== FALSE) {
          $this->form_validation->set_message(
            'createsEndlessLoop',
            'You cannot choose this category as a parent as it will create an endless loop'
          );
          return FALSE;
        }

        $parents[$counter] = $newParent['name'];
        $currentParent     = $newParent;

        $counter++;
      }
      return TRUE;
    }
  }
?>