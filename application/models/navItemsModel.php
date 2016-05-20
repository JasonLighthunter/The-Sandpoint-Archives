<?php
  class NavItemsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $query = $this->db->get('nav_items');
        return $query->result_array();
      }
      return FALSE;
    }
  }
?>
