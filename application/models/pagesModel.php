<?php
  class PagesModel extends CI_Model {
    private $tableName = 'pages';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        return $this->db->get($this->tableName)->result_array();
      }
      $query = $this->db->get_where(
        $this->tableName,
        array('id' => $id)
      );
      return $query->row_array();
    }
    
    public function getByName($name = FALSE) {
      if($name === FALSE) {
        return FALSE;
      }
      $query = $this->db->get_where(
        $this->tableName,
        array('name' => $name)
      );
      return $query->row_array();
    }
  }
?>
