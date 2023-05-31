
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function edit($id)
  {
    $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|max_length[20]');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    $data['wisata'] = $this->db->get_where('wisata', ['id' => $id])->row();
    $email = $this->session->email;
    $data['user'] = $this->Profile_model->getuser($email);
    if ($this->form_validation->run() == false) {
      // form validation fails
      $data['content'] = $this->load->view('wisata/edit', $data, true);
      $this->load->view('layouts/dashboard', $data);
    } else {
      // foto baru
      $foto_pertama = $_FILES['foto_pertama']['name'];
      $foto_kedua = $_FILES['foto_kedua']['name'];
      $foto_ketiga = $_FILES['foto_ketiga']['name'];
      // foto lama
      $old_foto_pertama = $data['wisata']->foto_pertama;
      $old_foto_kedua = $data['wisata']->foto_kedua;
      $old_foto_ketiga = $data['wisata']->foto_ketiga;

      $config['upload_path'] = './assets/img/wisata/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size'] = 12048; // 2MB
      $config['encrypt_name'] = true;

      $this->load->library('upload', $config);

      if ($foto_pertama) {
        if ($this->upload->do_upload('foto_pertama')) {
          $new_foto_pertama = $this->upload->data();
          $new_foto_pertama = $new_foto_pertama['file_name'];
          $data['foto_pertama'] = $new_foto_pertama;
          unlink(FCPATH . 'assets/img/wisata/' . $old_foto_pertama);
        }
      }

      if ($foto_kedua) {
        if ($this->upload->do_upload('foto_kedua')) {
          $new_foto_kedua = $this->upload->data();
          $new_foto_kedua = $new_foto_kedua['file_name'];
          $data['foto_kedua'] = $new_foto_kedua;
          unlink(FCPATH . 'assets/img/wisata/' . $old_foto_kedua);
        }
      }

      if ($foto_ketiga) {
        if ($this->upload->do_upload('foto_ketiga')) {
          $new_foto_ketiga = $this->upload->data();
          $new_foto_ketiga = $new_foto_ketiga['file_name'];
          $data['foto_ketiga'] = $new_foto_ketiga;
          unlink(FCPATH . 'assets/img/wisata/' . $old_foto_ketiga);
        }
      }

      $data = [
        'nama_wisata' => $this->input->post('nama_wisata'),
        'deskripsi' => $this->input->post('deskripsi'),
      ];

      if ($foto_pertama) {
        $data['foto_pertama'] = $new_foto_pertama;
      }

      if ($foto_kedua) {
        $data['foto_kedua'] = $new_foto_kedua;
      }

      if ($foto_ketiga) {
        $data['foto_ketiga'] = $new_foto_ketiga;
      }

      $this->Wisata_model->update($id, $data);
      $this->session->set_flashdata('success', 'Berhasil Mengubah wisata');
      redirect('dashboard/wisata');
    }
  }




  public function delete($id)
  {
    // Ambil data wisata berdasarkan id
    $wisata = $this->db->get_where('wisata', ['id' => $id])->row();

    // Hapus file foto pertama
    unlink(FCPATH . 'assets/img/wisata/' . $wisata->foto_pertama);

    // Hapus file foto kedua jika ada
    if ($wisata->foto_kedua) {
      unlink(FCPATH . 'assets/img/wisata/' . $wisata->foto_kedua);
    }

    // Hapus file foto ketiga jika ada
    if ($wisata->foto_ketiga) {
      unlink(FCPATH . 'assets/img/wisata/' . $wisata->foto_ketiga);
    }

    // Hapus data dari tabel wisata berdasarkan id
    // $this->db->where('id', $id);
    $this->db->delete('wisata', ['id' => $id]);

    // Tampilkan pesan berhasil dan redirect ke halaman wisata
    $this->session->set_flashdata('success', 'Data wisata berhasil dihapus');
    redirect('dashboard/wisata');
  }
}
