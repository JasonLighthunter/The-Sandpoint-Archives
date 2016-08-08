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

    //INDEX
    public function index($data = FALSE) {
      if(!$this->session->inAdminMode) {
        redirect('home');
      }
      $data['accounts'] = $this->accountsModel->get();
      $data['title']    = 'Accounts';

      $this->view($data,'index');
    }

    //DETAIL
    public function detail($id = FALSE) {
      if($id === FALSE) {
        show_404();
      }
      if($this->session->inAdminMode || $id === $this->session->user_id) {
        $data['account'] = $this->accountsModel->get($id);
        if(empty($data['account'])) {
          show_404();
        } else {
          $data['roles'] = $this->roleValueToRoles($data['account']['role_value']);
          $data['title'] = $data['account']['username'];

          $this->view($data,'view');
          return;
        }
      }
      redirect('noPermissions');
    }

    //CREATE
    public function create() {
      if($this->session->has_userdata('user_id') || $this->session->has_userdata('username')) {
        redirect('home');
      }
      $data['title'] = 'Create a new account on "The Sandpoint Archives"';

      $this->setValidationRules();

      var_dump($this->input->post());
      die();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {
        $this->accountsModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You can now log in using your username and password';

        $this->view($data, 'create');
      }
    }

    //UPDATE
    public function update($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }
      if (!$this->session->inAdminMode) {
        redirect('noPermissions');
      }

      $data['account'] = $this->accountsModel->get($id);
      $data['title']   = 'Edit account: '.$data['account']['username'];

      $this->setValidationRules($id);

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'update');
      } else {
        $this->accountsModel->update($id);

        $data = array(
          'account'     => $this->accountsModel->get($id),
          'title'       => 'Edit account: '.$data['account']['username'],
          'messageType' => 'success',
          'message'     => 'Your account has been updated'
        );

        $this->view($data, 'update');
      }
    }

    //DELETE
    public function delete($id = FALSE) {
      if(!$this->session->inAdminMode) {
        redirect('noPermissions');
      }
      $data = FALSE;
      if($id !== FALSE) {
        if($this->session->inAdminMode && $id !== $this->session->user_id) {
          if($this->accountExists($id)) {
            $name = $this->accountsModel->get($id)['username'];

            $this->accountsModel->delete($id);

            $data['messageType'] = 'success';
            $data['message']     = 'You succesfully deleted the account of: '.$name;
          } else {
            $data['messageType'] = 'danger';
            $data['message']     = 'The account you are trying to delete does not exist';
          }
        } else {
          $data['messageType'] = 'danger';
          $data['message']     = 'You cannot delete you own account.';
        }
      }
      $this->index($data);
    }

    //PRIVATE FUNCTIONS

    //type is the name of the file that has to be called.
    private function view($data, $type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('accounts/'.$type, $data);
      $this->load->view('templates/footer');
    }

    private function accountExists($id) {
      $result = $this->accountsModel->get($id);
      if(empty($result)){
        return FALSE;
      }
      return TRUE;
    }

    //converts roleValue to an array of human readable roles
    //example: 7 wil become user + mod + admin because user(1) + moderator(2) + admin(4) = 7;
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

    private function setValidationRules($id = FALSE) {
      //username field
      $this->form_validation->set_rules(
        'username',
        'Username',
        array (
          'required',
          'callback_userExists',
          'max_length[50]'
        )
      );

      //password and password-conf
      if($id === FALSE) {
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
    }

    //VALIDATION METHODS
    public function userExists($username) {
      $userWithUsername = $this->accountsModel->getByUsername($username);
      $userWithId       = $this->accountsModel->get($this->input->post('id'));

      if(empty($userWithUsername) || (!empty($userWithId) && ($userWithId['username'] === $userWithUsername['username']))) {
        return TRUE;
      }
      $this->form_validation->set_message(
        'userExists',
        'This username is already taken'
      );
      return FALSE;
    }
  }
?>