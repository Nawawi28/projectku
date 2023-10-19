<?php
class Supplier_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function tambah_supplier($data)
  {
    $this->db->insert('supplier', $data);
  }
}
