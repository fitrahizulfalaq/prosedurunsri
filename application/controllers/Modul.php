<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('modul_m');
	}

	public function index()
	{		
		$data['menu'] = "Update Modul Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('modul/index');
		$config['total_rows'] = $this->modul_m->get()->num_rows(); 		
		$config['per_page'] = 10;
		//Halaman
		$config['start'] = $this->uri->segment(3);
		//Style Pagination
		$config['first_link']       = 'Awal';
    $config['last_link']        = 'Terakhir';
    $config['next_link']        = '>>';
    $config['prev_link']        = '<<';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->modul_m->get_modul($config['per_page'],$config['start']);

		$this->templateadmin->load('template/dashboard','modul/modul_data',$data);
	}

	public function detail($id)
	{					
		$query = $this->modul_m->get($id);
		if ($query->num_rows() > 0) {
			$data['url'] = base_url('assets/dist/img/file-modul/'.$query->row("file"));
			$data['menu'] = "Lihat Modul";
			$this->templateadmin->load('template/dashboard','modul/modul_detail',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}				    
	}

	public function tambah()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_modul.judul]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Modul";
			$this->templateadmin->load('template/dashboard','modul/tambah',$data);
	    } else {
        $post = $this->input->post(null, TRUE);	                        

        //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/img/foto-modul/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['file_name']            = strtoupper($post['judul']);

				$this->load->library('upload', $config);
				if (@$_FILES['foto']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('foto')) {
				  	 	$post['foto'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('modul/tambah');
		        }			    	  	 	
				}

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/img/file-modul/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = strtoupper($post['judul']);

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('modul/tambah');
		        }
		    }				
			 
				$this->modul_m->simpan($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('modul');	        	
	    }
	}

	public function edit($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->modul_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Modul";			
				$this->templateadmin->load('template/dashboard','modul/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('modul')."';</script>";
			}
			
	    } else {
	      $post = $this->input->post(null, TRUE);	        
	        
	      //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/img/foto-modul/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['file_name']            = strtoupper($post['judul']);

				$this->load->library('upload', $config);
				if (@$_FILES['foto']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('foto')) {
				  	 	$post['foto'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('modul/tambah');
		        }			    	  	 	
				}

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/img/file-modul/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = strtoupper($post['judul']);

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('modul/tambah');
		        }
		    }
			 
				$this->modul_m->update($post);
		    	if ($this->db->affected_rows() > 0) {
		    		$this->session->set_flashdata('success','Berhasil Di Edit');
		    	}	  	 	
		        redirect('modul');
		    }
	}

	function hapusfoto(){
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);
		

		//Action		  
		$itemfoto = $this->modul_m->get($id)->row();
  		if ($itemfoto->foto != null) {
  			$target_file = 'assets/dist/img/foto-modul/'.$itemfoto->foto;
  			unlink($target_file);
  		}
  		$params['foto'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_modul',$params);
	  	redirect('modul/edit/'.$id);	  
	}

	function hapusfile(){
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);
		

		//Action		  
		$itemfile = $this->modul_m->get($id)->row();
  		if ($itemfile->file != null) {
  			$target_file = 'assets/dist/img/file-modul/'.$itemfile->file;
  			unlink($target_file);
  		}
  		$params['file'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_modul',$params);
	  	redirect('modul/edit/'.$id);	  
	}

	function hapus(){
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);

		$itemfoto = $this->modul_m->get($id)->row();		
		if ($itemfoto->foto != null) {
			$target_file = 'assets/dist/img/foto-modul/'.$itemfoto->foto;
			unlink($target_file);
		}

		$itemmodul = $this->modul_m->get($id)->row();		
		if ($itemmodul->file != null) {
			$target_file = 'assets/dist/img/file-modul/'.$itemmodul->file;
			unlink($target_file);
		}
		
		$this->modul_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('modul');
	}

		
}
