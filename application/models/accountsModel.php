<?php
  class AccountsModel extends CI_Model {
    private $table = 'accounts';

    public function __construct() {
      $this->load->database();
    }
    //CREATE
    public function create() {
      $data = array (
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );
      return $this->db->insert($this->table, $data);
    }

    //READ
    public function get($id = FALSE) {
      if($id === FALSE) {
        return $this->db->get($this->table)->result_array();
      }
      $query = $this->db->get_where(
        $this->table,
        array('id' => $id)
      );
      return $query->row_array();
    }

    public function getByUsername($username = FALSE) {
      if($username === FALSE) {
        return FALSE;
      }
      $query = $this->db->get_where(
        $this->table,
        array ('username' => $username)
      );
      return $query->row_array();
    }

    //UPDATE
    public function update($id) {
      $data = array('username' => $this->input->post('username'));

      $this->db->where('id', $id);
      $this->db->update($this->table, $data);
    }

    //DELETE
    public function delete($id) {
      if($id !== FALSE) {
        $this->db->delete(
          $this->table,
          array ('id' => $id)
        );
      }
    }
  }
?>
