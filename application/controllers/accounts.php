<?php
  class Accounts extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('accountsModel');
      $this->load->model('customersModel'); //webs
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
    public function index($data = FALSE) {
      if(!$this->session->inAdminMode) {
        redirect('home');
      }
      $data['accounts'] = $this->accountsModel->get();
      $data['title']    = 'Accounts';

      $this->view($data,'index');
    }

    //this calls a certian view of the Accounts section
    public function detail($id = FALSE) {
      if($id === FALSE) {
        show_404();
      }
      if($this->session->inAdminMode || $id === $this->session->loggedInUser['user_id']) {
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

    public function create() {
      if($this->session->has_userdata('loggedInUser')) {
        redirect('home');
      }
      $data['title'] = 'Create a new account on "The Sandpoint Archives"';

      $this->setValidationRules();

      if ($this->form_validation->run() === FALSE || empty($this->input->post())) {
        $this->view($data, 'create');
      } else {

      //webs
        $this->customersModel->create();

        $customerData = array (
          'first_name'  => $this->input->post('first-name'),
          'last_name'   => $this->input->post('last-name'),
          'street'      => $this->input->post('street'),
          'number'      => $this->input->post('number'),
          'city'        => $this->input->post('city'),
          'postal_code' => $this->input->post('postal-code')
        );

        $this->session->customerId = $this->customersModel->getByData($customerData)['id'];
      //webs

        $this->accountsModel->create();

        $data['messageType'] = 'success';
        $data['message']     = 'You can now log in using your username and password';

        $this->view($data, 'create');
      }
    }

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
        $this->customersModel->update($data['account']['c_id']);
        $this->accountsModel->update($id);

        $data['account']     = $this->accountsModel->get($id);
        $data['title']       = 'Edit account: '.$data['account']['username'];
        $data['messageType'] = 'success';
        $data['message']     = 'You have succesfully edited the category: "'.
                               $this->input->post('username').'".';

        $this->view($data, 'update');
      }

    }

    public function delete($id = FALSE) {
      if(!$this->session->inAdminMode) {
        redirect('noPermissions');
      }
      $data = FALSE;
      if($id !== FALSE){
        if($this->session->inAdminMode && $id !== $this->session->loggedInUser['user_id']) {

          if($this->accountExists($id)) {

            $oldAccount = $this->accountsModel->get($id);
            $name       = $oldAccount['username'];
            $customerId = $oldAccount['c_id'];

            $this->customersModel->delete($customerId);
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

    private function setValidationRules($id = FALSE) {
      //username field
      $ruleArray = array();

      $this->form_validation->set_rules(
        'username',
        'Username',
        array (
          'required',
          'callback_usernameExists',
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

      //webs
      //fist name
      $this->form_validation->set_rules(
        'first-name',
        'First Name',
        array(
          'required',
          'max_length[50]'
        )
      );

      //last name
      $this->form_validation->set_rules(
        'last-name',
        'Last Name',
        array(
          'required',
          'max_length[50]'
        )
      );

      //street
      $this->form_validation->set_rules(
        'street',
        'Street',
        array(
          'required',
          'max_length[50]'
        )
      );
      //house number
      $this->form_validation->set_rules(
        'number',
        'House Number',
        array(
          'required',
          'max_length[4]'
        )
      );

      //city
      $this->form_validation->set_rules(
        'city',
        'City',
        array(
          'required',
          'max_length[50]'
        )
      );

      //postal code
      $this->form_validation->set_rules(
        'postal-code',
        'Postal Code',
        array(
          'required',
          'min_length[7]',
          'max_length[7]'
        )
      );
      //webs
    }

    //Validation Methods
    public function usernameExists($username) {
      $userWithUsername = $this->accountsModel->getByUsername($username);
      if(empty($userWithUsername)){
        return TRUE;
      }
      $userWithId = $this->accountsModel->get($this->input->post('id'));
      if(!empty($userWithId) && ($userWithId['username'] === $userWithUsername['username'])) {
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