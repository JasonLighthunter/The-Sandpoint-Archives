<?php
  class AlignmentsModel extends CI_Model {
    private $table = 'alignments';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        return $this->db->get($this->table)->result_array();
      }
      $query = $this->db->get_where(
        $this->table,
        array('id' => $id)
      );
      return $query->row_array();
    }
  }
?>
