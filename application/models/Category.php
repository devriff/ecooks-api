<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Model {
  
  public function __construct () {
    parent::__construct();
  }

  public function _save_category ($data = FALSE) {
    $this->db->insert('categories', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _get_categories(){
    $query = $this->db
            ->select('*')
            ->get('categories');
    return $query->result() >= 1 ? $query->result_array() : FALSE;
  }
}