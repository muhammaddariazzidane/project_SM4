<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
  public function store_berita()
  {
    $this->form_validation->set_rules('body', 'Komentar', 'required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'komentar harus diisi');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      $data = [
        'user_id' => $this->session->id,
        'berita_id' => $this->input->post('berita_id'),
        'body' => $this->input->post('body'),
        'post_at' => time()
      ];
      $this->db->insert('comment_berita', $data);
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
  public function delete($id)
  {
    $this->db->delete('comment_berita', ['id' => $id]);
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function store_kegiatan()
  {
    $this->form_validation->set_rules('body', 'Komentar', 'required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'komentar harus diisi');
      redirect($_SERVER['HTTP_REFERER']);
    } else {

      $data = [
        'user_id' => $this->session->id,
        'kegiatan_id' => $this->input->post('kegiatan_id'),
        'body' => $this->input->post('body'),
        'post_at' => time()
      ];
      $this->db->insert('comment_kegiatan', $data);
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
  public function c_delete($id)
  {
    $this->db->delete('comment_kegiatan', ['id' => $id]);
    redirect($_SERVER['HTTP_REFERER']);
  }
}
