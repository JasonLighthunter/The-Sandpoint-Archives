<?php
  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
      $this->load->model('accountsModel');
      $this->load->model('rolesModel');
    }

    public function login($role = 'user') {
      if($this->session->has_userdata('username') || $this->session->has_userdata('user_id')) {
        redirect('loggedIn');
      }
      if(empty($this->rolesModel->getByName($role)) || !file_exists(APPPATH.'views/login/login.php')) {
        show_404();
      }
      $this->view('login','', $role);
    }

    public function logout() {
      $unsetArray = array (
        'username',
        'user_id',
        'role_value',
        'inAdminMode'
      );
      $this->session->unset_userdata($unsetArray);
      redirect('home');
    }

    public function submit($role = 'user') {
      if(empty($this->rolesModel->getByName($role))) {
        show_404();
      }

      $this->setValidationRules($role);

      if ($this->form_validation->run() === FALSE) {
        $this->view('login', FALSE, $role);
      } else {
        $data['username'] = $this->input->post('username');
        $data['user_id']  = $this->accountsModel->getByUsername($data['username'])['id'];

        if($role === 'user') {
          $data['role_value'] = 1;
        } else {
          $data['role_value']  = $this->accountsModel->getByUsername($data['username'])['role_value'];
          $data['inAdminMode'] = TRUE;
        }
        $this->session->set_userdata($data);

        redirect('accounts/'.$this->session->user_id);
      }
    }

    private function view($page, $data = FALSE, $role = 'user') {
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
          $usernameRules = array (
            'required',
            'callback_usernameExists',
            'callback_userHasRole['.$role.']'
          );
          break;
        case 'user':
        default:
          $usernameRules = array (
            'required',
            'callback_usernameExists'
          );
          break;
      }
      $this->form_validation->set_rules(
        'username',
        'Username',
        $usernameRules
      );

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
    public function usernameExists($username): bool {
      $result = $this->accountsModel->getByUsername($username);
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
      $user = $this->accountsModel->getByUsername($username);
      $role = $this->rolesModel->getByName($role);

      if(empty($role)) {
        show_error(
          'The table "roles" seems to be empty. Please contact the owner of the website.',
          500
        );
      }
      if($user['role_value'] < $role['value']) {
        $this->form_validation->set_message(
          'userHasRole',
          'You do not have the permissions to log in here.'
        );
        return FALSE;
      }
      return TRUE;
    }

    public function passwordsMatch($password): bool {
      $result = $this->accountsModel->getByUsername($this->input->post('username'));

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