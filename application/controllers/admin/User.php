<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
    parent::__construct();
    // INI YANG KURANG: Kamu harus memanggil model agar bisa digunakan
    $this->load->model('User_model');

    // SATPAM: Jika belum login, tendang balik ke halaman login
    if($this->session->userdata('level') == NULL){
        redirect('auth');
    }
}    public function index() {
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Data Pengguna',
            'user'          => $user
        );
        $this->template->load('template_admin', 'admin/user_index', $data);
    }

    public function simpan() {
        // 1. Cek apakah username sudah ada di database
        $username = $this->input->post('username');
        $this->db->from('user');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();

        // 2. Jika username ditemukan (tidak kosong)
        if($cek <> NULL){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade">
                    Username sudah ada, silakan gunakan username lain!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/user');
        }

        $this->User_model->simpan();
        
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible show fade">
                Berhasil menambahkan user baru.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/user');
    }

    public function delete($id) {
    $where = array('id_user' => $id);
    $this->db->delete('user', $where);
    
    $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Berhasil menghapus user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ');
    redirect('admin/user');
}

public function update() {
    // Memanggil fungsi update yang ada di User_model
    $this->User_model->update();
    
    $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil memperbarui data user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ');
    redirect('admin/user');
}
}