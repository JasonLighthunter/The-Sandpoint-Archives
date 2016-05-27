<?php
  class UserModel extends CI_Model {
    public function __construct() {
      $this->load->database();
      $tableName = 'users';
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $query = $this->db->get($tableName);
        return $query->result_array();
      }

      $whereCondition = array('id' => $id);
      $query          = $this->db->get_where($tableName, $whereCondition);
      return $query->row_array();
    }

    public function getByUsername($username = FALSE) {
      if(!$username === FALSE) {
        $whereCondition = array('username' => $username);
        $query          = $this->db->get_where($tableName, $whereCondition);
        return $query->row_array();
      }
      return FALSE;
    }
  }
?>
