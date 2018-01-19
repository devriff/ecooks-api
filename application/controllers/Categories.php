<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends BaseController {

  public function get_categories () {
    $this->view_data['categories'] = $this->Category->_get_categories();
    if ($this->view_data['categories']) {
      $data['success'] = true;
      $data['data'] = $this->view_data['categories'];
      echo json_encode($data);
    }
  }
}