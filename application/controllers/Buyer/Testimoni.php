<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

  
    public function __construct()
    {
      parent::__construct();
      $this->load->model('model_buyer_testimoni'); 
    }

    public function index() 
    {

      $this->form_validation->set_rules('nama', 'Nama', 'required', array(
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
          'title' => 'Testimoni',
          'isi' => 'buyer/produk',
        );
        $this->load->view('template/halaman', $data, FALSE);
      } else {
        $data = array(
          'nama' => $this->input->post('nama'),
          'subjek' => $this->input->post('subjek'),
          'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->model_buyer_testimoni->testimoni($data);
        $this->session->set_flashdata('pesan', 'Terimakasih, Testimoni Anda Sudah Kami Terima :)');
        redirect('buyer/produk');
      }
  
      if ($this->form_validation->run() == TRUE) {
        $field_name = "testimoni";
        if (!$this->upload->do_upload($field_name)) {
          $data = array(
            'title' => 'Testimoni',
            'testimoni' => $this->model_buyer_testimoni->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'template/halaman',
          );
          $this->load->view('template/halaman', $data, FALSE);
        } else {
          $upload_data	= array('uploads' => $this->upload->data());
          $data = array(
            'nama' => $this->input->post('nama'),
            'subjek' => $this->input->post('subjek'),
            'deskripsi' => $this->input->post('deskripsi'),
          );
        }
      }

    }

    public function tampilTestimoni(){
		$data = array(
			'title' => 'Testimoni',
			'testimoni' => $this->model_buyer_testimoni->get_all_data(),
			'isi' => 'testimoni',
		);
		$this->load->view('template/halaman', $data, FALSE);
	}
}