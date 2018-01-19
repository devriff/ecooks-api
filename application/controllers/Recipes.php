<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends BaseController {

  public function get_recipes ($category_id = false) {
    if ($category_id) {
      $result = $this->Recipe->_get_recipes($category_id);
      if ($result) {
        $data['status'] = true;
        $data['data'] = $result;
        echo json_encode($data);
      }
    } else {
      $result = $this->Recipe->_get_recipes();
      if ($result) {
        $data['status'] = true;
        $data['data'] = $result;
        echo json_encode($data);
      }
    }
  }

  public function get_recipe ($recipe_id = false) {
    $result = $this->Recipe->_get_recipe($recipe_id);
    if ($result) {
      $data['status'] = true;
      $data['data'] = $result;
      echo json_encode($data);
    }
  }

  public function search_recipes () {
    $keywords = $this->input->get('keywords');
    $result = $this->Recipe->_search_recipes($keywords);
    if ($result) {
      $data['status'] = true;
      $data['data'] = $result;
      echo json_encode($data);
    } else {
      $data['status'] = false;
      $data['data'] = $result;
      echo json_encode($data);
    }
  }
}