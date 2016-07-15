<?php
  class RolesModel extends CI_Model {
    private $table = 'roles';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE, $order = FALSE) {
      if($id === FALSE) {
        if($order !== FALSE) {
          $this->db->order_by('value '.$order);
        }
        return $this->db->get($this->table)->result_array();
      }
      $query = $this->db->get_where(
        $this->table,
        array('id' => $id)
      );
      return $query->row_array();
    }

    public function getByName($name = FALSE) {
      if($name !== FALSE) {
        $query = $this->db->get_where(
          $this->table,
          array('name' => $name)
        );
        return $query->row_array();
      }
      return FALSE;
    }
  }
?>