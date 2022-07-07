<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('tugas_m');
		$this->load->helper('form');
	}

	public function index($id = null)
	{
		$data['menu'] = "Data Mentor";		
		//Cari tipe user
		$tipe_user = $this->session->tipe_user;
		$mentor_id = $this->session->id;
		//Tentukan kategori konten
		if ($tipe_user == '1') {
			redirect();
		} elseif ($tipe_user == '2') {
			$data['menu'] = "Data siswa";
			$data['row'] = $this->tugas_m->getSiswa();
			$this->templateadmin->load('template/dashboard','tugas/data',$data);
		}
	}

	public function draft($id = null)
	{
		if ($this->session->tipe_user == "2") {
			redirect("tugas");
		}
		$data['menu'] = "Profil Peneliti";
		$id = $this->uri->segment("3");
		$data['draft'] = $this->tugas_m->get($id);
		$this->templateadmin->load('template/dashboard', 'tugas/draft', $data);
	}

	public function tambah_draft()
	{
		$post = $this->input->post(null, TRUE);

		$tgl = date('d-m-Y');

		$config['upload_path']          = 'assets/dist/img/filetugas/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 1000;
		$config['file_name']            = 'DRAFT - ' . $this->session->id . ' - ' . $tgl;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('draft')) {
			$post['draft'] = $this->upload->data('file_name');
		} else {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $pesan);
			redirect('tugas/draft');
		}

		$cekdata = $this->tugas_m->get($this->session->id)->num_rows();
		if ($cekdata == 0) {
			$this->tugas_m->simpantugas($post, $id);
		} else {
			// echo "update tugas";
			$this->tugas_m->updatedraft($post, $id);			
		}
	

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		redirect('tugas/draft');
	}

	function hapusdraft()
	{
		//Mencegah user yang bukan haknya
		check_right_user($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('tugas_m');
		$itemdraft = $this->tugas_m->get($id)->row();
		if ($itemdraft->draft != null) {
			$target_file = 'assets/dist/img/filetugas/' . $itemdraft->draft;
			unlink($target_file);
		}
		$params['draft'] = null;
		$this->db->where('user_id', $id);
		$this->db->update('tb_tugas', $params);
		redirect('tugas/draft/' . $id);
	}

	public function revisi($id = null)
	{
		if ($this->session->tipe_user == "2") {
			redirect("tugas");
		}

		$data['menu'] = "Profil Peneliti";
		$id = $this->uri->segment("3");
		$data['revisi'] = $this->tugas_m->get($id);
		$this->templateadmin->load('template/dashboard', 'tugas/revisi', $data);
	}

	public function tambah_revisi()
	{
		$post = $this->input->post(null, TRUE);

		$tgl = date('d-m-Y');

		$config['upload_path']          = 'assets/dist/img/filetugas/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 1000;
		$config['file_name']            = 'revisi - ' . $this->session->id . ' - ' . $tgl;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('revisi')) {
			$post['revisi'] = $this->upload->data('file_name');
		} else {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $pesan);
			redirect('tugas/revisi');
		}

		$cekdata = $this->tugas_m->get($this->session->id)->num_rows();
		if ($cekdata == 0) {
			$this->tugas_m->simpantugas($post, $id);
		} else {
			// echo "update tugas";
			$this->tugas_m->updaterevisi($post, $id);			
		}
	

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		redirect('tugas/revisi');
	}

	function hapusrevisi()
	{
		//Mencegah user yang bukan haknya
		check_right_user($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('tugas_m');
		$itemrevisi = $this->tugas_m->get($id)->row();
		if ($itemrevisi->revisi != null) {
			$target_file = 'assets/dist/img/filetugas/' . $itemrevisi->revisi;
			unlink($target_file);
		}
		$params['revisi'] = null;
		$this->db->where('user_id', $id);
		$this->db->update('tb_tugas', $params);
		redirect('tugas/revisi/' . $id);
	}

	public function teks($id = null)
	{
		if ($this->session->tipe_user == "2") {
			redirect("tugas");
		}

		$data['menu'] = "Profil Peneliti";
		$id = $this->uri->segment("3");
		$data['teks'] = $this->tugas_m->get($id);
		$this->templateadmin->load('template/dashboard', 'tugas/teks', $data);
	}

	public function tambah_teks()
	{
		$post = $this->input->post(null, TRUE);

		$tgl = date('d-m-Y');

		$config['upload_path']          = 'assets/dist/img/filetugas/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 1000;
		$config['file_name']            = 'teks - ' . $this->session->id . ' - ' . $tgl;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('teks')) {
			$post['teks'] = $this->upload->data('file_name');
		} else {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $pesan);
			redirect('tugas/teks');
		}

		$cekdata = $this->tugas_m->get($this->session->id)->num_rows();
		if ($cekdata == 0) {
			$this->tugas_m->simpantugas($post, $id);
		} else {
			// echo "update tugas";
			$this->tugas_m->updateteks($post, $id);			
		}
	

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		redirect('tugas/teks');
	}

	function hapusteks()
	{
		//Mencegah user yang bukan haknya
		check_right_user($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('tugas_m');
		$itemteks = $this->tugas_m->get($id)->row();
		if ($itemteks->teks != null) {
			$target_file = 'assets/dist/img/filetugas/' . $itemteks->teks;
			unlink($target_file);
		}
		$params['teks'] = null;
		$this->db->where('user_id', $id);
		$this->db->update('tb_tugas', $params);
		redirect('tugas/teks/' . $id);
	}

	public function tugasakhir($id = null)
	{
		if ($this->session->tipe_user == "2") {
			redirect("tugas");
		}

		$data['menu'] = "Profil Peneliti";
		$id = $this->uri->segment("3");
		$data['tugasakhir'] = $this->tugas_m->get($id);
		$this->templateadmin->load('template/dashboard', 'tugas/tugasakhir', $data);
	}

	public function tambah_tugasakhir()
	{
		$post = $this->input->post(null, TRUE);

		$tgl = date('d-m-Y');

		$config['upload_path']          = 'assets/dist/img/filetugas/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 1000;
		$config['file_name']            = 'tugasakhir - ' . $this->session->id . ' - ' . $tgl;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('tugasakhir')) {
			$post['tugasakhir'] = $this->upload->data('file_name');
		} else {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('danger', $pesan);
			redirect('tugas/tugasakhir');
		}

		$cekdata = $this->tugas_m->get($this->session->id)->num_rows();
		if ($cekdata == 0) {
			$this->tugas_m->simpantugas($post, $id);
		} else {
			// echo "update tugas";
			$this->tugas_m->updatetugasakhir($post, $id);			
		}
	

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		redirect('tugas/tugasakhir');
	}

	function hapustugasakhir()
	{
		//Mencegah user yang bukan haknya
		check_right_user($this->session->id, $this->uri->segment(3));

		$id = $this->uri->segment(3);

		//Action          
		$this->load->model('tugas_m');
		$itemtugasakhir = $this->tugas_m->get($id)->row();
		if ($itemtugasakhir->tugasakhir != null) {
			$target_file = 'assets/dist/img/filetugas/' . $itemtugasakhir->tugasakhir;
			unlink($target_file);
		}
		$params['tugasakhir'] = null;
		$this->db->where('user_id', $id);
		$this->db->update('tb_tugas', $params);
		redirect('tugas/tugasakhir/' . $id);
	}
}
