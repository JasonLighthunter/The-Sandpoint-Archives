<?php
  class CustomersModel extends CI_Model {
    private $table = 'customers';

    public function __construct() {
      $this->load->database();
    }

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

    public function getByData($data = FALSE) {
      if($data === FALSE) {
        return FALSE;
      }
      $this->db->select_max('id');
      $this->db->from($this->table);
      $this->db->where($data);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function delete($id) {
      if($id !== FALSE) {
        $this->db->delete(
          $this->table,
          array ('id' => $id)
        );
      }
    }

    public function update($id) {
      $inputData = array (
        'first_name'  => $this->input->post('first-name'),
        'last_name'   => $this->input->post('last-name'),
        'street'      => $this->input->post('street'),
        'number'      => $this->input->post('number'),
        'extra_info'  => $this->input->post('extra-info'),
        'city'        => $this->input->post('city'),
        'postal_code' => $this->input->post('postal-code')
      );
      $this->db->where('id', $id);
      $this->db->update($this->table, $inputData);
    }

    public function create($data = FALSE) {
      if($data === FALSE) {
        $inputData = array (
          'first_name'  => $this->input->post('first-name'),
          'last_name'   => $this->input->post('last-name'),
          'street'      => $this->input->post('street'),
          'number'      => $this->input->post('number'),
          'extra_info'  => $this->input->post('extra-info'),
          'city'        => $this->input->post('city'),
          'postal_code' => $this->input->post('postal-code')
        );
      } else {
        $inputData = $data;
      }
      return $this->db->insert($this->table, $inputData);
    }
  }
?>
