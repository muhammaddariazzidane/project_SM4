<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima_model extends CI_Model
{
  public function LaporanPenerima()
  {
    $this->db->select('penerima_bantuan.pengajuan_id, penerima_bantuan.tgl_diambil, penerima_bantuan.taken, pengajuan.warga_id, pengajuan.bantuan_id,pengajuan.status ,warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan');
    $this->db->from('pengajuan');
    $this->db->join('penerima_bantuan', 'pengajuan.id = penerima_bantuan.pengajuan_id');
    $this->db->join('warga', 'pengajuan.warga_id = warga.id');
    $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
    $query = $this->db->get();
    return $query->result();
  }
  public function riwayat()
  {
    $this->db->select('riwayat_penerima.pengajuan_id, riwayat_penerima.tgl_diambil, riwayat_penerima.taken, pengajuan.warga_id, pengajuan.bantuan_id,pengajuan.status ,warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan');
    $this->db->from('pengajuan');
    $this->db->join('riwayat_penerima', 'pengajuan.id = riwayat_penerima.pengajuan_id');
    $this->db->join('warga', 'pengajuan.warga_id = warga.id');
    $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
    $this->db->order_by('riwayat_penerima.tgl_diambil DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function getPenerima($keyword = null)
  {
    if ($keyword) {
      $this->db->select('pengajuan.id as pID, warga.id as wID, warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan, pengajuan.status, bantuan.id as bID, bantuan.nominal,pengajuan.printed');
      $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
      $this->db->join('warga', 'pengajuan.warga_id = warga.id');
      $this->db->from('pengajuan');
      $this->db->where('pengajuan.status = 1');
      $this->db->like('warga.nik', $keyword);
      $query = $this->db->get();
      return $query->result();
    }
    $this->db->select('pengajuan.id, pengajuan.warga_id, pengajuan.bantuan_id, pengajuan.status, pengajuan.printed, warga.id as wID, warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan, bantuan.id as bID, bantuan.nominal');
    $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
    $this->db->join('warga', 'pengajuan.warga_id = warga.id');
    $this->db->order_by('pengajuan.id DESC');
    $query = $this->db->get('pengajuan');
    return $query->result();
  }
  public function cetakID($pID = null)
  {
    $this->db->select('pengajuan.id as pID, warga.id as wID, warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan, pengajuan.status, pengajuan.printed, bantuan.id as bID, bantuan.nominal');
    $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
    $this->db->join('warga', 'pengajuan.warga_id = warga.id');
    $this->db->from('pengajuan');
    $this->db->where('pengajuan.id', $pID);
    $query = $this->db->get();
    return $query->row();
  }

  public function cetakPengajuan()
  {
    $this->db->select('pengajuan.warga_id, pengajuan.bantuan_id,pengajuan.status, pengajuan.printed ,warga.nama, warga.nik, warga.alamat, warga.jenis_kelamin, warga.tgl_lahir, bantuan.nama_bantuan');
    $this->db->from('pengajuan');
    $this->db->join('warga', 'pengajuan.warga_id = warga.id');
    $this->db->join('bantuan', 'pengajuan.bantuan_id = bantuan.id');
    $query = $this->db->get();
    return $query->result();
  }
  public function store()
  {
    $role_id = $this->session->role_id;
    $warga_id = $this->input->post('warga_id');
    $bantuan_id = $this->input->post('bantuan_id');
    // cek warga penerima BLT
    $cek = $this->db->get_where('pengajuan', ['warga_id' => $warga_id])->row();
    // cek warga penerima BLT
    if ($role_id == 1) {
      if ($cek) {
        if ($cek->printed == 1) {
          $this->session->set_flashdata('info', 'Warga sudah termasuk penerima BLT dan mencetak bukti penerima BLT');
          redirect('dashboard');
        } else {
          if ($cek->status == 1) {
            $this->session->set_flashdata('info', 'Warga sudah termasuk penerima BLT');
            redirect('dashboard');
          } else {
            $id = $cek->id;
            $data = [
              'warga_id' => $warga_id,
              'bantuan_id' => $bantuan_id,
              'status' => 1,
              'printed' => 0
            ];
            $this->db->where('id', $id);
            $this->db->update('pengajuan', $data);
            $this->session->set_flashdata('success', 'Berhasil Mengaktivasi penerima BLT');
            redirect('dashboard');
          }
        }
      } else {
        $data = [
          'warga_id' => $warga_id,
          'bantuan_id' => $bantuan_id,
          'status' => 1,
          'printed' => 0
        ];
        $this->db->insert('pengajuan', $data);
        $this->session->set_flashdata('success', 'Berhasil menambah penerima BLT');
        redirect('dashboard');
      }
    }
    if ($role_id == 2) {
      if ($cek) {
        if ($cek->printed == 1) {
          $this->session->set_flashdata('info', 'Warga sudah termasuk penerima BLT dan mencetak bukti penerima BLT');
          redirect('dashboard');
        } else {

          if ($cek->status == 1) {
            $this->session->set_flashdata('info', 'Warga sudah termasuk penerima BLT');
            redirect('dashboard');
          } else {
            $this->session->set_flashdata('info', 'Warga sudah termasuk penerima BLT, silahkan tunggu diaktivasi admin');
            redirect('dashboard');
          }
        }
      } else {
        $data = [
          'warga_id' => $warga_id,
          'bantuan_id' => $bantuan_id,
          'status' => 0
        ];
        $this->db->insert('pengajuan', $data);
        $this->session->set_flashdata('success', 'Ajuan penerima BLT berhasil, Silahkan tunggu di konfirmasi admin');
        redirect('dashboard');
      }
    }
  }
}
