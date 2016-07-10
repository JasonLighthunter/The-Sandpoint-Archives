<?php
  class NavItemsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE) {
        $result = $this->db->get('nav_items')->result_array();
        foreach ($result as $key => $navItem) {
          if($navItem['has_children'] === '1') {
            $result[($key)]['children'] = $this->db->get($navItem['table_name_children'])->result_array();
          }
        }
        return $result;
      }
      return FALSE;
    }
  }
?>
