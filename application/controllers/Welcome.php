<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	private $data = [];
	public function __construct()
	{
		parent::__construct();
		$this->data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row();
	}
	public function index()
	{
		$data['user'] = $this->data['user'];
		$data['kegiatan'] = $this->db->order_by('id DESC')->get('kegiatan')->result();
		$data['wisata'] =  $this->db->order_by('id DESC')->get('wisata')->result();
		$data['berita'] = $this->Berita_model->getBerita();

		// ini view yang akan di tampilkan
		$data['content'] = $this->load->view('welcome_message', $data, true);
		// ini adalah layout nya
		$this->load->view('layouts/home', $data);
	}
	public function cek_penerima()
	{
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$data['penerima'] = $this->Penerima_model->getPenerima($data['keyword']);
		} else {
			$data['keyword'] = null;
		}
		// ini view yang akan di tampilkan
		$data['content'] = $this->load->view('bantuan/cek_bantuan', $data, true);
		// ini adalah layout nya
		$this->load->view('layouts/home', $data);
	}
	public function kegiatan()
	{
		$data['user'] = $this->data['user'];
		$data['kegiatan'] = $this->db->order_by('id DESC')->get('kegiatan')->result();

		// ini view yang akan di tampilkan
		$data['content'] = $this->load->view('components/kegiatan', $data, true);
		// ini adalah layout nya
		$this->load->view('layouts/home', $data);
	}
	public function berita()
	{
		$data['user'] = $this->data['user'];
		$data['berita'] = $this->db->order_by('id DESC')->get('berita')->result();
		// ini view yang akan di tampilkan
		$data['content'] = $this->load->view('components/berita', $data, true);
		// ini adalah layout nya
		$this->load->view('layouts/home', $data);
	}

	public function detail($id)
	{
		$data['user'] = $this->data['user'];
		$data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);
		$data['komentar'] = $this->Komentar_model->getKomentarKegiatan($id);

		// ini view yang akan di tampilkan
		$data['content'] = $this->load->view('kegiatan/detail', $data, true);
		// ini adalah layout nya
		$this->load->view('layouts/home', $data);
	}
	public function detail_wisata($id)
	{

		$data['wisata'] = $this->db->get_where('wisata', ['id' => $id])->row();

		$data['content'] = $this->load->view('wisata/detail', $data, true);
		$this->load->view('layouts/home', $data);
	}
	public function detail_berita($id)
	{
		$data['user'] = $this->data['user'];

		$data['berita'] = $this->db->get_where('berita', ['id' => $id])->row();
		$data['komentar'] = $this->Komentar_model->getKomentarBerita($id);
		$data['content'] = $this->load->view('berita/detail', $data, true);
		$this->load->view('layouts/home', $data);
	}
}

/* 
struktur folder
- layouts header
- components sidebar
- components navbar
- layouts footer
*/