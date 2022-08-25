<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index() 
    {
      $this->load->view('template/header.php');
      $this->load->view('v_blog.php');
      $this->load->view('template/footer.php');
    }
}