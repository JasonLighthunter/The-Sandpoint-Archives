<?php
  class Categories extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('categoriesModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Categories section
    public function index($data = FALSE) {
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

    //create
    public function create() {
      if (!$this->session->inAdminMode) {
        redirect('noPermission');
      }
      $data['title']           = 'Create a new category';
      $data['possibleParents'] = $this->resultArrayToOptionsArray($this->categoriesModel->getAllExcept());

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {
        $this->categoriesModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You have succesfully created the category: "'.
                               $this->input->post('name').'".';

        $this->view($data, 'create');
      }
    }

    //update
    public function update($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }
      if (!$this->session->inAdminMode) {
        redirect('noPermission');
      }
      $data['category']        = $this->categoriesModel->get($id);
      $data['title']           = 'Edit category: '.$data['category']['name'];
      $data['possibleParents'] = $this->resultArrayToOptionsArray($this->categoriesModel->getAllExcept($id));

      $this->setValidationRules('update', $id);

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'update');
      } else {
        $this->categoriesModel->update($id);

        $data['category']        = $this->categoriesModel->get($id);
        $data['title']           = 'Edit category: '.$data['category']['name'];
        $data['possibleParents'] = $this->resultArrayToOptionsArray($this->categoriesModel->getAllExcept($id));

        $data['messageType'] = 'success';
        $data['message']     = 'You have succesfully edited the category: "'.
                                $this->input->post('name').'".';

        $this->view($data, 'update');
      }
    }

    //delete
    public function delete($id = FALSE) {
      if (!$this->session->inAdminMode) {
        redirect('noPermission');
      }
      $data = FALSE;
      if ($id !== FALSE) {
        if($this->categoryExists($id, 'id')) {
          $name = $this->categoriesModel->get($id)['name'];
          $this->categoriesModel->delete($id);

          $data['messageType'] = 'success';
          $data['message']     = 'Category "'.$name.'" is succesfully removed.';
        } else {
          $data['messageType'] = 'danger';
          $data['message']     = 'The category you tried to delete does not exist.';
        }
      }
      $this->index($data);
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('categories/'.$type, $data);
      $this->load->view('templates/footer');
    }

    // translates {0:id,1:name,2:parent_id} to {id:name}
    private function resultArrayToOptionsArray($resultArray) {
      $optionsArray = array (0 => 'no parent');
      foreach ($resultArray as $category) {
        $optionsArray[$category['id']] = $category['name'];
      }
      return $optionsArray;
    }

    private function categoryExists($identifier, $type) {
      switch ($type) {
        case 'name':
          $result = $this->categoriesModel->getByName($identifier);
          break;
        //default to id
        default:
          $result = $this->categoriesModel->get($identifier);
          break;
      }

      if(empty($result)){
        return FALSE;
      }
      return TRUE;
    }

    //validation
    private function setValidationRules($type = 'create', $id = FALSE) {
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
      switch ($type) {
        case 'update':
          if($id === FALSE || $this->input->post('name') !== $this->categoriesModel->get($id)['name']) {
            $ruleArray = array (
              'required',
              'callback_nameAvailable'
            );
          } else {
            $ruleArray = array('required');
          }
          break;
        default:
          $ruleArray = array (
            'required',
            'callback_nameAvailable'
          );
          break;
      }
      $this->form_validation->set_rules(
        'name',
        'Name',
        $ruleArray
      );
    }

    public function nameAvailable($name) {
      if(!$this->categoryExists($name, 'name')) {
        return TRUE;
      }
      $this->form_validation->set_message(
        'nameAvailable',
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