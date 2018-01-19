<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recipe extends CI_Model {
  
  public function __construct () {
    parent::__construct();
  }

  public function _save_recipe ($data = false) {
    $this->db->insert('recipes', $data);
    return $this->db->affected_rows() >= 1 ? true : false;
  }

  public function _get_recipes ($category_id = false) {
    if ($category_id) {
      $query = $this->db
      ->select('*')
      ->from('recipes')
      ->where('category_id', $category_id)
      ->get();
      return $query->result() >= 1 ? $query->result_array() : false;
    } else {
      $query = $this->db
      ->select('recipes.recipe_id, recipes.name as recipe, recipes.instructions, recipes.img_url, categories.name as category')
      ->from('recipes')
      ->join('categories', 'categories.category_id = recipes.category_id')
      ->get();
      return $query->result() >= 1 ? $query->result_array() : false;
    }
  }

  public function _get_recipe ($recipe_id = false) {
      $query = $this->db
      ->select('recipes.recipe_id, recipes.name as recipe, recipes.ingredients, recipes.instructions, recipes.img_url, categories.name as category')
      ->from('recipes')
      ->join('categories', 'categories.category_id = recipes.category_id')
      ->where('recipes.recipe_id', $recipe_id)
      ->get();
      return $query->result() >= 1 ? $query->row() : false;
  }

  public function _search_recipes ($keyword = false) {
    if ($keyword) {
      $query="SELECT *
      FROM recipes
      WHERE name LIKE ?";
      $result = $this->db->query($query, array('%'.$keyword.'%')); 
      return $result->num_rows()>=1 ? $result->result() : false; 
    } else {
      return false;
    }
  }
}