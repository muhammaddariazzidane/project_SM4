<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
  public function getKomentarBerita($id)
  {
    $this->db->select('user.id as uID, user.username, user.image, comment_berita.post_at, comment_berita.body');
    $this->db->join('user', 'comment_berita.user_id = user.id');
    $this->db->from('comment_berita');
    $this->db->where('comment_berita.berita_id', $id);
    $this->db->order_by('comment_berita.post_at DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function getKomentarKegiatan($id)
  {
    $this->db->select('user.id as uID, user.username, user.image, comment_kegiatan.post_at, comment_kegiatan.body');
    $this->db->join('user', 'comment_kegiatan.user_id = user.id');
    $this->db->from('comment_kegiatan');
    $this->db->where('comment_kegiatan.kegiatan_id', $id);
    $this->db->order_by('comment_kegiatan.post_at DESC');
    $query = $this->db->get();
    return $query->result();
  }
}
