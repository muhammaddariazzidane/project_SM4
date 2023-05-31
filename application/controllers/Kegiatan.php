<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function edit($id)
  {
    $email = $this->session->email;
    $data['user'] = $this->Profile_model->getuser($email);
    $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row();
    $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    if ($this->form_validation->run() == false) {

      $data['content'] = $this->load->view('kegiatan/edit', $data, true);
      $this->load->view('layouts/dashboard', $data);
    } else {
      $foto_kegiatan_old = $data['kegiatan']->foto_kegiatan;
      $user_id = $data['kegiatan']->user_id;

      $this->Kegiatan_model->update($id, $foto_kegiatan_old, $user_id);
    }
  }
  public function delete($id)
  {
    // mengambil data berdasarkan parameter $id untuk menghapus gambar nya
    $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row();
    unlink(FCPATH . 'assets/img/kegiatan/' . $data['kegiatan']->foto_kegiatan);
    // Menghapus komentar
    $this->db->delete('comment_kegiatan', ['kegiatan_id' => $id]);
    // hapus kegiatan
    $this->db->delete('kegiatan', ['id' => $id]);
    $this->session->set_flashdata('success', 'Berhasil Menghapus kegiatan');
    redirect('dashboard/kegiatan');
  }
}
