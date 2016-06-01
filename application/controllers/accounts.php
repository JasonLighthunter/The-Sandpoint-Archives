<?php
  class Accounts extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('accountsModel');
      $this->load->model('rolesModel');
      $this->load->model('navItemsModel');

      if (isset($data['messageType'])) {
        unset($data['messageType']);
      }
      if (isset($data['message'])) {
        unset($data['message']);
      }
    }

    //this calls the index pages of the Accounts section
    public function index() {
      $data['accounts'] = $this->accountsModel->get();
      $data['title']    = 'Accounts';

      $this->view($data,'index');
    }

    //this calls a certian view of the Accounts section
    public function detail($id = FALSE) {
      $data['account'] = $this->accountsModel->get($id);
      if(empty($data['account'])) {
        show_404();
      } else {
        $data['roles'] = $this->roleValueToRoles($data['account']['role_value']);
        $data['title'] = $data['account']['username'];

        $this->view($data,'view');
      }
    }

    public function create() {
      if($this->session->has_userdata('loggedInUser')) {
        redirect('home');
      }
      $data['title'] = 'Create a new account on "The Sandpoint Archives"';

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {
        $this->accountsModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You can now log in using your username and password';

        $this->view($data, 'create');
      }
    }

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('accounts/'.$type, $data);
      $this->load->view('templates/footer');
    }

    //converts roleValue to an array of human readable roles
    //for example: 7 wil become user, moderator, admin because user(1) + moderator(2) + admin(4) = 7;
    private function roleValueToRoles($roleValue) {
      $roles = $this->rolesModel->get(FALSE, 'ASC');
      if(empty($roles)) {
        show_error(
          'The table "roles" seems to be empty. Please contact the owner of the website.',
          500
        );
      }
      $result  = array();
      $roleVal = intval($roleValue);
      foreach ($roles as $role) {
        $roleVal -= intval($role['value']);

        if($roleVal >= 0) {
          $result[] = $role['name'];
        }
      }
      return $result;
    }

    private function setValidationRules() {
      //username field
      $this->form_validation->set_rules(
        'username',
        'Username',
        array(
          'required',
          'callback_usernameExists'
        )
      );

      //password field
      $this->form_validation->set_rules(
        'password',
        'Password',
        array (
          'required',
          'min_length[6]',
          'max_length[72]'
        )
      );

      //password-confirm field
      $this->form_validation->set_rules(
        'password-confirm',
        'Password Conformation',
        array(
          'required',
          'matches[password]'
        )
      );
    }

    //Validation Methods
    public function usernameExists($username) {
      $result = $this->accountsModel->getByUsername($username);
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