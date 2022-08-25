<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_kategori');
  }

  public function index()
  {
    $data = [
      'kategori' => $this->model_kategori->get_all_data(),
    ];

    $this->load->view('template/header.php', $data);
    $this->load->view('landing.php');
    $this->load->view('template/footer1.php');
  }

  public function landing2()
  {
    $this->load->view('template/header.php');
    $this->load->view('landing2.php');
    $this->load->view('template/footer1.php');
  }
}
