<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends PrivateController {

  public function __construct () {
    parent::__construct();
    $this->load->model('Category');
    $this->load->model('Recipe');
  }
	public function index () {
    $this->view_data['categories'] = $this->Category->_get_categories();
    $this->view_data['recipes'] = $this->Recipe->_get_recipes(false);
	}

  public function add_category () {
    $data['name'] = $this->input->post('name');
    $data['description'] = $this->input->post('description');
    $result = $this->Category->_save_category($data);
    if ($result) {
      $this->_msg('s','Category Added!', site_url('Dashboard'));
    } else {
      $this->_msg('e','Error to add Category!', site_url('Dashboard'));
    }
  }

  public function add_recipe () {
    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 5000;
    $new_name = time().$_FILES["img_url"]['name'];
    $config['file_name'] = $new_name;

    $save_data['name'] = $this->input->post('name');
    $save_data['description'] = $this->input->post('description');
    $save_data['category_id'] = $this->input->post('category_id');
    $save_data['ingredients'] = $this->input->post('ingredients');
    $save_data['instructions'] = $this->input->post('instructions');
    $save_data['img_url'] = $config['file_name'];
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('img_url')) {
      $this->_msg('e','Error!', site_url('Dashboard'));
    } else {
      $data = array('upload_data' => $this->upload->data());
      $result = $this->Recipe->_save_recipe($save_data);
      if ($result) {
        $this->_msg('s','Recipe Added!', site_url('Dashboard'));
      } else {
        $this->_msg('e','Error to add Recipe!', site_url('Dashboard'));
      }
    }
  }
}
