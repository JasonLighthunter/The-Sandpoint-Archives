<?php
  class NavItemsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $query  = $this->db->get('nav_items');
        $result = $query->result_array();
        foreach ($result as $navItem) {
          if($navItem['has_children'] === '1') {
            //id is the id minus two because mysql is 1 basesd and php 0 based
            $id                        = ($navItem['id']-1);
            $query                     = $this->db->get($navItem['table_name_children']);
            $result[($id)]['children'] = $query->result_array();
          }
        }
        return $result;
      }
      return FALSE;
    }
  }
?>
