<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $nama       = $this->input->post('nama');
        $barang     = $this->input->post('barang');
        $nomor      = $this->input->post('nomor');
        header("location:https://api.whatsapp.com/send?phone=$nomor&text=Nama:%20$nama%20%0DBarang:%20$barang");
    }
}
