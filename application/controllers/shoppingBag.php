<?php
  class ShoppingBag extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('itemsModel');
      $this->load->model('navItemsModel');
    }

    public function index() {
      $data['title'] = 'Shopping Bag';
      $data['items'] = array();

      foreach ($_SESSION['shoppingBag'] as $key => $value) {
        $data['items'][$key]     = $this->itemsModel->get($key);
        $data['items'][$key]['count'] = $value;
      }
      $this->view($data,'index');
    }

    private function view($data,$type) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      $this->load->view('ShoppingBag/'.$type, $data);
      $this->load->view('templates/footer');
    }

    public function remove($id = FALSE) {
      if($id !== FALSE) {
        if($this->session->has_userdata($shoppingBag[$id])){
          unset($_SESSION['shoppingBag'][$id]);
        }
      }
      $this->index();
      return;
    }

    public function add($id = FALSE) {
      if($id !== FALSE) {
        if($_SESSION['shoppingBag'][$id] <= 0) {
          $_SESSION['shoppingBag'][$id] = 1;
        } else {
          $_SESSION['shoppingBag'][$id]++;
        }
      }
      ?>
      <script>alert("item added")</script>
      <?php
      redirect('items/weapons/'.$id);
    }
  }
?>