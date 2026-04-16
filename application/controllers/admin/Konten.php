<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Proteksi: Hanya yang sudah login bisa masuk
        if($this->session->userdata('level') == NULL){
            redirect('auth');
        }
    }

    public function index(){
        // Ambil data kategori untuk dropdown di Modal
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori','ASC');
        $kategori = $this->db->get()->result_array();

        // Ambil data konten dengan JOIN (Kategori & User)
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'Halaman Konten',
            'kategori'      => $kategori,
            'konten'        => $konten
        );
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    public function simpan(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']      = 'assets/upload/konten/';
        $config['max_size']         = 500; // 500Kb
        $config['file_name']        = $namafoto;
        $config['allowed_types']    = 'jpg|jpeg|png';
        $this->load->library('upload', $config);

        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade">
                    Ukuran foto terlalu besar, maksimal 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('admin/konten');
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        // Cek Judul Double
        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();
        if($cek <> NULL){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade">Judul konten sudah ada!</div>');
            redirect('admin/konten');
        }

        $data = array(
            'judul'         => $this->input->post('judul'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'keterangan'    => $this->input->post('keterangan'),
            'tanggal'       => date('Y-m-d'),
            'foto'          => $namafoto,
            'username'      => $this->session->userdata('username'),
            'slug'          => str_replace(' ', '-', $this->input->post('judul')),
        );
        $this->db->insert('konten', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible show fade">Berhasil menambahkan konten.</div>');
        redirect('admin/konten');
    }

    public function update(){
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']      = 'assets/upload/konten/';
        $config['max_size']         = 500;
        $config['file_name']        = $namafoto;
        $config['overwrite']        = true; // Part 11: Menimpa file lama
        $config['allowed_types']    = 'jpg|jpeg|png';
        $this->load->library('upload', $config);

        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible show fade">Foto kegedean!</div>');
            redirect('admin/konten');
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }

        $data = array(
            'judul'         => $this->input->post('judul'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'keterangan'    => $this->input->post('keterangan'),
            'slug'          => str_replace(' ', '-', $this->input->post('judul')),
        );
        $where = array('foto' => $this->input->post('nama_foto'));
        $this->db->update('konten', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible show fade">Berhasil update konten.</div>');
        redirect('admin/konten');
    }

    public function delete_data($id){
        $filename = FCPATH.'/assets/upload/konten/'.$id;
        if (file_exists($filename)){ unlink($filename); } // Hapus file fisik
        $where = array('foto' => $id);
        $this->db->delete('konten', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible show fade">Konten dihapus.</div>');
        redirect('admin/konten');
    }
}