<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function edit($uID)
  {
    $email = $this->session->email;
    $data['user'] = $this->Profile_model->getuser($email);
    $data['users'] = $this->User_model->getUserByID($uID);

    $this->form_validation->set_rules('username', 'Username', 'required');

    if ($this->form_validation->run() == false) {
      $data['content'] = $this->load->view('data/edit', $data, true);
      $this->load->view('layouts/dashboard', $data);
      $this->session->set_flashdata('error', 'Isi data user dengan benar');
    } else {
      $this->User_model->update($uID);
      $this->session->set_flashdata('success', 'Berhasil Mengubah data User');
      redirect('dashboard/data');
    }
  }
  public function delete($uID)
  {
    $data['user'] = $this->db->get_where('user', ['id' => $uID])->row();

    $image = $data['user']->image;
    if ($image != 'default.jpg') {
      unlink(FCPATH . 'assets/img/user/' . $image);
    }

    $this->db->delete('user', ['id' => $uID]);
    $this->session->set_flashdata('success', 'Berhasil Menghapus data user');
    redirect('dashboard/data');
  }
}
