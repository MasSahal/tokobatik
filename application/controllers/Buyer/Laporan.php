<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  
    public function __construct()
    {
      parent::__construct();
      $this->load->model('model_buyer_laporan'); 
    }

    public function index() 
    {

      $this->form_validation->set_rules('nama', 'Nama', 'required', array(
        'required' => '%s Haris Diisi !!!'
      ));
      $this->form_validation->set_rules('email', 'E-mail', 'required', array(
        'required' => '%s Haris Diisi !!!'
      ));
      $this->form_validation->set_rules('subjek', 'Subjek', 'required', array(
        'required' => '%s Haris Diisi !!!'
      ));
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
        'required' => '%s Haris Diisi !!!'
      ));

      if ($this->form_validation->run() == FALSE) {
        $data = array(
          'title' => 'Pengajuan Laporan',
          'isi' => 'v_laporan_buyer',
        );
        $this->load->view('template/halaman', $data, FALSE);
      } else {
        $data = array(
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'subjek' => $this->input->post('subjek'),
          'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->model_buyer_laporan->laporan($data);
        $this->session->set_flashdata('pesan', 'Terimakasih, laporan anda akan segera kami proses');
        redirect('buyer/laporan');
      }
  
      if ($this->form_validation->run() == TRUE) {
        $field_name = "laporan";
        if (!$this->upload->do_upload($field_name)) {
          $data = array(
            'title' => 'Laporan',
            'laporan' => $this->model_buyer_laporan->get_all_data(),
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