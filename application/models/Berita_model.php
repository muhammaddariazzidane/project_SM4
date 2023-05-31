<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
  public function store($foto)
  {
    $data = [
      'nama_berita' => $this->input->post('nama_berita'),
      'deskripsi' => $this->input->post('deskripsi'),
      'foto_berita' => $foto,
      'user_id' => $this->session->userdata('id'),
      'post_at' => time()
    ];
    $this->db->insert('berita', $data);
  }
  public function update($id, $foto_berita_old, $user_id)
  {
    $foto = $_FILES['foto_berita']['name'];

    if ($foto) {
      // config untuk upload gambar
      $upload_config['upload_path'] = './assets/img/berita/';
      $upload_config['allowed_types'] = 'gif|jpg|jpeg|png';
      $upload_config['max_size'] = 12048; // 2MB
      $upload_config['encrypt_name'] = TRUE;

      $this->load->library('upload', $upload_config);

      if ($this->upload->do_upload('foto_berita')) {
        $foto = $this->upload->data();
        $foto = $foto['file_name'];
        $data = [
          'nama_berita' => $this->input->post('nama_berita'),
          'deskripsi' => $this->input->post('deskripsi'),
          'foto_berita' => $foto,
          'user_id' => $user_id,
          'post_at' => time()
        ];

        unlink(FCPATH . 'assets/img/berita/' . $foto_berita_old);

        $this->db->where('id', $id);
        $this->db->update('berita', $data);
        $this->session->set_flashdata('success', 'Berhasil Mengumbah berita');
        redirect('dashboard/berita');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        'nama_berita' => $this->input->post('nama_berita'),
        'deskripsi' => $this->input->post('deskripsi'),
        'foto_berita' => $foto_berita_old,
        'user_id' => $user_id,
        'post_at' => time()
      ];
      $this->db->where('id', $id);
      $this->db->update('berita', $data);
      $this->session->set_flashdata('success', 'Berhasil Mengubah berita');
      redirect('dashboard/berita');
    }
  }
  public function getBerita()
  {
    $this->db->select('berita.id, user.id as uID, user.username, user.email, user.image , berita.nama_berita, berita.post_at, berita.deskripsi, berita.user_id, berita.foto_berita');
    $this->db->join('user', 'berita.user_id = user.id');
    $this->db->from('berita');
    $this->db->order_by('berita.id DESC');
    $query = $this->db->get();
    return $query->result();
  }
}
