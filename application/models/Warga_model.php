<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga_model extends CI_Model
{
  public function store()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'agama' => $this->input->post('agama'),
      'status_perkawinan' => $this->input->post('status_perkawinan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'kewarganegaraan' => "INDONESIA",
    ];
    $this->db->insert('warga', $data);
  }
  public function update($id)
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'agama' => $this->input->post('agama'),
      'status_perkawinan' => $this->input->post('status_perkawinan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'kewarganegaraan' => "INDONESIA",
    ];
    $this->db->where('id', $id);
    $this->db->update('warga', $data);
  }
}
