<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima_bantuan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function updateAktif($id = null)
  {
    $pengajuan = $this->db->get_where('pengajuan', ['id' => $id])->row();
    if ($pengajuan) {
      if ($pengajuan->status == 1) {
        $data = [
          'status' => 0
        ];
        $this->db->where('id', $pengajuan->id);
        $this->db->update('pengajuan', $data);
        $this->session->set_flashdata('success', 'berhasil menonaktivasi pengajuan BLT');
        redirect('dashboard');
      } else {
        $data = [
          'status' => 1
        ];
        $this->db->where('id', $pengajuan->id);
        $this->db->update('pengajuan', $data);
        $this->session->set_flashdata('success', 'berhasil mengaktivasi penerima BLT');
        redirect('dashboard');
      }
    }
  }
  public function updateCetak($id = null)
  {
    $pengajuan = $this->db->get_where('pengajuan', ['id' => $id])->row();
    if ($pengajuan) {
      if ($pengajuan->printed == 1) {
        $data = [
          'printed' => 0
        ];
        $this->db->where('id', $pengajuan->id);
        $this->db->update('pengajuan', $data);
        $this->session->set_flashdata('success', 'berhasil menonaktivasi pengajuan BLT');
        redirect('dashboard');
      }
    }
  }
}
