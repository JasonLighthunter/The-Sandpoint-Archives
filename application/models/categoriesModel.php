<?php
  class CategoriesModel extends CI_Model {
    private $table       = 'categories';
    private $itemTable   = 'items';
    private $allChildren = array();

    public function __construct() {
      $this->load->database();
    }

    //CREATE
    public function create() {
      $data = array(
        'name' => $this->input->post('name')
      );

      if($this->input->post('parent') !== "0") {
        $data['parent_id'] = intval($this->input->post('parent'));
      }

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
    public function update($id = FALSE) {
      if ($id !== FALSE) {
        $data['name'] = $this->input->post('name');
        if ($this->input->post('parent') !== "0") {
          $data['parent_id'] = intval($this->input->post('parent'));
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
      }
    }

    //DELETE
    public function delete($id = FALSE) {
      if($id !== FALSE) {
        $this->db->delete(
          $this->table,
          array ('id' => $id)
        );
        $this->db->set('category_id', NULL);
        $this->db->where('category_id', $id);
        $this->db->update($this->itemTable);

        $this->db->set('parent_id', NULL);
        $this->db->where('parent_id', $id);
        $this->db->update($this->table);
      }
    }


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


    public function getAllIdExcept($id = FALSE) {
      if($id !== FALSE) {
        $this->db->select('id, name');
        $this->db->from($this->table);
        $this->db->where('id !=', $id);
        $query = $this->db->get();
        $resultArray = $query->result_array();
      } else {
        $resultArray = $this->get();
      }

      $optionsArray = array (0 => 'no category');

      foreach ($resultArray as $category) {
        $optionsArray[$category['id']] = $category['name'];
      }
      return $optionsArray;
    }

    public function getAllChildrenArray(){
      $returnValue = $this->allChildren;
      $this->allChildren = array();
      return $returnValue;
    }

    public function getAllChildren($id = FALSE) {
      if($id === FALSE) {
        return FALSE;
      }
      $directChildren = $this->getChildrenById($id);
      if(!empty($directChildren)) {
        foreach ($directChildren as $child) {
          $this->getAllChildren($child['id']);
        }
      }
      $this->allChildren[] = $id;
    }
  }
?>
