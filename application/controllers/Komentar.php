<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
  public function store_berita()
  {
    $data = [
      'user_id' => $this->session->id,
      'berita_id' => $this->input->post('berita_id'),
      'body' => $this->input->post('body'),
      'post_at' => time()
    ];
    $this->db->insert('comment_berita', $data);
    // redirect back
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function store_kegiatan()
  {
    $data = [
      'user_id' => $this->session->id,
      'kegiatan_id' => $this->input->post('kegiatan_id'),
      'body' => $this->input->post('body'),
      'post_at' => time()
    ];
    $this->db->insert('comment_kegiatan', $data);
    // redirect back
    redirect($_SERVER['HTTP_REFERER']);
  }
}
