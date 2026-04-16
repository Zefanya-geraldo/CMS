<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('carousel');
        $carousel = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul'     => 'Beranda | ' . $konfig->judul_website,
            'konfig'    => $konfig,
            'kategori'  => $kategori,
            'carousel'  => $carousel,
            'konten'    => $konten,
        );
        $this->load->view('beranda', $data);
    }

    public function artikel($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->where('slug', $id); 
        $konten = $this->db->get()->row();

        $data = array(
            'judul'     => $konten->judul . " | " . $konfig->judul_website,
            'konfig'    => $konfig,
            'kategori'  => $kategori,
            'konten'    => $konten,
        );
        $this->load->view('detail', $data);
    }

    public function kategori($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        $nama_kategori = $this->db->get()->row()->nama_kategori;

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->where('a.id_kategori', $id); 
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul'         => $nama_kategori . " | " . $konfig->judul_website,
            'nama_kategori' => $nama_kategori,
            'konfig'        => $konfig,
            'kategori'      => $kategori,
            'konten'        => $konten,
        );
        $this->load->view('kategori', $data);
    }
}