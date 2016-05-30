<?php
  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
      $this->load->model('userModel');
      $this->load->model('rolesModel');

      if (isset($data['errorType'])) {
        unset($data['errorType']);
      }
    }

    public function login($role = 'user') {
      if($this->session->has_userdata('loggedInUser')) {
        redirect('loggedIn');
      }
      if(empty($this->rolesModel->getByName($role)) || !file_exists(APPPATH.'views/login/login.php')) {
        show_404();
      }
      $this->view('login','', $role);
    }

    public function logout() {
      if ($this->session->has_userdata('loggedInUser')) {
        $this->session->unset_userdata('loggedInUser');

        redirect('home');
      }
    }

    public function submit($role = 'user') {
      if(empty($this->rolesModel->getByName($role))) {
        show_404();
      }
      $this->setValidationRules($role);
      if ($this->form_validation->run() === FALSE) {
        $data['errorType'] = 'danger';

        $this->view('login', $data, $role);
      } else {
        $username = $this->input->post('username');
        $this->session->loggedInUser = array (
          'username'   => $username,
          'role_value' => $this->userModel->getByUsername($username)['role_value']
        );

        if($role === 'user') {
          redirect('account');
        }
        redirect('dashboard');
      }
    }

    private function view($page, $data = '', $role = 'user') {
      $data['formTarget'] = $role;
      $data['title']      = ucfirst($role.' '.$page);
      $data['navItems']   = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('login/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }

    private function setValidationRules($role = 'user') {
      switch ($role) {
        case 'admin':
          $this->form_validation->set_rules(
            'username',
            'Username',
            array(
              'required',
              'callback_usernameExists',
              'callback_userHasRole['.$role.']'
            )
          );
          break;
        case 'user':
          $this->form_validation->set_rules(
            'username',
            'Username',
            array(
              'required',
              'callback_usernameExists'
            )
          );
          break;
        default:
          break;
      }

      $this->form_validation->set_rules(
        'password',
        'Password',
        array(
          'required',
          'callback_passwordsMatch'
        )
      );
    }

    //Validation Methods
    public function usernameExists($username) {
      $result = $this->userModel->getByUsername($username);
      if(!empty($result)){
        return TRUE;
      }
      $this->form_validation->set_message(
        'usernameExists',
        'Incorrect Username and/or Password'
      );
      return FALSE;
    }

    public function userHasRole($username, $role) {
      $user = $this->userModel->getByUsername($username);
      $role = $this->rolesModel->getByName($role);

      if(empty($role) || $user['role_value'] < $role['value']) {
        $this->form_validation->set_message(
          'userHasRole',
          'You do not have the permissions to log in here.'
        );
        return FALSE;
      }
      return TRUE;
    }

    public function passwordsMatch($password) {
      $result = $this->userModel->getByUsername($this->input->post('username'));

      if(!empty($result) && $result['password'] === $password) {
        return TRUE;
      }
      $this->form_validation->set_message(
        'passwordsMatch',
        'Incorrect Username and/or Password'
      );
      return FALSE;
    }
  }
?>