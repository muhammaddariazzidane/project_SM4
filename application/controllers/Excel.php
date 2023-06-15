<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Excel extends CI_Controller
{
  public function cetak_data_pengajuan()
  {
    $data['penerima'] = $this->Penerima_model->cetakPengajuan();
    $this->load->view('pengajuan/excel/excel_data_pengajuan', $data);
  }
  public function cetak_data_penerima()
  {
    $data['penerima'] = $this->Penerima_model->LaporanPenerima();
    $this->load->view('cetak/excel/excel_data_penerima', $data);
  }
  public function cetak_riwayat_penerima()
  {
    $data['riwayat'] = $this->Penerima_model->riwayat();
    $this->load->view('cetak/excel/excel_riwayat_penerima', $data);
  }
}
