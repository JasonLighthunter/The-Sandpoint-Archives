<?php
  class CategoriesModel extends CI_Model {
    private $mainTable    = 'categories';
    private $linkingTable = 'categories_categories';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $query = $this->db->get($this->mainTable);
        return $query->result_array();
      }
      $query = $this->db->get_where(
        $this->mainTable,
        array('id' => $id)
      );
      return $query->row_array();
    }

    public function create(){
      var_dump('post');
      echo '<br>';
      var_dump($this->input->post);
      die();
    }

    public function getChildrenById($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }

      $this->prepareQuery($id);
      $query = $this->db->get();
      return $query->result_array();
    }

    private function prepareQuery($id = FALSE) {
      $this->getSelectStatements();
      $this->db->from($this->linkingTable);
      $this->getJoinStatements();
      $this->getWhereStatements($id);
    }

    private function getSelectStatements() {
      $this->db->select(
        $this->linkingTable.'.child_id AS id,'.
        $this->mainTable.'.name AS name'
      );
    }

    private function getJoinStatements() {
      $this->db->join(
        $this->mainTable,
        $this->mainTable.'.id = '.$this->linkingTable.'.child_id',
        'left'
      );
    }

    private function getWhereStatements($id) {
      if($id !== FALSE) {
        $this->db->where(
          $this->linkingTable.'.parent_id',
          $id
        );
      }
    }
  }
?>
