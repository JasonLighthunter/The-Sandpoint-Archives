<?php
  class AccountsModel extends CI_Model {
    private $table = 'accounts';

    public function __construct() {
      $this->load->database();
    }

    public function get($id = FALSE) {
      if($id === FALSE){
        $this->db->select(
          $this->table.'.id AS id,'.
          $this->table.'.username AS username'
        );
        $this->db->from($this->table);
        $this->db->join('customers', 'customers.id = '.$this->table.'.customer_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
      }
      $this->db->select('*');
      $this->db->from($this->table);
      $this->db->join('customers', 'customers.id = '.$this->table.'.customer_id', 'left');
      $this->db->where($this->table.'.id', $id);
      $query = $this->db->get();
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

    public function create() {
      $data = array (
        'username'    => $this->input->post('username'),
        'password'    => $this->input->post('password'),
        'customer_id' => $this->session->customerId     //webs
      );

      return $this->db->insert($this->table, $data);
    }

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
