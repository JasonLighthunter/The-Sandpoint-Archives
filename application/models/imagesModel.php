<?php
  class ImagesModel extends CI_Model {
    public function getHighestId(){
      $this->db->select_max('id');
      $this->db->from('images');
      $query = $this->db->get();
      return $query->row_array()['id'];
    }
    public function create($filename) {
      $data = array(
        'name' => $filename
      );
      return $this->db->insert('images', $data);
    }
  }
?>