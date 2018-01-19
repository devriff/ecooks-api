<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recipe extends CI_Model {
  
  public function __construct () {
    parent::__construct();
  }

  public function _save_recipe ($data = FALSE) {
    $this->db->insert('recipes', $data);
    return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
  }

  public function _get_recipes ($category_id) {
    if ($category_id) {
      $query = $this->db
      ->select('*')
      ->from('recipes')
      ->where('category_id', $category_id)
      ->get();
      return $query->result() >= 1 ? $query->result_array() : FALSE;
    } else {
      $query = $this->db
      ->select('recipes.recipe_id, recipes.name as recipe, recipes.instructions, recipes.img_url, categories.name as category')
      ->from('recipes')
      ->join('categories', 'categories.category_id = recipes.category_id')
      ->get();
      return $query->result() >= 1 ? $query->result_array() : FALSE;
    }
  }

  public function _get_recipe ($recipe_id) {
      $query = $this->db
      ->select('recipes.recipe_id, recipes.name as recipe, recipes.instructions, recipes.img_url, categories.name as category')
      ->from('recipes')
      ->join('categories', 'categories.category_id = recipes.category_id')
      ->where('recipes.recipe_id', $recipe_id)
      ->get();
      return $query->result() >= 1 ? $query->result_array() : FALSE;
  }
}