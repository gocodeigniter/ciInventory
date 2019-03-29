<?php
class Ruang_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "ruang";

  public function __construct()
  {
    $this->load->database();
  }

  public function all()
  {
    $query = $this->db->get(self::TABLE_NAME);
    return $query->result_array();
  }

}
