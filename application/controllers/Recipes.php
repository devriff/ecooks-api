<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends BaseController {

  public function __construct () {
    parent::__construct();
  }

  public function get_recipes ($category_id) {
    $result = $this->Recipe->_get_recipes($category_id);
    if ($result) {
      $data['status'] = true;
      $data['data'] = $result;
      echo json_encode($data);
    }
  }

  public function get_recipe ($recipe_id) {
    $result = $this->Recipe->_get_recipe($recipe_id);
    if ($result) {
      $data['status'] = true;
      $data['data'] = $result;
      echo json_encode($data);
    }
  }
}