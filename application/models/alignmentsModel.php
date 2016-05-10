<?php
  class AlignmetsModel extends CI_Model {
    public function __construct() {
      $this->load->database();
    }

    /* 
       RETURNS
       alignments by id
       (parameter filled)
       all alignments
       (parameter is left empty)
    */
    public function getByID($id = FALSE) {
      if(id === FALSE){
        $query = $this->db->get('alignments');
        return $query->result_array();
      }
      $whereCondition = array ('id' => $id);
      $query = $this->db->get_where('id', $whereCondition);
      return $query->row_array();
    }
  }
?>