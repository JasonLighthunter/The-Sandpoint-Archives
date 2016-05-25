<?php
  class Login extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('navItemsModel');
      $this->load->model('userModel');

      if (isset($data['errorType'])) {
        unset($data['errorType']);
      }
    }

    public function login() {
      if(!file_exists(APPPATH.'views/login/login.php')) {
        show_404();
      }
      $this->view('login');
    }

    public function submit() {
      $this->setValidationRules();
      if ($this->form_validation->run() === FALSE) {
        $data['errorType']    = 'danger';
        $this->view('login', $data);
      } else {
        $this->session->loggedInUser = array(
          'username'
          //GA HIER VERDERkl
          kljsdf;;
        );
        redirect('dashboard');
      }
    }

    private function view($page, $data = '') {
      $data['title']    = ucfirst($page);
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('login/'.$page, $data);
      $this->load->view('templates/footer', $data);
    }

    private function setValidationRules() {
      $this->form_validation->set_rules(
        'username',
        'Username',
        array(
          'required',
          'callback_usernameExists'
        )
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

    public function passwordsMatch($password) {
      $result = $this->userModel->getByUsername($this->input->post('username'));
      if(!empty($result) && ($result['password'] === $password)) {
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