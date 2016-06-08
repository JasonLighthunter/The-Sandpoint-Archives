<?php
  class CategoriesModel extends CI_Model {
    private $table    = 'categories';

    public function __construct() {
      $this->load->database();
    }

    //CREATE
    public function create() {
      $data = array(
        'name'  => $this->input->post('name')
      );
      return $this->db->insert($this->table, $data);
    }

    //READ
    public function get($id = FALSE) {
      if($id === FALSE){
        $query = $this->db->get($this->table);
        return $query->result_array();
      }
      $query = $this->db->get_where(
        $this->table,
        array('id' => $id)
      );
      return $query->row_array();
    }

    //UPDATE

    //DELETE


    public function getChildrenById($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }
      $query = $this->db->get_where(
        $this->table,
        array('parent_id' => $id)
      );
      return $query->result_array();
    }

    public function getByName($name) {
      $query = $this->db->get_where(
        $this->table,
        array('name' => $name)
      );
      return $query->row_array();
    }
  }
?>
