<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    refresh_penerima();
  }
  public function index()
  {
    $role_id = $this->session->role_id;
    // jika yang mengakses bukan warga
    if ($role_id != 3) {
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);
      $data['penerima'] = $this->Penerima_model->getPenerima();
      $data['laporan'] = $this->Penerima_model->LaporanPenerima();
      $data['warga'] = $this->db->get('warga')->result();
      $data['bantuan'] = $this->db->get('bantuan')->result();

      $this->form_validation->set_rules('warga_id', 'Nama Warga', 'required', ['required' => 'Nama Warga Harus Diisi']);
      $this->form_validation->set_rules('bantuan_id', 'Bantuan yang di dapat', 'required', ['required' => 'Bantuan Harus Diisi']);

      if ($this->form_validation->run() == false) {
        // ini view yang akan di tampilkan
        $data['content'] = $this->load->view('dashboard/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Semua field harus terisi');
      } else {
        $this->Penerima_model->store();
      }
    } else {
      // jika user biasa akan mengakses method ini
      show_error('Forbidden', 403);
    }
  }
  public function laporan()
  {
    $email = $this->session->email;
    $data['user'] = $this->Profile_model->getuser($email);
    // $data['laporan'] = $this->Penerima_model->LaporanPenerima();
    $data['riwayat'] = $this->Penerima_model->LaporanPenerima();
    // ini view yang akan di tampilkan
    $data['content'] = $this->load->view('laporan/index', $data, true);
    // ini adalah layout nya
    $this->load->view('layouts/dashboard', $data);
  }
  public function data()
  {
    $data['admin'] = $this->db->get_where('user', ['role_id' => 1])->num_rows();
    $data['rt'] = $this->db->get_where('user', ['role_id' => 2])->num_rows();
    $data['users'] = $this->db->get_where('user', ['role_id' => 3])->num_rows();
    $data['all'] = $this->User_model->getUsers();
    $email = $this->session->email;
    $data['user'] = $this->Profile_model->getuser($email);

    $data['content'] = $this->load->view('data/index', $data, true);
    // ini adalah layout nya
    $this->load->view('layouts/dashboard', $data);
    $this->session->set_flashdata('error', 'Isi data warga dengan benar');
  }
  public function warga()
  {
    if ($this->session->role_id != 3) {

      $data['warga'] = $this->db->order_by('id DESC')->get('warga')->result();
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nik', 'Nik', 'required|is_unique[warga.nik]');
      $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('agama', 'Agama', 'required');
      $this->form_validation->set_rules('status_perkawinan', 'Status perkawinan', 'required');
      $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

      if ($this->form_validation->run() == false) {
        // 
        $data['content'] = $this->load->view('warga/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Isi data warga dengan benar');
        // 
      } else {
        // insert data warga
        $this->Warga_model->store();
        $this->session->set_flashdata('success', 'Berhasil menambahkan data warga');
        redirect('dashboard/warga');
      }
    } else {
      // jika user biada akan mengakses method ini
      show_error('Forbidden', 403);
    }
  }
  public function bantuan()
  {
    if ($this->session->role_id == 1) {
      $data['bantuan'] = $this->db->get('bantuan')->result();
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);

      $this->form_validation->set_rules('nama_bantuan', 'Nama Bantuan', 'required|max_length[10]', ['max_length' => 'Nama Kegiatan Tidak boleh lebih dari 10 karakter']);
      $this->form_validation->set_rules('jenis', 'Jenis', 'required|max_length[10]');

      if ($this->form_validation->run() == false) {
        $data['content'] = $this->load->view('bantuan/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Isi data bantuan dengan benar');
        // $this->load->view('welcome_message');
      } else {
        $this->Bantuan_model->store();
        redirect('dashboard/bantuan');
      }
    } else {
      if ($this->session->role_id == 3) {
        $this->load->view('errors/html/error_403');
      }
      redirect('dashboard');
    }
  }
  public function kegiatan()
  {
    if ($this->session->role_id != 3) {
      // mengambil data kegiatan
      $data['kegiatan'] = $this->Kegiatan_model->getKegiatan();
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);

      $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|max_length[15]', ['max_length' => 'Nama Kegiatan Tidak boleh lebih dari 15 karakter']);
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      if ($this->form_validation->run() == false) {
        // ini view
        $data['content'] = $this->load->view('kegiatan/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Semua field harus terisi dengan benar');
      } else {

        // menangkap field foto_kegiatan dan mengambil nama gambar nya
        $foto = $_FILES['foto_kegiatan']['name'];
        if ($foto) {
          // config untuk upload gambar
          $upload_config['upload_path'] = './assets/img/kegiatan/';
          $upload_config['allowed_types'] = 'gif|jpg|png';
          $upload_config['max_size'] = 12048; // 2MB
          $upload_config['encrypt_name'] = TRUE;

          $this->load->library('upload', $upload_config);

          if ($this->upload->do_upload('foto_kegiatan')) {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $this->Kegiatan_model->store($foto);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan kegiatan');
            redirect('dashboard/kegiatan');
          } else {
            echo $this->upload->display_errors();
          }
        } else {
          $data = [
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'user_id' => $this->session->id,
            'post_at' => time()
          ];
          $this->db->insert('kegiatan', $data);
          $this->session->set_flashdata('success', 'Berhasil Menambahkan kegiatan');
          redirect('dashboard/kegiatan');
        }
      }
    } else {
      $this->load->view('errors/html/error_403');
    }
  }
  public function berita()
  {
    if ($this->session->role_id != 3) {
      // mengambil data kegiatan
      $email = $this->session->email;
      $data['berita'] = $this->Berita_model->getBerita();
      $data['user'] = $this->Profile_model->getuser($email);

      $this->form_validation->set_rules('nama_berita', 'Nama Berita', 'required|max_length[20]', ['required' => 'Nama Berita Harus Diisi']);
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Harus Diisi']);

      if ($this->form_validation->run() == false) {
        // ini view
        $data['content'] = $this->load->view('berita/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Semua field harus terisi');
      } else {
        // menangkap field foto_kegiatan dan mengambil nama gambar nya
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
            $this->Berita_model->store($foto);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Berita baru');
            redirect('dashboard/berita');
          } else {
            echo $this->upload->display_errors();
          }
        } else {
          $data = [
            'nama_berita' => $this->input->post('nama_berita'),
            'deskripsi' => $this->input->post('deskripsi'),
            'user_id' => $this->session->userdata('id'),
            'post_at' => time()
          ];
          $this->db->insert('berita', $data);
          $this->session->set_flashdata('success', 'Berhasil Menambahkan Berita baru');
          redirect('dashboard/berita');
        }
      }
    } else {
      $this->load->view('errors/html/error_403');
    }
  }
  public function wisata()
  {
    if ($this->session->role_id == 1) {
      // mengambil data kegiatan
      $data['wisata'] = $this->db->get('wisata')->result();
      $email = $this->session->email;
      $data['user'] = $this->Profile_model->getuser($email);
      $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

      if ($this->form_validation->run() == false) {
        // ini view
        $data['content'] = $this->load->view('wisata/index', $data, true);
        // ini adalah layout nya
        $this->load->view('layouts/dashboard', $data);
        $this->session->set_flashdata('error', 'Semua field harus terisi dengan benar');
      } else {
        $this->Wisata_model->store();
      }
    } else {
      $this->load->view('errors/html/error_403');
    }
  }
}
