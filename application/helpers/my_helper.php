<?php

function cek_aktif($is_active)
{
  $data = [
    'is_active' => $is_active,
  ];
  if ($data['is_active'] == 1) {
    return "checked='checked'";
  }
}
function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('auth');
  }
}
function refresh_penerima()
{
  $ci = get_instance();

  $threeMonthsAgo = strtotime('-3 months'); // Menghitung waktu 3 bulan yang lalu
  $query = $ci->db->where('tgl_diambil <=', $threeMonthsAgo)->get('penerima_bantuan');
  $dataToMove = $query->result();
  foreach ($dataToMove as $data) {
    $ci->db->insert('riwayat_penerima', [
      'pengajuan_id' => $data->pengajuan_id,
      'taken' => $data->taken,
      'tgl_diambil' => $data->tgl_diambil
    ]);
  }
  foreach ($dataToMove as $data) {
    $ci->db->where('pengajuan_id', $data->pengajuan_id)->delete('penerima_bantuan');
  }
}
