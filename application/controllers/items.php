<?php
  class Items extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('itemsModel');
      $this->load->model('navItemsModel');
      $this->load->model('categoriesModel');
      $this->load->model('imagesModel');
    }

    //this calls the index pages of the Weapons section
    public function index($itemType = 'weapons') {
      if($itemType === FALSE) {
        show_404();
      }

      $data['items'] = $this->itemsModel->get(FALSE, $itemType);
      switch ($itemType) {
        case 'weapons':
          $data['title'] = 'Weapons';
          break;
        case 'armor':
          $data['title'] = 'Armor';
          break;
        case 'goods':
          $data['title'] = 'Goods';
          break;
        case 'spellComponents':
          $data['title'] = 'Spell Components';
          break;
        default:
          show_404();
      }

      $this->view($data, 'index', $itemType);
    }

    //this calls a certian view of the Items sections
    public function detail($id = FALSE, $itemType = FALSE) {
      $data['item'] = $this->itemsModel->get($id, $itemType);
      if(empty($data['item'])) {
        show_404();
      } else {
        $data['title'] = $data['item']['name'];

        $this->view($data, 'view', $itemType);
      }
    }

    //this calls the create of the Items section
    public function create() {
      if(!$this->session->inAdminMode) {
        redirect('noPermissions');
      }
      $data['title']              = "Create New Weapon";
      $data['possibleCategories'] = $this->categoriesModel->getAllIdExcept();

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create', 'weapons');
      } else {
        $this->session->image_id = $this->do_upload('newFile');
        $this->itemsModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'The item '.$this->input->post('name').' has been created.';

        $this->view($data, 'create', 'weapons');
      }
    }

    //$type is the name of the file that has to be called.
    private function view($data, $pageType, $itemType) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      switch ($itemType) {
        case 'weapons':
        case 'armor':
        case 'spellComponents':
        case 'goods':
          switch ($pageType) {
            case 'create':
              $this->load->view('items/create', $data);
              break;
            default:
              $this->load->view('items/'.$itemType.'/'.$pageType, $data);
              break;
          }
          break;
        default:
          show_404();
          break;
      }

      $this->load->view('templates/footer');
    }

    public function do_upload($upload = '') {
      $config['upload_path']      = './assets/images/uploads/';
      $config['allowed_types']    = 'gif|jpg|png';
      $config['max_size']         = 100;
      $config['max_width']        = 300;
      $config['max_height']       = 300;
      $config['remove_spaces']    = TRUE;
      $config['file_ext_tolower'] = TRUE;

      $this->load->library('upload', $config);

      if (! $this->upload->do_upload($upload)) {
        return 1;
      } else {
        $this->imagesModel->create($this->upload->data('file_name'));
        return $this->imagesModel->getHighestId();
      }
    }


    //checks if logged in user has admin permissions
    //return TRUE if true or redirects user to adminlogin/noPermissions page
    private function checkIfAdmin() {
      if($this->session->inAdminMode) {
        return TRUE;
      }
      redirect('noPermissions');
    }
    private function checkIfLoggedIn() {
      if($this->session->has_userdata('LoggedInUser')) {
        return TRUE;
      } else {
        redirect('login/admin');
      }
    }

    //this method sets the
    private function setValidationRules() {
      //name field
      $this->form_validation->set_rules(
        'name',
        'Name',
        array(
          'required',
          'callback_itemExists',
          'max_length[50]'
        )
      );
      $this->form_validation->set_rules(
        'desc',
        'Description',
        array(
          'required',
          'max_length[5000]'
        )
      );
      $this->form_validation->set_rules(
        'category_id',
        'Category',
        array('required')
      );
      $this->form_validation->set_rules(
        'Price',
        'price',
        array(
          'decimal',
          'greater_than_equal_to[0.00]',
          'less_than_equal_to[999999.99]'
        )
      );
    }

    public function itemExists($name) {
      $result = $this->itemsModel->getByName($name);
      if(empty($result)){
        return TRUE;
      }
      $this->form_validation->set_message(
        'usernameExists',
        'This username is already taken'
      );
      return FALSE;
    }
  }
?>