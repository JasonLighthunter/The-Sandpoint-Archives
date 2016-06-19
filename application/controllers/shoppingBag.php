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
      if($this->session->has_userdata('shoppingBag')){
        foreach ($_SESSION['shoppingBag'] as $key => $value) {
          $data['items'][$key]          = $this->itemsModel->get($key);
          $data['items'][$key]['count'] = $value;
        }
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
        if($this->session->shoppingBag[$id] !== NULL){
          unset($_SESSION['shoppingBag'][$id]);
        }
      }
      redirect('shoppingBag');
    }

    public function clearBag() {
      unset($_SESSION['shoppingBag']);
      redirect('shoppingBag');
    }

    public function decrease($id = FALSE){
      if($id !== FALSE) {
        if($_SESSION['shoppingBag'][$id] > 0) {
          $_SESSION['shoppingBag'][$id] -= 1;
          if($_SESSION['shoppingBag'][$id] === 0){
            unset($_SESSION['shoppingBag'][$id]);
          }
        }
      }
      redirect('shoppingBag');
    }
    public function increase($id = FALSE){
      $this->inc($id);
      redirect('shoppingBag');
    }

    private function inc($id = FALSE){
      if($id !== FALSE) {
        if($_SESSION['shoppingBag'][$id] <= 0) {
          $_SESSION['shoppingBag'][$id] = 1;
        } else {
          $_SESSION['shoppingBag'][$id]++;
        }
      }
    }
    public function add($id = FALSE) {
      $this->inc($id);
      ?>
        <script>alert("item added")</script>
      <?php
      redirect('items/weapons/'.$id);
    }
  }
?>