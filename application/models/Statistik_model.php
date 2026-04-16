<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_model extends CI_Model {

    /**
     * Ambil total konten dari database
     */
    public function get_total_konten() {
        return $this->db->count_all('konten');
    }

    /**
     * Ambil total kategori dari database
     */
    public function get_total_kategori() {
        return $this->db->count_all('kategori');
    }

    /**
     * Ambil total carousel dari database
     */
    public function get_total_carousel() {
        return $this->db->count_all('carousel');
    }

    /**
     * Ambil total user admin dari database
     */
    public function get_total_user() {
        return $this->db->count_all('user');
    }

    /**
     * Ambil konten terbaru
     */
    public function get_konten_terbaru($limit = 5) {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

    /**
     * Ambil semua statistik sekaligus
     */
    public function get_semua_statistik() {
        return array(
            'total_konten' => $this->get_total_konten(),
            'total_kategori' => $this->get_total_kategori(),
            'total_carousel' => $this->get_total_carousel(),
            'total_user' => $this->get_total_user(),
            'konten_terbaru' => $this->get_konten_terbaru(5)
        );
    }
}
