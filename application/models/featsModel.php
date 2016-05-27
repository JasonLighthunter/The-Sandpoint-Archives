<?php
  class FeatsModel extends CI_Model {
    private $tableName = 'feats';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $query = $this->db->get($this->tableName);
        return $query->result_array();
      }

      $whereCondition = array('id' => $id);
      $query = $this->db->get_where($this->tableName, $whereCondition);
      return $query->row_array();
    }
  }
?>
