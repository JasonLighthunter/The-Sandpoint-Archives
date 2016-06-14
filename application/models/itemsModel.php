<?php
  class ItemsModel extends CI_Model {
    private $table = 'items';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE, $itemType = FALSE) {
      if($id === FALSE) {
        if($itemType === FALSE) {
          return FALSE;
        }
        $this->prepareQuery($itemType);
        $query = $this->db->get();
        return $query->result_array();
      }

      $this->prepareQuery($itemType, $id);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function create() {
      $data = array(
        'name'         => $this->input->post('name'),
        'price_gold'   => $this->input->post('price'),
        'description'  => $this->input->post('desc'),
        'item_class'   => $this->input->post('item_class'),
        'weapon_class' => $this->input->post('weapon_class'),
        'image_id'     => $this->session->image_id
      );
      if($this->input->post('category_id') !== "0") {
        $data['category_id'] = intval($this->input->post('category_id'));
      }
      return $this->db->insert($this->table, $data);
    }

    //webs
    public function getThreeRandomWeapons() {
      $this->db->order_by('name', 'RANDOM');
      $query = $this->db->get_where($this->table, array('item_class' => 5), 3);
      return $query->result_array();
    }
    public function getByName($name) {
      $query = $this->db->get_where(
        $this->table,
        array('name' => $name)
      );
      return $query->row_array();
    }
    public function getByCategories($categories) {
      $this->db->select(
        $this->table.'.id AS id,'.
        $this->table.'.name AS name,'.
        'categories.id AS category_id,'.          //webs
        'categories.name AS category,'.           //webs
        'item_classes.uri AS class_uri'
      );
      $this->db->from($this->table);
      $this->db->join(
        'item_classes',
        'item_classes.id = '.$this->table.'.item_class',
        'inner'
      );
      $this->db->join(
        'categories',
        'categories.id = '.$this->table.'.category_id',
        'inner'
      );
      $this->db->where_in('category_id', $categories);
      $query = $this->db->get();
      return $query->result_array();
    }
    //webs

    private function prepareQuery($itemType, $id = FALSE) {
      $this->getSelectStatements($itemType);
      $this->db->from($this->table);
      $this->getJoinStatements($itemType);
      $this->getWhereStatements($itemType, $id);
      $this->getOrderStatements($itemType);
    }

    private function getSelectStatements($itemType) {

      switch ($itemType) {
        case 'weapons':
          $this->db->select(
            $this->table.'.id AS id,'.
            $this->table.'.name AS name,'.
            'categories.id AS category_id,'.          //webs
            'categories.name AS category,'.           //webs
            'images.name AS image_name,'.                 //webs
            'item_classes.name AS class_name,'.
            'weapon_classes.name AS weapon_class,'.
            $this->table.'.description AS description,'.
            'item_classes.uri AS class_uri'
          );
          break;
        case 'armor':
          $this->db->select(
            $this->table.'.id AS id,'.
            $this->table.'.name AS name,'.
            'item_classes.name AS class_name,'.
            'armor_types.name AS armor_type,'.
            'items.description AS description,'.
            'item_classes.uri AS class_uri'
          );
          break;
        case 'goods':
        case 'spellComponents':
          $this->db->select(
            $this->table.'.id AS id,'.
            $this->table.'.name AS name,'.
            'item_classes.name AS class_name,'.
            $this->table.'.description AS description,'.
            'item_classes.uri AS class_uri'
          );
          break;
        default:
          $this->db->select('*');
          break;
      }
    }

    private function getJoinStatements($itemType) {
      $this->db->join(
        'item_classes',
        'item_classes.id = '.$this->table.'.item_class',
        'inner'
      );
      switch ($itemType) {
        case 'weapons':
          $this->db->join(
            'weapon_classes',
            'weapon_classes.id = '.$this->table.'.weapon_class',
            'inner'
          );
          // webs
          $this->db->join(
            'categories',
            'categories.id = '.$this->table.'.category_id',
            'left'
          );
          $this->db->join(
            'images',
            'images.id = '.$this->table.'.image_id',
            'left'
          );
          // webs
          break;
        case 'armor':
          $this->db->join(
            'armor_types',
            'armor_types.id = '.$this->table.'.armor_type',
            'inner'
          );
          break;
        default:
          break;
      }
    }

    private function getWhereStatements($itemType, $id) {
      if($id !== FALSE) {
        $this->db->where($this->table.'.id', $id);
      }
      switch ($itemType) {
        case 'goods':
          $this->db->where('item_classes.name', 'Goods');
          break;
        case 'spellComponents':
          $this->db->where('item_classes.name', 'Spell Components');
          break;
        default:
          break;
      }
    }

    private function getOrderStatements($itemType) {
      switch ($itemType) {
        case 'weapons':
          $this->db->order_by(
            'weapon_class DESC,'.
            'name ASC'
          );
          break;
        case 'armor':
          $this->db->order_by(
            'armor_type DESC,'.
            'name ASC'
          );
          break;
        case 'goods':
        case 'spellComponents':
          $this->db->order_by('name ASC');
          break;
        default:
          break;
      }
    }
  }
?>
