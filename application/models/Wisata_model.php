<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{
  public function store()
  {
    $nama_wisata = $this->input->post('nama_wisata');
    $deskripsi = $this->input->post('deskripsi');

    $upload_config['upload_path'] = './assets/img/wisata/';
    $upload_config['allowed_types'] = 'gif|jpg|png';
    $upload_config['max_size'] = 12048; // 2MB
    $upload_config['encrypt_name'] = TRUE;

    $this->load->library('upload', $upload_config);
    // menangkap field foto_kegiatan dan mengambil nama gambar nya
    if (!$this->upload->do_upload('foto_pertama')) {
      // Jika gagal upload, tampilkan error
      echo $this->upload->display_errors();
      // $this->load->view('tambah_wisata', $error);
    } else {
      // Jika berhasil upload, ambil nama file
      $file_pertama = $this->upload->data('file_name');
      // Upload foto kedua (jika ada)
      if ($this->upload->do_upload('foto_kedua')) {
        $file_kedua = $this->upload->data('file_name');
      } else {
        $file_kedua = '';
      }
      // Upload foto ketiga (jika ada)
      if ($this->upload->do_upload('foto_ketiga')) {
        $file_ketiga = $this->upload->data('file_name');
      } else {
        $file_ketiga = '';
      }
      // Simpan data ke dalam database
      $data = [
        'nama_wisata' => $nama_wisata,
        'deskripsi' => $deskripsi,
        'foto_pertama' => $file_pertama,
        'foto_kedua' => $file_kedua,
        'foto_ketiga' => $file_ketiga
      ];
      $this->db->insert('wisata', $data);

      $this->session->set_flashdata('success', 'Berhasil menambahkan wisata');
      // Redirect ke halaman daftar wisata
      redirect('dashboard/wisata');
    }
  }
  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('wisata', $data);
  }
}
