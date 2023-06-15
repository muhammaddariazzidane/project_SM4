<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan_model extends CI_Model
{
  public function store()
  {
    $data = [
      'nama_bantuan' => $this->input->post('nama_bantuan'),
      'jenis' => $this->input->post('jenis'),
    ];
    if ($this->input->post('nominal')) {
      $data['nominal'] = $this->input->post('nominal');
    }
    $this->db->insert('bantuan', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan bantuan');
  }
  public function update($id)
  {
    $data = [
      'nama_bantuan' => $this->input->post('nama_bantuan'),
      'jenis' => $this->input->post('jenis')
    ];
    if ($this->input->post('nominal')) {
      $data['nominal'] = $this->input->post('nominal');
    }
    $this->db->where('id', $id);
    $this->db->update('bantuan', $data);
  }
}
