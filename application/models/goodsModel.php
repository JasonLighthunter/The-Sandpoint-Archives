<?php
  class GoodsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      $this->prepareQueryBase();
      
      if($id === FALSE){
        $query = $this->db->get();
        return $query->result_array();
      }

      $whereCondition['items.id'] = $id;
      $this->db->where($whereCondition);
      $query = $this->db->get();
      return $query->row_array();
    }

    private function prepareQueryBase() {
      $this->db->select(
        'items.id AS id,'.
        'items.name AS name,'.
        'item_classes.name AS class_name,'.
        'items.description AS description'
      );
      $this->db->from('items');
      $this->db->join(
        'item_classes',
        'item_classes.id = items.item_class',
        'inner'
      );
      $this->db->where('item_classes.name', 'Goods');
      $this->db->order_by('name ASC');
    }
  }
?>
