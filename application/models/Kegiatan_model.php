<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
  public function store($foto)
  {
    $data = [
      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
      'deskripsi' => $this->input->post('deskripsi'),
      'foto_kegiatan' => $foto,
      'user_id' => $this->session->id,
      'post_at' => time()
    ];
    $this->db->insert('kegiatan', $data);
  }
  public function update($id, $foto_kegiatan_old, $user_id)
  {
    $foto = $_FILES['foto_kegiatan']['name'];

    if ($foto) {
      // config untuk upload gambar
      $upload_config['upload_path'] = './assets/img/kegiatan/';
      $upload_config['allowed_types'] = 'gif|jpg|jpeg|png';
      $upload_config['max_size'] = 12048; // 2MB
      $upload_config['encrypt_name'] = TRUE;

      $this->load->library('upload', $upload_config);

      if ($this->upload->do_upload('foto_kegiatan')) {
        $foto = $this->upload->data();
        $foto = $foto['file_name'];
        $data = [
          'nama_kegiatan' => $this->input->post('nama_kegiatan'),
          'deskripsi' => $this->input->post('deskripsi'),
          'foto_kegiatan' => $foto,
          'user_id' => $user_id,
          'post_at' => time()
        ];

        unlink(FCPATH . 'assets/img/kegiatan/' . $foto_kegiatan_old);

        $this->db->where('id', $id);
        $this->db->update('kegiatan', $data);
        $this->session->set_flashdata('success', 'Berhasil Mengumbah kegiatan');
        redirect('dashboard/kegiatan');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'deskripsi' => $this->input->post('deskripsi'),
        'foto_kegiatan' => $foto_kegiatan_old,
        'user_id' => $user_id,
        'post_at' => time()
      ];
      $this->db->where('id', $id);
      $this->db->update('kegiatan', $data);
      $this->session->set_flashdata('success', 'Berhasil Mengubah kegiatan');
      redirect('dashboard/kegiatan');
    }
  }
  public function getKegiatan()
  {
    return $this->db->order_by('id DESC')->get('kegiatan')->result();
  }
  public function getKegiatanById($id)
  {
    $this->db->select('kegiatan.id, user.username , user.id as uID, user.email, user.image , kegiatan.nama_kegiatan , kegiatan.post_at , kegiatan.deskripsi , kegiatan.user_id , kegiatan.foto_kegiatan');
    $this->db->join('user', 'kegiatan.user_id = user.id');
    $this->db->from('kegiatan');
    $this->db->where('kegiatan.id =', $id);
    $query = $this->db->get();
    // $query = $this->db->get_where('kegiatan', ['id' => $id]);
    return $query->row();
    // var_dump($query->row());
    // die;
  }
}
