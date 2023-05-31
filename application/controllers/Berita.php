<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function edit($id)
  {
    $email = $this->session->email;
    $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row();
    $data['user'] = $this->Profile_model->getuser($email);
    $this->form_validation->set_rules('nama_berita', 'Nama Berita', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    if ($this->form_validation->run() == false) {
      $data['content'] = $this->load->view('berita/edit', $data, true);
      // ini adalah layout nya
      $this->load->view('layouts/dashboard', $data);
      $this->session->set_flashdata('error', 'Semua field harus terisi dengan benar');
    } else {
      $foto_berita_old = $data['berita']->foto_berita;
      $user_id = $data['berita']->user_id;

      $this->Berita_model->update($id, $foto_berita_old, $user_id);
    }
  }
  public function delete($id)
  {

    // Menghapus gambar
    $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row();
    unlink(FCPATH . 'assets/img/berita/' . $data['berita']->foto_berita);

    // Menghapus komentar
    $this->db->delete('comment_berita', ['berita_id' => $id]);

    // Menghapus berita
    $this->db->delete('berita', ['id' => $id]);

    $this->session->set_flashdata('success', 'Berhasil Menghapus berita');
    redirect('dashboard/berita');
  }
}
