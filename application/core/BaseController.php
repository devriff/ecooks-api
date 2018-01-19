<?php
class BaseController Extends CI_Controller {
  function __construct() {
    parent::__construct();
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header('Content-Type: application/json');
    $this->load->model('Category');
    $this->load->model('Recipe');
  }
}