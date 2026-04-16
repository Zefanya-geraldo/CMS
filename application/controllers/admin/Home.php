<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

public function __construct(){
    parent::__construct();
    // SATPAM: Jika belum login (id_user kosong), tendang balik ke halaman login
    if($this->session->userdata('level') == NULL){
        redirect('auth');
    }
    // Load model statistik
    $this->load->model('Statistik_model');
}

    public function index() {
        // Ambil semua statistik dari database
        $statistik = $this->Statistik_model->get_semua_statistik();
        
        $data = array(
            'judul_halaman' => 'Dashboard Admin',
            'total_konten' => $statistik['total_konten'],
            'total_kategori' => $statistik['total_kategori'],
            'total_carousel' => $statistik['total_carousel'],
            'total_user' => $statistik['total_user'],
            'konten_terbaru' => $statistik['konten_terbaru']
        );
        
        // FUNGSI INI YANG PENTING:
        // Parameter 1: 'template_admin' (Nama file view template Mazer utama Anda)
        // Parameter 2: 'admin/dashboard' (Nama file view konten isinya saja)
        // Parameter 3: $data (Data judul, dll)
        $this->template->load('template_admin', 'admin/dashboard', $data);
    }
}