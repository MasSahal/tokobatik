<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

  
    public function __construct()
    {
      parent::__construct();
      $this->load->model('model_buyer_saran'); 
    }

    public function index() 
    {

      $this->form_validation->set_rules('nama', 'Nama', 'required', array(
        'required' => '%s Haris Diisi Yaa!'
      ));
      $this->form_validation->set_rules('email', 'E-mail', 'required', array(
        'required' => '%s Haris Diisi Yaa!'
      ));
      $this->form_validation->set_rules('subjek', 'Subjek', 'required', array(
        'required' => '%s Haris Diisi Yaa!'
      ));
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
        'required' => '%s Haris Diisi Yaa!'
      ));

      if ($this->form_validation->run() == FALSE) {
        $data = array(
          'title' => 'Saran',
          'isi' => 'home',
        );
        $this->load->view('template/halaman', $data, FALSE);
      } else {
        $data = array(
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'subjek' => $this->input->post('subjek'),
          'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->model_buyer_saran->saran($data);
        $this->session->set_flashdata('pesan', 'Terimakasih, saran anda sudah kami terima :)');
        redirect('buyer/saran');
      }
  
      if ($this->form_validation->run() == TRUE) {
        $field_name = "saran";
        if (!$this->upload->do_upload($field_name)) {
          $data = array(
            'title' => 'Saran',
            'saran' => $this->model_buyer_saran->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'template/halaman',
          );
          $this->load->view('template/halaman', $data, FALSE);
        } else {
          $upload_data	= array('uploads' => $this->upload->data());
          $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'subjek' => $this->input->post('subjek'),
            'deskripsi' => $this->input->post('deskripsi'),
          );
        }
      }

    }
}