<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{
  public function cetak($pID)
  {
    $data['penerima'] = $this->Penerima_model->cetakID($pID);
    $id = $data['penerima']->pID;
    $nama = $data['penerima']->nama;

    $this->db->set('printed', 1);
    $this->db->where('id', $id);
    $this->db->update('pengajuan');
    // // nanti habis ini insert ke tabel penerima_bantuan karna di tabel pengajuan printed nya sudah 1
    $this->db->insert('penerima_bantuan', [
      'pengajuan_id' => $id,
      'taken' => 1,
      'tgl_diambil' => time()
    ]);
    // nanti habis ini insert ke tabel penerima_bantuan karna di tabel pengajuan printed nya sudah 1
    $sroot = $_SERVER['DOCUMENT_ROOT'];
    include $sroot . "/desa-tambaksumur/application/third_party/dompdf/autoload.inc.php";
    $dompdf = new Dompdf\Dompdf();
    $this->load->view('cetak/bukti_penerima', $data);
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("bukti-penerima-BLT-$nama.pdf", array('Attachment' => 0));
  }
  public function cetak_data_penerima()
  {
    $data['penerima'] = $this->Penerima_model->LaporanPenerima();

    $sroot = $_SERVER['DOCUMENT_ROOT'];
    include $sroot . "/desa-tambaksumur/application/third_party/dompdf/autoload.inc.php";
    $dompdf = new Dompdf\Dompdf();
    $this->load->view('cetak/data_penerima', $data);
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("data-penerima-BLT.pdf", array('Attachment' => 0));
  }
  public function cetak_data_pengajuan()
  {
    $data['penerima'] = $this->Penerima_model->cetakPengajuan();

    $sroot = $_SERVER['DOCUMENT_ROOT'];
    include $sroot . "/desa-tambaksumur/application/third_party/dompdf/autoload.inc.php";
    $dompdf = new Dompdf\Dompdf();
    $this->load->view('pengajuan/data_pengajuan', $data);
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("data-penerima-BLT.pdf", array('Attachment' => 0));
  }
  public function cetak_riwayat_penerima()
  {
    $data['riwayat'] = $this->Penerima_model->riwayat();

    $sroot = $_SERVER['DOCUMENT_ROOT'];
    include $sroot . "/desa-tambaksumur/application/third_party/dompdf/autoload.inc.php";
    $dompdf = new Dompdf\Dompdf();
    $this->load->view('cetak/riwayat_penerima', $data);
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("data-penerima-BLT.pdf", array('Attachment' => 0));
  }
  public function cetak_data_warga()
  {
    $data['warga'] = $this->db->order_by('id DESC')->get('warga')->result();
    // var_dump($data['warga']);
    // die;
    $sroot = $_SERVER['DOCUMENT_ROOT'];
    include $sroot . "/desa-tambaksumur/application/third_party/dompdf/autoload.inc.php";
    $dompdf = new Dompdf\Dompdf();
    $this->load->view('cetak/data_warga', $data);
    $paper_size = 'A4'; // ukuran kertas
    $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    $html = $this->output->get_output();
    $dompdf->set_paper($paper_size, $orientation);
    //Convert to PDF
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("data-penerima-BLT.pdf", array('Attachment' => 0));
  }
}
