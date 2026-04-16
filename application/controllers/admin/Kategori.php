<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // Cek login: Jika belum login, tendang ke halaman auth
        if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }

    public function index() {
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Kategori Konten',
            'kategori'      => $kategori
        );
        $this->template->load('template_admin', 'admin/kategori_index', $data);
    }

    public function simpan() {
        // Cek apakah nama kategori sudah ada
        $nama_kategori = $this->input->post('nama_kategori');
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $nama_kategori);
        $cek = $this->db->get()->result_array();

        if($cek <> NULL){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade">
                    Kategori konten sudah digunakan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('admin/kategori');
        }

        // Simpan data tanpa menggunakan Model (langsung di Controller)
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori', $data);
        
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible show fade">
                Berhasil menambahkan kategori.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/kategori');
    }

    public function delete($id) {
        $where = array('id_kategori' => $id);
        $this->db->delete('kategori', $where);
        
        $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible show fade">
                Berhasil menghapus kategori.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/kategori');
    }

    public function update() {
        $where = array('id_kategori' => $this->input->post('id_kategori'));
        $data = array('nama_kategori' => $this->input->post('nama_kategori'));
        $this->db->update('kategori', $data, $where);
        
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible show fade">
                Berhasil memperbarui kategori.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('admin/kategori');
    }
}