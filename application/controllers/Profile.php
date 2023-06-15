<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function index()
  {

    $username = $this->input->post('username');
    $email = $this->session->userdata('email');

    $this->form_validation->set_rules('username', 'Username', 'required');

    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] = $this->Profile_model->getuser($email);

      $data['content'] = $this->load->view('profile/index', $data, true);

      $data['title'] = 'Profile';
      $this->load->view('layouts/dashboard', $data);
      $this->session->set_flashdata('error', 'Username tidak boleh kosong');
    } else {
      $image = $_FILES['image']['name'];
      if ($image) {
        // Konfigurasi untuk upload gambar
        $config['upload_path'] = './assets/img/user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $uploaded_image = $this->upload->data();
          $image = $uploaded_image['file_name'];

          $data = [
            'username' => $username
          ];

          if ($image) {
            $data['image'] = $image;
          }
          // Dapatkan data user untuk mendapatkan nama file gambar lama
          $user = $this->db->get_where('user', ['email' => $email])->row();
          $old_image = $user->image;

          $this->db->where('email', $email);
          $this->db->update('user', $data);

          // Hapus gambar lama jika ada
          if ($old_image != 'default.jpg' && file_exists(FCPATH . 'assets/img/user/' . $old_image)) {
            unlink('./assets/img/user/' . $old_image);
          }
          // Simpan informasi perubahan gambar jika ada
          $this->session->set_flashdata('success', 'Berhasil Update profile dengan gambar');
        } else {
          echo $this->upload->display_errors();
          die;
        }
      } else {
        $data = [
          'username' => $username
        ];

        $this->db->where('email', $email);
        $this->db->update('user', $data);

        // Tidak ada perubahan gambar
        $this->session->set_flashdata('success', 'Berhasil Update profile');
      }

      redirect('profile');
    }

    // $email = $this->session->userdata('email');
    // $data['user'] = $this->Profile_model->getuser($email);
    // $data['content'] = $this->load->view('profile/index', $data, true);


    // $this->load->view('layouts/dashboard', $data);
  }
  // public function update()
  // {
  //   $username = $this->input->post('username');
  //   $email = $this->session->userdata('email');

  //   $this->form_validation->set_rules('username', 'Username', 'required');

  //   if ($this->form_validation->run() == false) {
  //     $this->session->set_flashdata('error', 'Data tidak boleh kosong');
  //     redirect('profile');
  //   } else {
  //     $image = $_FILES['image']['name'];
  //     if ($image) {
  //       // Konfigurasi untuk upload gambar
  //       $config['upload_path'] = './assets/img/user/';
  //       $config['allowed_types'] = 'gif|jpg|png';
  //       $config['max_size'] = 2048; // 2MB
  //       $config['encrypt_name'] = TRUE;

  //       $this->load->library('upload', $config);

  //       if ($this->upload->do_upload('image')) {
  //         $uploaded_image = $this->upload->data();
  //         $image = $uploaded_image['file_name'];

  //         $data = array(
  //           'username' => $username
  //         );

  //         if ($image) {
  //           $data['image'] = $image;
  //         }
  //         // Dapatkan data user untuk mendapatkan nama file gambar lama
  //         $user = $this->db->get_where('user', array('email' => $email))->row();
  //         $old_image = $user->image;

  //         $this->db->where('email', $email);
  //         $this->db->update('user', $data);

  //         // Hapus gambar lama jika ada
  //         if ($old_image != 'default.jpg' && file_exists(FCPATH . 'assets/img/user/' . $old_image)) {
  //           unlink('./assets/img/user/' . $old_image);
  //         }
  //         // Simpan informasi perubahan gambar jika ada
  //         $this->session->set_flashdata('success', 'Berhasil Update profile dengan gambar');
  //       } else {
  //         echo $this->upload->display_errors();
  //         die;
  //       }
  //     } else {
  //       $data = array(
  //         'username' => $username
  //       );

  //       $this->db->where('email', $email);
  //       $this->db->update('user', $data);

  //       // Tidak ada perubahan gambar
  //       $this->session->set_flashdata('success', 'Berhasil Update profile');
  //     }

  //     redirect('profile');
  //   }
  // }
}
