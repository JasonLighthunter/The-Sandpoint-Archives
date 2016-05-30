<?php
  class Items extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('itemsModel');
      $this->load->model('navItemsModel');
    }

    //this calls the index pages of the Weapons section
    public function index($itemType = FALSE) {
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

    //$type is the name of the file that has to be called.
    private function view($data, $pageType, $itemType) {
      $data['navItems'] = $this->navItemsModel->get();

      $this->load->view('templates/header', $data);
      switch ($itemType) {
        case 'weapons':
        case 'armor':
        case 'spellComponents':
        case 'goods':
          $this->load->view('items/'.$itemType.'/'.$pageType, $data);
          break;
        default:
          show_404();
          break;
      }

      $this->load->view('templates/footer');
    }
  }
?>