<?php
  class RolesModel extends CI_Model {
    private $tableName = 'roles';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE) {
        $this->db->order_by('value DESC');
        $query = $this->db->get($this->tableName);
        return $query->result_array();
      }

      $whereCondition = array('id' => $id);
      $query          = $this->db->get_where($tableName, $whereCondition);
      return $query->row_array();
    }

    public function getByName($name = FALSE) {
      if(!$name === FALSE) {
        $whereCondition = array('name' => $name);
        $query          = $this->db->get_where($this->tableName, $whereCondition);
        return $query->row_array();
      }
      return FALSE;
    }
  }
?>