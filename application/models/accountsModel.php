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
        $this->db->join(
          'customers',
          'customers.id = '.$this->table.'.customer_id',
          'left'
        );
        $query = $this->db->get();
        return $query->result_array();
      }
      $this->db->select(
        $this->table.'.id as id,'.
        $this->table.'.username AS username,'.
        $this->table.'.role_value AS role_value,'.
        'customers.id AS c_id,'.
        'customers.first_name AS first_name,'.
        'customers.last_name AS last_name,'.
        'customers.street AS street,'.
        'customers.number AS number,'.
        'customers.extra_info AS extra_info,'.
        'customers.city AS city,'.
        'customers.postal_code'
      );
      $this->db->from($this->table);
      $this->db->join(
        'customers',
        'customers.id = '.$this->table.'.customer_id',
        'left'
      );
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

    public function update($id) {
      $data = array(
        'username' => $this->input->post('username'),
      );

      $this->db->where('id', $id);
      $this->db->update($this->table, $data);
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
