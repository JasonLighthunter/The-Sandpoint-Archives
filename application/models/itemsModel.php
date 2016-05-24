<?php
  class ItemsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE, $itemType = FALSE) {
      if($id === FALSE){
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

    private function prepareQuery($itemType, $id = FALSE) {
      $this->getSelectStatements($itemType);
      $this->db->from('items');
      $this->getJoinStatements($itemType);
      $this->getWhereStatements($itemType, $id);
      $this->getOrderStatements($itemType);
    }

    private function getSelectStatements($itemType) {
      switch ($itemType) {
        case 'weapons':
          $this->db->select(
            'items.id AS id,'.
            'items.name AS name,'.
            'item_classes.name AS class_name,'.
            'weapon_classes.name AS weapon_class,'.
            'items.description AS description,'.
            'item_classes.uri AS class_uri'
          );
          break;
        case 'armor':
          $this->db->select(
            'items.id AS id,'.
            'items.name AS name,'.
            'item_classes.name AS class_name,'.
            'armor_types.name AS armor_type,'.
            'items.description AS description,'.
            'item_classes.uri AS class_uri'
          );
          break;
        case 'goods':
        case 'spellComponents':
          $this->db->select(
            'items.id AS id,'.
            'items.name AS name,'.
            'item_classes.name AS class_name,'.
            'items.description AS description,'.
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
        'item_classes.id = items.item_class',
        'inner'
      );
      switch ($itemType) {
        case 'weapons':
          $this->db->join(
            'weapon_classes',
            'weapon_classes.id = items.weapon_class',
            'inner'
          );
          break;
        case 'armor':
          $this->db->join(
            'armor_types',
            'armor_types.id = items.armor_type',
            'inner'
          );
          break;
        case 'goods':
        case 'spellComponents':
        default:
          break;
      }
    }

    private function getWhereStatements($itemType, $id) {
      if($id !== FALSE){
        $this->db->where('items.id', $id);
      }
      switch ($itemType) {
        case 'goods':
          $this->db->where('item_classes.name', 'Goods');
          break;
        case 'spellComponents':
          $this->db->where('item_classes.name', 'Spell Components');
          break;
        case 'weapons':
        case 'armor':
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
