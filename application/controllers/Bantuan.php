<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function edit($id)
  {
    $this->form_validation->set_rules('nama_bantuan', 'Nama Bantuan', 'required');
    $this->form_validation->set_rules('jenis', 'Jenis', 'required');
    if ($this->form_validation->run() == false) {
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);
      $data['bantuan'] = $this->db->get_where('bantuan', ['id' => $id])->row();

      $data['content'] = $this->load->view('bantuan/edit', $data, true);
      $this->load->view('layouts/dashboard', $data);
    } else {
      $this->Bantuan_model->update($id);
      $this->session->set_flashdata('success', 'Berhasil mengubah bantuan');
      redirect('dashboard/bantuan');
    }
  }
  public function delete($id)
  {
    $this->db->delete('bantuan', ['id' => $id]);
    $this->session->set_flashdata('success', 'Berhasil menghapus bantuan');
    redirect('dashboard/bantuan');
  }
}
