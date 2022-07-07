<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user, $previllage);
		$this->load->model('bimbingan_m');
	}

	public function index()
	{
		$data['menu'] = "Data Mentor";
		//Cari tipe user
		$tipe_user = $this->session->tipe_user;
		$mentor_id = $this->session->id;
		//Tentukan kategori konten
		if ($tipe_user == '1') {
			redirect('bimbingan/mentor/2' . '/user/' . $this->session->id);
		} elseif ($tipe_user == '2') {
			$data['menu'] = "Data siswa";
			$data['row'] = $this->bimbingan_m->getSiswa();
			$this->templateadmin->load('template/dashboard','bimbingan/mentor_data',$data);
		}
	}

	public function mentor()
	{
		$this->load->library("form_validation");

		$id_mentor = $this->uri->segment(3);
		$id_user = $this->uri->segment(5);
		$this->db->order_by("created", "DESC");
		$this->db->where("user_id", $id_user);
		$data_bimbingan = $this->fungsi->pilihan_advanced("tb_bimbingan", "mentor_id", $id_mentor);

		$data['id_mentor'] = $id_mentor;
		$data['id_user'] = $id_user;
		$data['row_t'] = $data_bimbingan;
		$data['menu'] = "Mari Pelajari";
		$data['previllage'] = 1;
		$this->templateadmin->load('template/dashboard', 'bimbingan/bimbingan_data', $data);
	}

	public function tambah_bimbingan()
	{
		$post = $this->input->post(null, TRUE);

		//CEK FILE
		$config['upload_path']          = 'assets/dist/img/filebimbingan/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 5000;
		$config['file_name']            = $this->session->id . '-' . date('Ymdhi');


		$this->load->library('upload', $config);
		if (@$_FILES['file']['name'] != null) {
			if ($this->upload->do_upload('file')) {
				$post['file'] = $this->upload->data('file_name');
			} else {
				$pesan = $this->upload->display_errors();
				$this->session->set_flashdata('danger', $pesan);
				redirect('bimbingan/mentor/2' . '/user/' . $_POST['user_id']);
			}
		}


		$this->bimbingan_m->simpanBimbingan($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Bimbingan Berhasil Disimpan');
		}
		redirect('bimbingan/mentor/2' . '/user/' . $_POST['user_id']);
	}

	function hapus()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$mentor_id = $this->uri->segment(5);
		$user_id = $this->uri->segment(7);

		$itemfile = $this->bimbingan_m->get($id)->row();
		if ($itemfile->file != null) {
			$target_file = 'assets/dist/img/filebimbingan/' . $itemfile->file;
			unlink($target_file);
		}

		$this->bimbingan_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('bimbingan/mentor/' . $mentor_id . '/user/' . $user_id);
	}
}
