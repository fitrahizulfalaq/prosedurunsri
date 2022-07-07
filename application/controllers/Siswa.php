<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('siswa_m');
		$this->load->helper('string');
	}

	public function index()
	{		
		$this->load->library("form_validation");

		$data['menu'] = "Data siswa";
		$data['row'] = $this->siswa_m->get();
		$this->templateadmin->load('template/dashboard','siswa/siswa_data',$data);
	}

	public function tambah()

	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|is_unique[tb_user.nama]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data siswa";
			$this->templateadmin->load('template/dashboard','siswa/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->siswa_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Disimpan');
	        }	
	        	redirect('siswa');	        	
	    }
	}

	function hapus(){	
	  $id = $this->uri->segment(3);
	  $this->siswa_m->hapus($id);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('siswa');
	}


	public function edit($id)
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[20]');
		$this->form_validation->set_rules('password', 'password', 'min_length[8]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->siswa_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data siswa";			
				$this->templateadmin->load('template/dashboard','siswa/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('siswa')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->siswa_m->update($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Edit');
	        }	
	        redirect('siswa');
	    }
	}


}
