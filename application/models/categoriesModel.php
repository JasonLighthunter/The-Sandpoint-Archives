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

      $whereCondition = array('id' => $id);
      $query          = $this->db->get_where(
        $this->mainTable,
        $whereCondition
      );
      return $query->row_array();
    }

    public function getChildrenById($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }

      $this->prepareQuery();
      $query          = $this->db->get_where(
        $this->linkingTable,
        $whereCondition
      );
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
        $this->mainTable.'id = '.$this->linkingTable.'.child_id',
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
